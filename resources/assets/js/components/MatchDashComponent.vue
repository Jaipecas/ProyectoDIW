<template>
  <div class="container-match">
    <div>
      <img src="../../../../public/img/01 Gutenberg.jpg" alt="" />
      <span>{{ player }}</span>
      <span>{{ score1 }}</span>
      <span> - </span>
      <span>{{ score2 }}</span>
    </div>
    <div>
      <button class="dash-button">Continuar</button>
      <button class="dash-button">Abandonar</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "MatchDashComponent",
  props: {
    player: {
      type: String,
      required: true,
    },
    score1: {
      type: Number,
      required: true,
    },
    score2: {
      type: Number,
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
