<template>
  <div class="header-dash">
    <p>Bienvenido Jaime</p>
  </div>
</template>

<script>
export default {
  name: "HeaderDashComponent",
};
</script>

<style lang="scss" scoped>
.header-dash {
  display: flex;
  align-items: center;
  border: 1px solid black;

  p {
    margin-left: 30px;
    font-size: 2rem;
  }
}
</style>
