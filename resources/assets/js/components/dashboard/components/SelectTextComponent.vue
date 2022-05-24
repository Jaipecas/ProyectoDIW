<template>
  <div class="select-text">
    <button name="before" @click="beforeText">&#8672;</button>
    <span>{{ texts[count] }}</span>
    <button name="next" @click="nextText">&#8674;</button>
  </div>
</template>

<script>
export default {
  name: "SelectTextComponent",
  props: {
    texts: {
      type: Array,
      required: true,
    },
  },
  data: function () {
    return {
      count: 0,
    };
  },
  methods: {
    nextText() {
      if (this.count === this.texts.length - 1) {
        this.count = 0;
      } else {
        this.count++;
      }
      this.$emit("change-area", this.count);
    },
    beforeText() {
      if (this.count === 0) {
        this.count = this.texts.length - 1;
      } else {
        this.count--;
      }
      this.$emit("change-area", this.count);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.select-text {
  display: grid;
  grid-template: 1fr / 1fr 4fr 1fr;

  span {
    justify-self: center;
    align-self: center;
  }

  button {
    justify-self: center;
    align-self: center;
    @include round-button(45px, 45px, white, #ef4e7b, 1.5rem);
  }
}
</style>
