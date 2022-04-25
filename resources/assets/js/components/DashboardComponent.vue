<template>
  <div class="scr-grid">
    <header-dash class="header" />
    <menu-dash class="menu" />
    <div class="games" />
    <div class="area" />
    <div class="friends" />
    <div class="news" />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderDashComponent.vue";
import MenuComponent from "./MenuDashComponent.vue";

export default {
  name: "DashboardComponent",
  components: {
    "header-dash": HeaderComponent,
    "menu-dash": MenuComponent,
  },
};
</script>

<style lang="scss" scoped>
.scr-grid {
  display: grid;
  grid-template: 1fr 2fr 1fr / minmax(172px, 250px) minmax(600px, auto) minmax(
      172px,
      250px
    );
  gap: 15px;
  margin: 20px;

  > * {
    background-color: red;
  }

  .header {
    grid-column: 2 / -1;
    background-color: rgb(239, 159, 159);
  }

  .menu {
    grid-row: 1 / 3;
    background-color: rgb(159, 206, 243);
  }

  .games {
    grid-row: 3 / 4;
  }

  .area {
    height: 500px;
    grid-row: 2 / 4;
  }
}
</style>
