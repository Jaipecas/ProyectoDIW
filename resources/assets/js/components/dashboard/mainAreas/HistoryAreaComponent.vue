<template>
  <div class="history-wrapper">
    <div>
      <h2 class="header-area-dash">Historial</h2>
    </div>
    <div>
      <game-card
        v-for="game in gamesList"
        :key="game.id"
        :game="game"
        :user-id="user.id"
      />
    </div>
    <move-buttons
      :length-list="pages.last_page"
      size-buttons="M"
      @change-count="changePage"
    />
  </div>
</template>

<script>
import MoveButtons from "../components/MoveButtonsComponent.vue";
import GameCard from "../components/GameCardComponent.vue";

import User from "../../../../../classes/User";
import Game from "../../../../../classes/Game";

export default {
  name: "HistoryAreaComponent",
  components: {
    "move-buttons": MoveButtons,
    "game-card": GameCard,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      pages: null,
      gamesList: null,
      userData: User,
      url: "/scrabble/user/games/",
    };
  },
  created() {
    this.userData = this.user;
    this.getGames(this.url);
  },
  methods: {
    changePage(count, id) {
      switch (id) {
        case "b-next":
          this.url = this.pages.next_page_url;
          break;
        case "b-before":
          this.url = this.pages.prev_page_url;
          break;
        case "b-first":
          this.url = this.pages.first_page_url;
          break;
        case "b-last":
          this.url = this.pages.last_page_url;
          break;
      }
      this.getGames();
    },
    async getGames() {
      if (this.url) this.pages = await this.userData.getUserGames(this.url);
      this.gamesList = Game.setPrototypeGames(this.pages.data);
    },
  },
};
</script>
<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.history-wrapper {
  display: grid;
  grid-template: 100px 1fr 70px/ 1fr;
  background-image: linear-gradient(#1098ad, #c0d7db);
  height: 100%;
  border-radius: 10px;

  div:nth-child(1) {
    grid-row: 1/2;
  }

  div:nth-child(2) {
    grid-row: 2/3;
    padding: 10px;
  }
  div:nth-child(3) {
    grid-row: 3/4;
    padding: 10px;
  }
}
</style>
