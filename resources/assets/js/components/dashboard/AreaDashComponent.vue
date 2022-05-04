<template>
  <div>
    <div v-show="area == 'Perfil'" class="user-dash" :user="user">
      <div />
      <input-dash tittle-card="Nombre" type="text" :content="user.name" />
      <input-dash tittle-card="Email" type="text" :content="user.email" />
      <combo-countries :country="user.country" />
      <input-dash tittle-card="Antigua contraseña" type="password" />
      <input-dash tittle-card="Nueva contraseña" type="password" />
      <input-dash tittle-card="Nombre" type="text" />
      <input-dash tittle-card="Confirma contraseña" type="password" />
      <div>
        <button>Guardar</button>
      </div>
    </div>

    <div v-show="area == 'Partidas'">
      <games-area :user="user" />
    </div>

    <div v-show="area == 'Estadisticas'">
      <stats-area />
    </div>

    <div v-show="area == 'Notificaciones'">
      <notif-area />
    </div>
  </div>
</template>

<script>
import ComboCountries from "./ComboCountriesComponent.vue";
import InputDash from "./InputGroupComponent.vue";
import NotificationsAreaDashComponent from "./NorificationsAreaDashComponent.vue";
import GameAreaDashComponent from "./GamesAreaDashComponent.vue";
import StatsArea from "./StatsAreaDashComponent.vue";

import User from "../../../../classes/User";

export default {
  name: "AreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
    "stats-area": StatsArea,
    "notif-area": NotificationsAreaDashComponent,
    "games-area": GameAreaDashComponent,
  },
  props: {
    area: {
      type: String,
      required: true,
    },
    user: {
      type: User,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.user-dash {
  display: grid;
  grid-template: 1fr 1fr 1fr 1fr 1fr/ 0.5fr 1fr 1fr 0.5fr;
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

    &:last-child {
      grid-column: 2 / 4;

      button {
        width: 100%;
        height: 50px;
      }
    }
  }
}

/* SE REPITE TAMBIEN EN AMIGOS  */
h3 {
  margin-top: 10px;
  text-align: center;
}

button {
  @include dash-button($font-size: 1.5rem);
}
</style>
