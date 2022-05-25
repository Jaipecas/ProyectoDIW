<template>
  <div class="wrapper">
    <h2 class="header-area-dash">Perfil Usuario</h2>
    <div class="user-dash">
      <div class="avatar">
        <upload-avatar :user="userData" />
        <div class="messages">
          <div v-if="error == true" class="alert alert-danger">
            {{ message }}
          </div>
          <div v-else-if="error == false" class="alert alert-success">
            {{ message }}
          </div>
        </div>
      </div>

      <div class="user-data">
        <div class="div-img">
          <img :src="pathImg" alt="candado" @click="changeForm" />
        </div>
        <!-- datos -->
        <div class="data">
          <!--  ReadOnly -->
          <template v-if="readOnly">
            <div class="div-read">
              <span>{{ user.name }}</span>
            </div>
            <div class="div-read">
              <span>{{ user.email }}</span>
            </div>
            <div class="div-flag">
              <p>País</p>
              <country-flag
                :country="user.country"
                size="big"
                :rounded="true"
              />
            </div>
            <div class="div-flag">
              <p>Lenguaje favorito</p>
              <lang-flag :iso="user.favourite_language" />
            </div>
          </template>
          <!-- form -->
          <template v-else class="form-data">
            <input-dash
              title="Nombre"
              type="text"
              :content="user.name"
              editable
              @change-value="updateUser"
            />
            <input-dash title="Email" type="text" :content="user.email" />
            <combo-countries
              title="comboCountries"
              :country="userData.country"
              @change-value="updateUser"
            />
            <combo-langs
              title="comboLangs"
              :lang="user.favourite_language"
              @change-value="updateUser"
            />
            <div class="buttons">
              <button @click="updateProfile">Guardar</button>
              <button>Borrar cuenta</button>
            </div>
          </template>
        </div>
      </div>
      <!-- pass -->
      <template v-if="readOnly == false">
        <div class="user-pass">
          <div class="pass-area">
            <div>
              <input-dash
                title="Antigua contraseña"
                type="password"
                content=""
                @change-value="updateUser"
              />
            </div>
            <div>
              <input-dash
                title="Nueva contraseña"
                type="password"
                content=""
                @change-value="updateUser"
              />
            </div>
            <div>
              <input-dash
                title="Confirma contraseña"
                type="password"
                content=""
                @change-value="updateUser"
              />
            </div>
            <button @click="updatePass">Guardar</button>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import InputDash from "../components/InputGroupComponent.vue";
import ComboCountries from "../components/ComboCountriesComponent.vue";
import ComboLangs from "../components/ComboLangsComponent.vue";
import CountryFlag from "vue-country-flag";
import LangFlag from "vue-lang-code-flags";
import UploadAvatar from "../components/UploadImageComponent.vue";

import User from "../../../../../classes/User";

export default {
  name: "UserAreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
    "combo-langs": ComboLangs,
    "country-flag": CountryFlag,
    "lang-flag": LangFlag,
    "upload-avatar": UploadAvatar,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      readOnly: true,
      userData: User,
      pass1: null,
      pass2: null,
      pass3: null,
      pathImg: "/img/padlockclose.png",
      error: null,
      message: "Usuario actualizado",
    };
  },
  created() {
    this.userData = this.user;
  },
  methods: {
    updateUser(tittle, value) {
      switch (tittle) {
        case "Nombre":
          this.userData.name = value;
          break;
        case "comboCountries":
          this.userData.country = value;
          break;
        case "comboLangs":
          this.userData.favourite_language = value;
          break;
        case "Antigua contraseña":
          this.pass1 = value;
          break;
        case "Nueva contraseña":
          this.pass2 = value;
          break;
        case "Confirma contraseña":
          this.pass3 = value;
          break;
      }
    },
    async updateProfile() {
      try {
        await this.userData.updateProfile();
        this.error = false;
        this.message = "Usuario actualizado";
      } catch (error) {
        this.error = true;
        if (error === 409) {
          this.message = "Lenguaje no soportado";
        } else if (error === 404) {
          this.message = "Usuario no encontrado";
        } else {
          this.message = "Error al actualizar";
        }
      }
    },

    async updatePass() {
      if (this.checkPass() === false) return;
      try {
        await this.userData.updatePass(this.pass1, this.pass2, this.pass3);
        this.error = false;
        this.message = "Usuario actualizado";
      } catch (error) {
        this.error = true;
        if (error === 401) {
          this.message = "Contraseña incorrecta";
        } else {
          this.message = "Error al actualizar";
        }
      }
    },

    checkPass() {
      if (this.pass2 !== this.pass3) {
        this.error = true;
        this.message = "Error al confirmar la contraseña";
        return false;
      }

      if (!this.pass1 || !this.pass2 || !this.pass3) {
        this.error = true;
        this.message = "Debe rellenar todos los campos de la contraseña";
        return false;
      }
      return true;
    },
    changeForm() {
      this.readOnly = !this.readOnly;
      if (this.readOnly) {
        this.pathImg = "/img/padlockclose.png";
      } else {
        this.pathImg = "/img/padlockopen.png";
      }
    },
    borrarAvatar() {
      this.userData.removeAvatar();
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.wrapper {
  background-image: linear-gradient(#9f46af, #a899ab);
  border-radius: 10px;
  height: 100%;

  .user-dash {
    display: grid;
    grid-template: repeat(3, 1fr) / 0.5fr 1fr;

    .avatar {
      grid-row: 1 / -1;
      .messages {
        margin: 50px;
      }
    }

    .user-data {
      grid-column: 2 / -1;
      padding-right: 10px;

      .div-img {
        text-align: center;
        img {
          cursor: pointer;
          width: 50px;
          height: 50px;
        }
      }

      .data {
        display: grid;
        grid-template: repeat(2, 1fr) / repeat(2, 1fr);
        justify-items: center;
        gap: 10px;
        padding: 10px;

        .buttons {
          justify-self: center;
          grid-column: 1 /-1;
          > * {
            margin: 5px;
          }
        }
        .div-read {
          @include dash-card(#f79533, 50px, 1rem);
          display: flex;
          align-items: center;
          justify-content: center;
          height: 50%;
        }

        .div-flag {
          @include dash-card(#f79533, 100px, 1rem);
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          height: 50%;

          .flag-icon {
            width: 52px;
            height: 39px;
          }
        }
      }
    }

    .user-pass {
      grid-column: 2 / -1;
      padding-right: 10px;
      align-self: center;

      .pass-area {
        display: grid;
        grid-template: repeat(3, 1fr) / repeat(2, 1fr);
        gap: 10px;
        input {
          width: 50%;
        }
        button {
          align-self: end;
        }
      }
    }

    .buttons {
      grid-column: 2 / -1;
      display: grid;
      grid-template: 1fr/1fr 1fr;
      padding: 20px;
    }
  }

  fieldset {
    border: 2px solid #ef4e7b;
    padding: 5px;
    border-radius: 4px;
  }

  button {
    @include dash-button(1rem);
    height: 50px;
  }

  .alert {
    text-align: center;
  }
}
</style>
