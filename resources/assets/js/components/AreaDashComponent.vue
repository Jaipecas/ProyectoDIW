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
      <h3>Partidas pendientes</h3>
      <div class="match-dash">
        <match-dash player="jugador2" score1="15244" score2="55555" />
        <match-dash player="jugador3" score1="15244" score2="55555" />
        <match-dash player="jugador4" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
        <match-dash player="jugador5" score1="15244" score2="55555" />
      </div>
    </div>

    <div v-show="area == 'Estadisticas'" class="stats-dash">
      <div class="level" />
      <card-dash title="Partidas ganadas" stat="1500" />
      <card-dash title="Partidas perdidas" stat="100" />
      <card-dash
        title="Mejor palabra"
        stat="Australopithecus Puntos:250 Partida: 25"
      />
      <card-dash title="Partida mas corta" stat="250" />
      <card-dash title="Partida mas larga" stat="89" />
    </div>
  </div>
</template>

<script>
import ComboCountries from "./ComboCountriesComponent.vue";
import InputDash from "./InputGroupComponent.vue";
import MatchDash from "./MatchDashComponent.vue";
import CardDash from "./CardDashComponent.vue";

import User from "../../../classes/User";
import Game from "../../../classes/Game";

export default {
  name: "AreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
    "match-dash": MatchDash,
    "card-dash": CardDash,
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

  data: function () {
    return {
      gamesList: Array,
    };
  },

  beforeUpdate() {
    this.getGamesList();
  },

  methods: {
    async getGamesList() {
      let arrayGames = await Game.getPendingGames();
      this.gamesList = arrayGames;
      console.log(this.gamesList);
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

.match-dash {
  height: 600px;
  overflow: auto;
  /* SACAR ESTO EN UN MIXIM PARA REUTILIZARLO */
  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    display: none;
  }
}

.stats-dash {
  display: grid;
  grid-template: repeat(4, 1fr) / 0.5fr 1fr 1fr 0.5fr;
  gap: 20px;
  height: 600px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    display: none;
  }

  div:nth-child(1) {
    grid-column: 1/-1;
    justify-self: center;
    align-self: center;
    margin-top: 30px;
    margin-bottom: 30px;
  }

  div:nth-child(2) {
    grid-column: 2 / 3;
    justify-self: center;
  }
  div:nth-child(3) {
    grid-column: 3 / 4;
    justify-self: center;
  }
  div:nth-child(4) {
    grid-column: 2 / 4;
    justify-self: center;
  }
  div:nth-child(5) {
    grid-column: 2 / 3;
    justify-self: center;
  }
  div:nth-child(6) {
    grid-column: 3 / 4;
    justify-self: center;
  }

  .level {
    width: 110px;
    height: 110px;
    background: blue;
    border-radius: 60px;
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
