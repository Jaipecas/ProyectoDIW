<template>
  <div class="match-area">
    <h2 class="header-area-dash">Partidas</h2>
    <div class="matches">
      <!-- area inicio de partida -->
      <start-area :user="user" />
      <!-- area partidas pendientes -->
      <div>
        <div class="legend">
          <span>Tu turno</span>
          <span>Oponente</span>
          <span>Por confirmar</span>
        </div>
        <match-dash
          v-for="game in gamesList"
          :key="game.id"
          :user="user"
          :game="game"
          @delete-game="deleteGame"
        />
      </div>
    </div>
  </div>
</template>

<script>
import User from "../../../../../classes/User";
import MatchDash from "../components/MatchDashComponent.vue";
import StartGameArea from "./StartGameAreaComponent.vue";

export default {
  name: "GameAreaDashComponent",
  components: {
    "match-dash": MatchDash,
    "start-area": StartGameArea,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
    pendingGames: {
      type: Array,
      required: true,
    },
  },
  data: function () {
    return {
      gamesList: Array,
    };
  },
  created() {
    this.gamesList = this.pendingGames;
    this.reOrderGames();
  },

  methods: {
    async deleteGame(gameSelect) {
      await gameSelect.giveUp();
      this.gamesList = this.gamesList.filter(
        (game) => game.id !== gameSelect.id
      );
    },
    reOrderGames() {
      let noStart = this.gamesList.filter((game) => game.state === 0);
      let reOrderArray = this.gamesList.filter((game) => game.state !== 0);
      reOrderArray = reOrderArray.sort((a, b) => a.state - b.state);
      this.gamesList = reOrderArray.concat(noStart);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.match-area {
  background: #ffbed0;
  border-radius: 10px;
  height: 100%;

  .matches {
    display: grid;
    grid-template: 1fr / 1fr 1fr;

    :nth-child(1) {
      justify-self: center;
    }

    :nth-child(2) {
      justify-self: center;

      .legend {
        margin: 10px;
        > * {
          padding: 5px;
        }
        :nth-child(1) {
          background: $color-player-turn;
        }
        :nth-child(2) {
          background: $color-oponent-turn;
        }
        :nth-child(3) {
          background: $color-no-turn;
        }
      }
    }
  }
}
</style>
