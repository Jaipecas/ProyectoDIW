<template>
  <div>
    <h3>Notificaciones</h3>
    <select class="form-select" @change="onChangeNotif($event)">
      <option value="unread" selected>No leidos</option>
      <option value="read">Leidos</option>
      <option value="delete">Eliminados</option>
    </select>
    <notification
      v-for="notif in notifList"
      :key="notif.id"
      :notif="notif"
      :state="state"
    />
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
  },
};
</script>
