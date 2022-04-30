<template>
  <div>
    <p>VS Jugador 2</p>
    <button>Continuar</button>
  </div>
</template>

<script>
export default {
  name: "PendingMatchComponent",
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";
div {
  display: flex;
  flex-flow: column;
  align-items: center;
  padding: 10px;
  button {
    @include dash-button($font-size: 1rem);
  }
}
</style>
