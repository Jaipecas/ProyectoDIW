<template>
  <div>
    <user-area v-show="area == 'Perfil'" :user="user" />
    <games-area v-show="area == 'Partidas'" :user="user" />
    <stats-area v-show="area == 'Estadisticas'" />
    <notif-area v-show="area == 'Notificaciones'" />
  </div>
</template>

<script>
import UserDashArea from "./UserAreaDashComponent.vue";
import NotificationsAreaDashComponent from "./NorificationsAreaDashComponent.vue";
import GameAreaDashComponent from "./GamesAreaDashComponent.vue";
import StatsArea from "./StatsAreaDashComponent.vue";

import User from "../../../../classes/User";

export default {
  name: "AreaDashComponent",
  components: {
    "user-area": UserDashArea,
    "stats-area": StatsArea,
    "notif-area": NotificationsAreaDashComponent,
    "games-area": GameAreaDashComponent,
  },
  props: {
    area: {
      type: String,
      required: true,
      default: "Partidas",
    },
    user: {
      type: User,
      required: true,
    },
  },
};
</script>
