<template>
  <div class="match-dash">
    <h3>Partidas</h3>
    <select class="form-select" @change="onChangeGame($event)">
      <option value="pending" selected>Pendientes</option>
      <option value="all">Todas</option>
    </select>
    <match-dash v-for="game in gamesList" :key="game.id" :game="game" />
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
    },
    async onChangeGame(event) {
      if (event.target.value === "pending") {
        this.gamesList = await Game.getPendingGames();
      } else {
        this.gamesList = await Game.getUserGames();
        console.log(this.gamesList);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
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
</style>
