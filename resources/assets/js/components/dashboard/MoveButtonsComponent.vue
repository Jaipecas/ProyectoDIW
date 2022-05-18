<template>
  <div class="wrapper">
    <button class="button-text" @click="first">Primera</button>
    <div class="buttons-center">
      <button :class="setClassButton" @click="before">&#8672;</button>
      <button :class="setClassButton" @click="next">&#8674;</button>
    </div>
    <button class="button-text" @click="last">Última</button>
  </div>
</template>
<script>
export default {
  name: "MoveButtonsComponent",
  props: {
    lengthList: {
      type: Number,
      required: true,
    },
    sizeButtons: {
      type: String,
      required: true,
    },
  },
  data: function () {
    return {
      count: 0,
    };
  },
  computed: {
    setClassButton: function () {
      let classButton = "";
      switch (this.sizeButtons) {
        case "S":
          classButton = "button-arrow-s";
          break;
        case "M":
          classButton = "button-arrow-m";
          break;
        case "L":
          classButton = "button-arrow-l";
          break;
        case "XL":
          classButton = "button-arrow-xl";
          break;
      }
      return classButton;
    },
  },
  methods: {
    next() {
      if (this.count < this.lengthList) {
        this.count++;
        this.$emit("change-count", this.count);
      }
    },
    before() {
      if (this.count !== 0) {
        this.count--;
        this.$emit("change-count", this.count);
      }
    },
    first() {
      this.count = 0;
      this.$emit("change-count", this.count);
    },
    last() {
      this.count = this.lengthList;
      this.$emit("change-count", this.count);
    },
  },
};
</script>
<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.wrapper {
  display: grid;
  grid-template: 1fr / 0.5fr 1fr 0.5fr;

  .button-text {
    @include dash-button(0.8rem);
  }
  .buttons-center {
    justify-self: center;
    align-self: center;

    .button-arrow-s {
      @include round-button(30px, 30px, white, #ef4e7b, 1rem);
    }
    .button-arrow-m {
      @include round-button(50px, 50px, white, #ef4e7b, 1.3rem);
    }
    .button-arrow-l {
      @include round-button(100px, 100px, white, #ef4e7b, 1rem);
    }
    .button-arrow-xl {
      @include round-button(150px, 150px, white, #ef4e7b, 1rem);
    }
  }
}
</style>
