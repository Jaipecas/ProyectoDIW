<template>
  <div>
    <user-area v-if="area == 'Perfil'" :user="user" />
    <games-area
      v-else-if="area == 'Partidas'"
      :user="user"
      :pending-games="games"
    />
    <stats-area
      v-else-if="area == 'Estadisticas'"
      :stats="stats"
      :user="user"
    />
    <notif-area v-else-if="area == 'Notificaciones'" />
    <history-area v-else-if="area == 'Historial'" :user="user" />
  </div>
</template>

<script>
import UserDashArea from "../mainAreas/UserAreaDashComponent.vue";
import NotificationsAreaDashComponent from "../mainAreas/NorificationsAreaDashComponent.vue";
import GameAreaDashComponent from "../mainAreas/GamesAreaDashComponent.vue";
import StatsArea from "../mainAreas/StatsAreaDashComponent.vue";
import HistoryArea from "../mainAreas/HistoryAreaComponent.vue";

import User from "../../../../../classes/User";

export default {
  name: "AreaDashComponent",
  components: {
    "user-area": UserDashArea,
    "stats-area": StatsArea,
    "notif-area": NotificationsAreaDashComponent,
    "games-area": GameAreaDashComponent,
    "history-area": HistoryArea,
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
    games: {
      type: Array,
      required: true,
    },
    stats: {
      type: Array,
      required: true,
    },
  },
};
</script>
