<template>
  <div>
    <a :class="icon" @click="changeArea" />
    <a @click="changeArea">{{ title }}</a>
  </div>
</template>

<script>
export default {
  name: "MenuItem",
  props: {
    icon: {
      type: String,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
  },
  methods: {
    changeArea() {
      this.$emit("changeArea", this.title);
    },
  },
};
</script>

<style lang="scss" scoped>
div {
  font-size: 1.2rem;
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>
