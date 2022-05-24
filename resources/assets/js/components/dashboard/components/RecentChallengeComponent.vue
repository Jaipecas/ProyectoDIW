<template>
  <div class="wrapper">
    <img class="img-avatar" :src="challenge.player1.avatar" />
    <div>
      <country-flag
        :country="challenge.player1.country"
        size="small"
        :rounded="true"
      />
      <span>{{ challenge.player1.name }}</span>
    </div>
    <div>
      <span>{{ challenge.score1 }}</span>
      <span>VS</span>
      <span>{{ challenge.score2 }}</span>
    </div>
    <div>
      <country-flag
        :country="challenge.player2.country"
        size="small"
        :rounded="true"
      />
      <span>{{ challenge.player2.name }}</span>
    </div>
    <img class="img-avatar" :src="challenge.player2.avatar" />
  </div>
</template>

<script>
import Game from "../../../../../classes/Game";
import CountryFlag from "vue-country-flag";

export default {
  name: "RecentChallengesComponent",
  components: {
    "country-flag": CountryFlag,
  },
  props: {
    challenge: {
      type: Game,
      required: true,
    },
  },
};
</script>
<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.wrapper {
  @include dash-card(#07b39b, 150px, 1rem);
  display: grid;
  grid-template: 1fr 0.5fr 2fr 0.5fr 1fr/ 1fr;
  padding: 10px;
  margin-top: 20px;
  margin-bottom: 20px;

  > * {
    justify-self: center;
  }

  img {
    width: 50px;
    height: 50px;
  }

  :nth-child(3) {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  :nth-child(4) {
    align-self: end;
  }
  :nth-child(5) {
    align-self: end;
  }
}
</style>
