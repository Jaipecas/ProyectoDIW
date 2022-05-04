<template>
  <div>
    <h2 class="header-area-dash">Notificaciones</h2>
    <select class="form-select combo-area-dash" @change="onChangeNotif($event)">
      <option value="unread" selected>No leidos</option>
      <option value="read">Leidos</option>
      <option value="delete">Eliminados</option>
    </select>
    <div class="notifications">
      <notification
        v-for="notif in notifList"
        :key="notif.id"
        :notif="notif"
        :state="state"
        @delete-notif="deleteNotif"
      />
    </div>
  </div>
</template>

<script>
import NotificationDash from "./NotificationDashComponent.vue";
import Notification from "../../../../classes/Notification";

export default {
  name: "NotificationsAreaDashComponent",
  components: {
    notification: NotificationDash,
  },
  data: function () {
    return {
      notifList: Array,
      state: String,
    };
  },
  created() {
    this.loadNotifications("unread");
  },
  methods: {
    async loadNotifications(state) {
      this.notifList = await Notification.getNotifications(state);
      this.state = state;
    },
    onChangeNotif(event) {
      this.loadNotifications(event.target.value);
      this.state = event.target.value;
    },
    deleteNotif(id) {
      this.notifList = this.notifList.filter((notif) => notif.id !== id);
    },
  },
};
</script>
<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.notifications {
  margin-top: 20px;
}
</style>
