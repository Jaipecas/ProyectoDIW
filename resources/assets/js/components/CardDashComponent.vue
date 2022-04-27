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
    stat: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";
</style>
