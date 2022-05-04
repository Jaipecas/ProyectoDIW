<template>
  <div :class="notifFont" @click="showNotifText">
    <div>
      <span>{{ dateFormat }}</span>
      <span>{{ timeFormat }}</span>
      <img :src="iconNotif" class="icon" />
      <div :class="changeOverflow">
        <span>{{ notif.notification }}</span>
      </div>
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
    state: {
      type: String,
      required: true,
    },
  },

  data: function () {
    return {
      dateFormat: null,
      timeFormat: null,
      showText: false,
      iconNotif: "",
      notifFont: "",
    };
  },
  computed: {
    changeOverflow: function () {
      return this.showText ? "text text-show" : "text text-hidden";
    },
  },
  created() {
    console.log("CREADO");
    this.convertDate();
    this.insertIcon();
    this.insertFont();
  },

  methods: {
    convertDate() {
      let date = new Date(this.notif.updated_at);
      this.dateFormat = date.toLocaleDateString("es-ES");
      this.timeFormat = date.toLocaleTimeString("es-ES");
    },
    showNotifText() {
      this.showText = !this.showText;
      this.notifFont = "notif-normal";
      if (this.state === "unread") this.notif.updateState("read");
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
    insertFont() {
      if (this.state === "unread") {
        this.notifFont = "notif-bold";
      } else {
        this.notifFont = "notif-normal";
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

div {
  cursor: pointer;
  display: flex;
  > * {
    margin: 5px;
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

.notif-bold {
  font-weight: bold;
}

.notif-normal {
  font-weight: normal;
}
</style>
