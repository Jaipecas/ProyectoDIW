<template>
  <div class="wrapper">
    <div class="vmove">
      <recent-chall
        v-for="chall in recentChall"
        :key="chall.id"
        class="vitem"
        :challenge="chall"
      />
    </div>
  </div>
</template>

<script>
import Game from "../../../../classes/Game";
import Info from "../../../../classes/Info";

import RecentChall from "./RecentChallengeComponent.vue";

export default {
  name: "FriendConectedComponent",
  components: {
    "recent-chall": RecentChall,
  },
  data: function () {
    return {
      recentChall: null,
    };
  },
  created() {
    this.getRecentChallenges();
  },
  methods: {
    async getRecentChallenges() {
      let gamesArray = await Info.getRecentChallenges();
      this.recentChall = gamesArray.map((game, index) => {
        game.id = index;
        return Game.createGame(game);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.wrapper {
  overflow: hidden;
  .vmove {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;

    animation-name: tickerv;
    animation-duration: 20s;
    animation-delay: 2s;
    animation-iteration-count: infinite;
    transform: translateY(450px);
  }
  h3 {
    margin-top: 10px;
    text-align: center;
  }
}

@keyframes tickerv {
  0% {
    bottom: 0;
  }
  17% {
    bottom: 420px;
  }
  32% {
    bottom: 720px;
  }
  47% {
    bottom: 1030px;
  }
  62% {
    bottom: 1350px;
  }
  77% {
    bottom: 1650px;
  }
  100% {
    bottom: 2050px;
  }
}
</style>
