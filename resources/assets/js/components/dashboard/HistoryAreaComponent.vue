<template>
  <div class="history-wrapper">
    <div>
      <h2 class="header-area-dash">Historial</h2>
    </div>
    <div>
      <p>{{ pageNumber }}</p>
    </div>
    <move-buttons
      :length-list="5"
      size-buttons="M"
      @change-count="changePage"
    />
  </div>
</template>

<script>
import User from "../../../../classes/User";
import Game from "../../../../classes/Game";
import MoveButtons from "./MoveButtonsComponent.vue";

export default {
  name: "HistoryAreaComponent",
  components: {
    "move-buttons": MoveButtons,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      pageNumber: 0,
      pages: null,
      gamesList: null,
      userData: User,
    };
  },
  created() {
    this.userData = this.user;
    this.getGames();
  },
  methods: {
    changePage(count) {
      this.pageNumber = count;
    },
    async getGames() {
      this.pages = await this.userData.getUserGames();
      this.gamesList = Game.setPrototypeGame(this.pages.data);
    },
  },
};
</script>
<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.history-wrapper {
  display: grid;
  grid-template: 100px 50px 1fr 100px/ 1fr;

  div:nth-child(1) {
    grid-row: 1/2;
    border: 1px solid red;
  }

  div:nth-child(2) {
    grid-row: 2/3;
    border: 1px solid blue;
  }
  div:nth-child(3) {
    grid-row: 3/4;
    padding: 10px;
    border: 1px solid black;
  }
}
</style>
