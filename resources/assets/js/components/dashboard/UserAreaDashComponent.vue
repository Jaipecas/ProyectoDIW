<template>
  <div>
    <h2 class="header-area-dash">Perfil Usuario</h2>
    <div class="user-dash">
      <div class="avatar" />
      <div class="user-data">
        <div class="div-img">
          <img :src="pathImg" alt="candado" @click="changeForm" />
        </div>
        <fieldset>
          <legend>Datos</legend>
          <template v-if="readOnly">
            <div class="div-read">
              {{ user.name }}
            </div>
            <div class="div-read">
              {{ user.email }}
            </div>
            <div class="div-flag">
              <country-flag
                :country="user.country"
                size="big"
                :rounded="true"
              />
              <span>{{ user.country }}</span>
            </div>
            <div class="div-flag">
              <lang-flag :iso="user.favourite_language" />
              <span>{{ user.favourite_language }}</span>
            </div>
          </template>
          <template v-else>
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
          </template>
        </fieldset>
      </div>
      <template v-if="readOnly == false">
        <div class="user-pass">
          <fieldset>
            <legend>Contraseña</legend>
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
          </fieldset>
        </div>
        <div class="buttons">
          <button @click="updateProfile">Guardar cambios</button>
          <button>Borrar cuenta</button>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import InputDash from "./InputGroupComponent.vue";
import ComboCountries from "./ComboCountriesComponent.vue";
import ComboLangs from "./ComboLangsComponent.vue";
import CountryFlag from "vue-country-flag";
import LangFlag from "vue-lang-code-flags";

import User from "../../../../classes/User";

export default {
  name: "UserAreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
    "combo-langs": ComboLangs,
    "country-flag": CountryFlag,
    "lang-flag": LangFlag,
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
    updateProfile() {
      //this.userData.updateProfile(this.pass1, this.pass2, this.pass3);
    },
    changeForm() {
      this.readOnly = !this.readOnly;
      if (this.readOnly) {
        this.pathImg = "/img/padlockclose.png";
      } else {
        this.pathImg = "/img/padlockopen.png";
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.user-dash {
  display: grid;
  grid-template: 0.5fr 1fr 30px / repeat(2, 1fr);

  .avatar {
    grid-row: 1 / -1;
    background: blue;
    justify-self: center;
    width: 200px;
    height: 200px;
    border-radius: 70px;
    margin-top: 10px;
  }
  > div {
    padding-right: 10px;
  }

  .user-data {
    grid-column: 2 / -1;

    .div-img {
      text-align: center;
      img {
        cursor: pointer;
        width: 50px;
        height: 50px;
      }
    }

    fieldset {
      display: grid;
      grid-template: repeat(2, 1fr) / repeat(2, 1fr);
      justify-items: center;

      > div {
        padding: 5px;
      }

      .div-read {
        @include dash-card(#f79533, 50px);
        width: 85%;
        height: 50px;
      }

      .div-flag {
        @include dash-card(#f79533, 100px);
        width: 85%;
      }
    }
  }

  .user-pass {
    grid-column: 2 / -1;

    fieldset {
      display: grid;
      grid-template: repeat(3, 1fr) / 1fr;
      gap: 10px;
    }
  }

  .buttons {
    grid-column: 2 / -1;
    display: grid;
    grid-template: 1fr/1fr 1fr;
    padding: 20px;

    button {
      @include dash-button(1rem);
      height: 50px;
    }
  }
}

fieldset {
  border: 2px solid #ef4e7b;
  padding: 5px;
  border-radius: 4px;
}

legend {
  font-size: 1.2rem;
  width: auto;
}
</style>
