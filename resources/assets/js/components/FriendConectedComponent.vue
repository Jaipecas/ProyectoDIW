<template>
  <div>
    <img src="../../../../public/img/01 Gutenberg.jpg" alt="" />
    <span>Jugador 1</span>
    <button>Retar</button>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
div {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 10px;

  > * {
    padding: 8px;
  }

  img {
    width: 60px;
    height: 60px;
    border-radius: 40px;
  }
}
</style>
