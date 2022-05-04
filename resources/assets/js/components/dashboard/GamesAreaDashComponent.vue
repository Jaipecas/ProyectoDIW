<template>
  <div class="match-area">
    <h2 class="header-area-dash">Partidas</h2>
    <select class="form-select combo-area-dash" @change="onChangeGame($event)">
      <option value="pending" selected>Pendientes</option>
      <option value="won">Ganadas</option>
      <option value="lose">Perdidas</option>
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
import User from "../../../../classes/User";

export default {
  name: "GameAreaDashComponent",
  components: {
    "match-dash": MatchDash,
  },
  props: {
    user: User,
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
      switch (event.target.value) {
        case "pending":
          this.gamesList = await Game.getPendingGames();
          break;
        case "won":
          this.gamesList = await this.user.getWonGames();
          break;
        case "lose":
          this.gamesList = await this.user.getLoseGames();
          break;
        case "all":
          this.gamesList = await Game.getUserGames();
          break;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.match-area {
  .matches {
    @include area-scroll(500px);
    display: flex;
    flex-direction: column;
    align-items: center;

    > * {
      margin: 20px;
    }
  }
}
</style>
