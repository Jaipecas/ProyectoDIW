<template>
  <div>
    <div class="user-dash d-none">
      <div />
      <input-dash name="Nombre" type="text" />
      <input-dash name="Antigua contraseña" type="password" />
      <combo-countries />
      <input-dash name="Nueva contraseña" type="password" />
      <input-dash name="Nombre" type="text" />
      <input-dash name="Confirma contraseña" type="password" />
      <div>
        <button>Guardar</button>
      </div>
    </div>

    <div>
      <h3 class="d-none">Partidas pendientes</h3>
      <div class="match-dash d-none">
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

    <div class="stats-dash">
      <div />
      <card-dash title="Partidas ganadas" stat="1500" />
      <card-dash title="Partidas ganadas" stat="1500" />
      <card-dash title="Partidas ganadas" stat="1500" />
      <card-dash title="Partidas ganadas" stat="1500" />
    </div>
  </div>
</template>

<script>
import ComboCountries from "./ComboCountriesComponent.vue";
import InputDash from "./InputGroupComponent.vue";
import MatchDash from "./MatchDashComponent.vue";
import CardDash from "./CardDashComponent.vue";

export default {
  name: "AreaDashComponent",
  components: {
    "input-dash": InputDash,
    "combo-countries": ComboCountries,
    "match-dash": MatchDash,
    "card-dash": CardDash,
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

  div:nth-child(1) {
    grid-column: 1/-1;
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
    grid-column: 1/-1;
    justify-self: center;
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
