<template>
  <div class="scr-grid">
    <header-dash class="header gradient" :user-name="user.name" />
    <menu-dash class="menu gradient" @changeArea="changeArea" />
    <games-dash class="games gradient" />
    <area-dash
      class="area"
      :area="menuArea"
      :user="userDash"
      :games="games"
      :stats="userStats"
    />
    <friends-dash class="friends gradient" />
    <news-dash class="news gradient" />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderDashComponent.vue";
import MenuComponent from "./MenuDashComponent.vue";
import GameComponent from "./GamesDashComponent.vue";
import FriendsComponent from "./FriendsDashComponent.vue";
import AreaComponent from "./AreaDashComponent.vue";
import NewsComponent from "./NewsAreaComponent.vue";

import User from "../../../../classes/User";
import Statistics from "../../../../classes/Statistics";

export default {
  name: "DashboardComponent",
  components: {
    "header-dash": HeaderComponent,
    "menu-dash": MenuComponent,
    "games-dash": GameComponent,
    "friends-dash": FriendsComponent,
    "area-dash": AreaComponent,
    "news-dash": NewsComponent,
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
    games: {
      type: Array,
      required: true,
    },
    statistics: {
      type: Array,
      required: true,
    },
  },

  data: function () {
    return {
      menuArea: "",
      userDash: User,
      userStats: Array,
    };
  },

  created() {
    this.createUser();
    this.createStats();
  },

  methods: {
    changeArea(area) {
      this.menuArea = area;
    },
    createUser() {
      this.userDash = Object.assign(new User(), this.user);
    },
    createStats() {
      let arrayStats = this.statistics;
      this.userStats = arrayStats.map((stat) => {
        return Object.assign(new Statistics(), stat);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.scr-grid {
  display: grid;
  grid-template: 150px 400px 270px / minmax(172px, 250px) minmax(600px, auto) minmax(
      172px,
      250px
    );
  gap: 15px;
  margin: 20px;
  background: $dash-gradient;
  border-radius: $dash-panel-border;
  padding: 15px;

  > * {
    border: 0.2px solid rgb(97, 93, 93);
    border-radius: $dash-panel-border;
  }

  .header {
    grid-column: 2 / -1;
  }

  .menu {
    grid-row: 1 / 3;
  }

  .games {
    grid-row: 3 / 4;
  }

  .area {
    grid-row: 2 / 4;
  }

  .friends {
    grid-row: 2 / 3;
  }

  .news {
    grid-row: 3/4;
  }
}
</style>
