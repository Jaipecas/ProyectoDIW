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
    <img
      v-if="state == 'delete'"
      src="/img/carpeta.png"
      alt="carpeta"
      @click="modifyNotification"
    />
    <img
      v-else
      src="/img/papelera.png"
      alt="papelera"
      @click="deleteNotification"
    />
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
      this.notifFont = "notif notif-normal";
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
        this.notifFont = "notif notif-bold";
      } else {
        this.notifFont = "notif notif-normal";
      }
    },
    deleteNotification() {
      this.notif.updateState("delete");
      this.$emit("delete-notif", this.notif.id);
    },
    modifyNotification() {
      this.notif.updateState("read");
      this.$emit("delete-notif", this.notif.id);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

div {
  cursor: pointer;
  display: flex;
  justify-content: space-between;
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
  img {
    width: 30px;
    height: 30px;
  }
}

.notif {
  border: 0.5px solid black;
  background: #d3b0f6;
  border-radius: 5px;
}

.notif-bold {
  font-weight: bold;
}

.notif-normal {
  font-weight: normal;
}
</style>
