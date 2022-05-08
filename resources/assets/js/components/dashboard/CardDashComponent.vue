<template>
  <div class="dash-card">
    <div class="header">
      {{ title }}
    </div>
    <div class="content">
      <p>{{ stat }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardDashComponent",
  props: {
    title: {
      type: String,
      required: true,
    },
    statString: {
      type: String,
      required: false,
      default: "",
    },
    statInteger: {
      type: Number,
      required: false,
      default: 0,
    },
  },
  data: function () {
    return {
      stat: "",
    };
  },
  created() {
    this.insertStat();
  },
  methods: {
    insertStat() {
      if (this.statString === "") {
        this.stat = this.statInteger;
      } else {
        this.stat = this.statString;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";
</style>
