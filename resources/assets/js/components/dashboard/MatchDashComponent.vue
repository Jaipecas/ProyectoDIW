<template>
  <div class="container-match">
    <div>
      <img src="" alt="" />
      <span>{{ game.language }}</span>
      <span>{{ game.player1.name }}</span>
      <span>{{ game.player2.name }}</span>
      <span>{{ game.score1 }}</span>
      <span> - </span>
      <span>{{ game.score2 }}</span>
    </div>
    <div v-show="game.state !== 'win_p1' && game.state !== 'win_p2'">
      <button class="dash-button">Continuar</button>
      <button class="dash-button">Abandonar</button>
    </div>
  </div>
</template>

<script>
import Game from "../../../../classes/Game";
export default {
  name: "MatchDashComponent",
  props: {
    game: {
      type: Game,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-match {
  display: flex;
  justify-content: center;
  align-items: center;

  div:nth-child(1) {
    > * {
      margin: 10px;
    }
    margin-right: 40px;
  }

  img {
    width: 60px;
    height: 60px;
    border-radius: 40px;
  }

  button {
    @include dash-button($font-size: 1rem);
  }
}
</style>
