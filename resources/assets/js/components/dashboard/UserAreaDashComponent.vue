<template>
  <div>
    <h2 class="header-area-dash">Perfil Usuario</h2>
    <div class="user-dash">
      <div class="avatar" />
      <div class="user-data">
        <span>Candado</span>
        <input-dash
          tittle-card="Nombre"
          type="text"
          :content="user.name"
          editable
          @change-value="updateUser"
        />
        <input-dash
          tittle-card="Email"
          type="text"
          :content="userData.email"
          @change-value="updateUser"
        />
        <combo-countries
          title="comboCountries"
          :country="userData.country"
          @change-value="updateUser"
        />
        <div>
          <lang-flag :iso="user.favourite_language" />
        </div>
      </div>
      <div class="user-pass">
        <input-dash
          tittle-card="Antigua contraseña"
          type="password"
          content=""
        />
        <input-dash tittle-card="Nueva contraseña" type="password" content="" />
        <input-dash
          tittle-card="Confirma contraseña"
          type="password"
          content=""
        />
      </div>
      <div class="buttons">
        <button @click="updateProfile">Guardar cambios</button>
        <button>Borrar cuenta</button>
      </div>
    </div>
  </div>
</template>

<script>
import InputDash from "./InputGroupComponent.vue";
import ComboCountries from "./ComboCountriesComponent.vue";
import LangFlag from "vue-lang-code-flags";

import User from "../../../../classes/User";

export default {
  name: "UserAreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
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
      userData: User,
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
      }
    },
    updateProfile() {
      this.userData.updateProfile();
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.user-dash {
  display: grid;
  grid-template: repeat(3, 1fr) / repeat(2, 1fr);

  .avatar {
    grid-row: 1 / -1;
    background: blue;
    justify-self: center;
    width: 200px;
    height: 200px;
    border-radius: 70px;
    margin-top: 10px;
  }

  .user-data {
    grid-column: 2 / -1;
    display: grid;
    grid-template: 50px repeat(2, 1fr) / repeat(2, 1fr);

    span {
      grid-column: 1 / -1;
    }
  }

  .user-pass {
    grid-column: 2 / -1;
    display: grid;
    grid-template: repeat(3, 1fr) / 1fr;
  }
  .buttons {
    grid-column: 2 / -1;
    display: grid;
    grid-template: 1fr / 1fr;
  }
}
/* .user-dash {
  display: grid;
  grid-template: 1fr 1fr 1fr 1fr 1fr/ 0.5fr 1fr 1fr 0.5fr;
  gap: 10px;
  @include area-scroll(500px);
  div {
    align-self: center;

    &:nth-child(even) {
      grid-column: 2 / 3;
    }

    &:nth-child(odd) {
      grid-column: 3 / 4;
    }

    &:nth-child(1) {
      grid-column: 1 / -1;
      background: blue;
      justify-self: center;
      width: 130px;
      height: 130px;
      border-radius: 70px;
      margin-top: 10px;
    }
  }
}

.buttons {
  display: flex;
  padding: 30px;
  > * {
    @include dash-button($font-size: 1.5rem);
    width: 50%;
    height: 50px;
    margin: 5px;
  }
} */
</style>
