<template>
  <div class="scr-grid">
    <header-dash class="header" />
    <menu-dash class="menu" />
    <games-dash class="games" />
    <area-dash class="area" />
    <friends-dash class="friends" />
    <div class="news" />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderDashComponent.vue";
import MenuComponent from "./MenuDashComponent.vue";
import GameComponent from "./GamesDashComponent.vue";
import FriendsComponent from "./FriendsDashComponent.vue";
import AreaComponent from "./AreaDashComponent.vue";

export default {
  name: "DashboardComponent",
  components: {
    "header-dash": HeaderComponent,
    "menu-dash": MenuComponent,
    "games-dash": GameComponent,
    "friends-dash": FriendsComponent,
    "area-dash": AreaComponent,
  },
};
</script>

<style lang="scss" scoped>
.scr-grid {
  display: grid;
  grid-template: 0.5fr 2fr 1fr / minmax(172px, 250px) minmax(600px, auto) minmax(
      172px,
      250px
    );
  gap: 15px;
  margin: 20px;

  > * {
    border: 1px solid black;
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
    background-color: rgb(187, 254, 145);
  }

  .area {
    grid-row: 2 / 4;
  }

  .friends {
    grid-row: 2 / 3;
    background-color: rgb(243, 175, 245);
  }

  .news {
    grid-row: 3/4;
  }
}
</style>
