<template>
  <div class="wrapper" :class="colorResult">
    <span>{{ result }}</span>
    <lang-flag :iso="game.language" />
    <div class="user-container">
      <img src="/img/gamer.png" alt="avatar" />
      <div>
        <country-flag
          :country="game.player1.country"
          size="small"
          :rounded="true"
        />
        <span>{{ game.player1.name }}</span>
      </div>
    </div>
    <span>{{ game.score1 }} - {{ game.score2 }} </span>
    <div class="user-container">
      <img src="/img/gamer.png" alt="avatar" />
      <div>
        <country-flag
          :country="game.player2.country"
          size="small"
          :rounded="true"
        />
        <span>{{ game.player2.name }}</span>
      </div>
    </div>
    <div class="date-container">
      <span>{{ date }}</span>
      <span>{{ time }}</span>
    </div>
  </div>
</template>

<script>
import CountryFlag from "vue-country-flag";
import LangFlag from "vue-lang-code-flags";

import Game from "../../../../classes/Game";

export default {
  name: "GameCardComponent",
  components: {
    "country-flag": CountryFlag,
    "lang-flag": LangFlag,
  },
  props: {
    game: {
      type: Game,
      required: true,
    },
    userId: {
      type: Number,
      required: true,
    },
  },

  data: function () {
    return {
      gameStates: {
        unstarted: () => {
          return "Sin empezar";
        },
        turn_p1: () => {
          return this.checkTurn(this.game.player1.id);
        },
        turn_p2: () => {
          return this.checkTurn(this.game.player2.id);
        },
        win_p1: () => {
          return this.checkWinner(this.game.player1.id);
        },
        win_p2: () => {
          return this.checkWinner(this.game.player2.id);
        },
      },
      colorResult: "color-no-start",
    };
  },
  computed: {
    result: function () {
      return this.gameStates[this.game.state]();
    },
    date: function () {
      return new Date(this.game.updated).toLocaleDateString("es-ES");
    },
    time: function () {
      return new Date(this.game.updated).toLocaleTimeString("es-ES");
    },
  },
  methods: {
    checkWinner(playerId) {
      if (playerId === this.userId) {
        this.colorResult = "color-win";
        return "Victoria";
      } else {
        this.colorResult = "color-lose";
        return "Derrota";
      }
    },

    checkTurn(playerId) {
      this.colorResult = "color-turn";
      if (playerId === this.userId) {
        return "Tu turno";
      } else {
        return "Turno oponente";
      }
    },
  },
};
</script>
<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.wrapper {
  @include dash-card(#e1b2e9, 50px, 1rem);
  display: grid;
  grid-template: 1fr / repeat(6, 1fr);
  margin-top: 5px;
  margin-bottom: 5px;
  padding: 10px;

  > * {
    align-self: center;
    justify-self: center;
  }

  span {
    font-weight: bold;
  }

  .date-container {
    display: flex;
    flex-direction: column;
  }

  span.flag-icon {
    height: 30px;
    width: 30px;
  }
}
.color-win {
  background: $color-winner;
}
.color-lose {
  background: $color-loser;
}
.color-turn {
  background: $color-turn;
}
.color-no-start {
  background: $color-no-start;
}
</style>
