<template>
  <div class="select-lang">
    <button name="before" @click="nextLanguage">&#8672;</button>
    <lang-flag :iso="languages[count]" />
    <button name="next" @click="beforeLanguage">&#8674;</button>
  </div>
</template>

<script>
import LangFlag from "vue-lang-code-flags";

export default {
  name: "SelectLanguageComponent",
  components: {
    "lang-flag": LangFlag,
  },
  props: {
    languages: {
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
    nextLanguage() {
      if (this.count === this.languages.length - 1) {
        this.count = 0;
      } else {
        this.count++;
      }
      this.$emit("selected-lang", this.languages[this.count]);
    },
    beforeLanguage() {
      if (this.count === 0) {
        this.count = this.languages.length - 1;
      } else {
        this.count--;
      }
      this.$emit("selected-lang", this.languages[this.count]);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.select-lang {
  display: flex;
  align-items: center;

  .flag-icon {
    width: 60px;
    height: 40px;
  }

  button {
    @include round-button(45px, 45px, white, #ef4e7b, 1.5rem);
  }
}
</style>
