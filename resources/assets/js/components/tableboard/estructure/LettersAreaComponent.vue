<template>
  <div class="letters-area">
    <div>
      <div v-for="(lett, index) in letters" :key="index" class="letter">
        {{ lett }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LettersAreaComponent",
  data: function () {
    return {
      letters: ["A", "R", "P", "O", "A", "R", "B"],
    };
  },
};
</script>
<style lang="scss" scoped>
@import "resources/assets/sass/_tableboard_main.scss";

.letters-area {
  display: flex;
  justify-content: center;
  align-items: center;

  div {
    display: grid;
    grid-template: 1fr / repeat(7, 1fr);

    > * {
      @include token-tableboard(60px, 60px, 0px);
      justify-self: center;
      align-self: center;
      margin: 10px;
      cursor: pointer;

      &:active {
        cursor: grabbing;
      }
    }
  }
}
</style>
