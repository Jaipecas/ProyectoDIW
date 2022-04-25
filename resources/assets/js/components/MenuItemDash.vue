<template>
  <div>
    <span :class="icon" />
    <span>{{ title }}</span>
  </div>
</template>

<script>
export default {
  name: "MenuItem",
  props: ["icon", "title"],
};
</script>

<style lang="scss" scoped>
div {
  font-size: 1.2rem;
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>
