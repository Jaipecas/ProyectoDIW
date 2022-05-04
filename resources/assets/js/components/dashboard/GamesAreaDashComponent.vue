<template>
  <div class="match-area">
    <h2 class="header-area-dash">Partidas</h2>
    <select class="form-select combo-area-dash" @change="onChangeGame($event)">
      <option value="pending" selected>Pendientes</option>
      <option value="all">Todas</option>
    </select>
    <div class="matches">
      <match-dash v-for="game in gamesList" :key="game.id" :game="game" />
    </div>
  </div>
</template>

<script>
import MatchDash from "./MatchDashComponent.vue";
import Game from "../../../../classes/Game";

export default {
  name: "GameAreaDashComponent",
  components: {
    "match-dash": MatchDash,
  },
  data: function () {
    return {
      gamesList: Array,
    };
  },
  created() {
    this.getGamesList();
  },

  methods: {
    async getGamesList() {
      this.gamesList = await Game.getPendingGames();
      console.log(this.gamesList);
    },
    async onChangeGame(event) {
      if (event.target.value === "pending") {
        this.gamesList = await Game.getPendingGames();
      } else {
        this.gamesList = await Game.getUserGames();
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.match-area {
  @include area-scroll(600px);
  .matches {
    display: flex;
    flex-direction: column;
    align-items: center;

    > * {
      margin: 20px;
    }
  }
}
</style>
