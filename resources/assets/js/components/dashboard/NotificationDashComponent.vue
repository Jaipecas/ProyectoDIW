<template>
  <div>
    <span>{{ dateFormat }}</span>
    <span>{{ timeFormat }}</span>
    <span>{{ typeNotif }}</span>
    <div :class="changeOverflow" @click="showNotifText">
      <span>{{ textNotif }}</span>
    </div>
    <button>Eliminar</button>
  </div>
</template>

<script>
export default {
  name: "NotificationDashComponent",
  props: {
    dateNotif: {
      type: Date,
      required: true,
    },
    typeNotif: {
      type: String,
      required: true,
    },
    textNotif: {
      type: String,
      required: true,
    },
  },

  data: function () {
    return {
      dateFormat: null,
      timeFormat: null,
      showText: false,
    };
  },
  computed: {
    changeOverflow: function () {
      return this.showText ? "text text-show" : "text text-hidden";
    },
  },
  created() {
    this.convertDate();
  },

  methods: {
    convertDate() {
      let date = new Date(this.dateNotif);
      this.dateFormat = date.toLocaleDateString("es-ES");
      this.timeFormat = date.toLocaleTimeString("es-ES");
    },
    showNotifText() {
      this.showText = !this.showText;
    },
  },
};
</script>

<style lang="scss" scoped>
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
