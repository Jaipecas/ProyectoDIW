<template>
  <div>
    <span>{{ dateFormat }}</span>
    <span>{{ timeFormat }}</span>
    <img :src="iconNotif" class="icon" />
    <div :class="changeOverflow" @click="showNotifText">
      <span>{{ notif.notification }}</span>
    </div>
    <button>Eliminar</button>
  </div>
</template>

<script>
import Notification from "../../../../classes/Notification";
export default {
  name: "NotificationDashComponent",
  props: {
    notif: {
      type: Notification,
      required: true,
    },
  },

  data: function () {
    return {
      dateFormat: null,
      timeFormat: null,
      showText: false,
      iconNotif: "",
    };
  },
  computed: {
    changeOverflow: function () {
      return this.showText ? "text text-show" : "text text-hidden";
    },
  },
  created() {
    this.convertDate();
    this.insertIcon();
  },

  methods: {
    convertDate() {
      let date = new Date(this.notif.update_at);
      this.dateFormat = date.toLocaleDateString("es-ES");
      this.timeFormat = date.toLocaleTimeString("es-ES");
    },
    showNotifText() {
      this.showText = !this.showText;
    },
    insertIcon() {
      switch (this.notif.type) {
        case "warning":
          this.iconNotif = "/img/warning.png";
          break;
        case "info":
          this.iconNotif = "/img/information.png";
          break;
        case "important":
          this.iconNotif = "/img/exclamation-mark.png";
          break;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

div {
  display: flex;
  > * {
    margin: 10px;
  }
  .text {
    margin: 0px;
  }
  .text-hidden {
    overflow: hidden;
    height: 30px;
  }
  .text-show {
    overflow: visible;
  }
  button {
    max-width: 70px;
    max-height: 28px;
  }
}
</style>
