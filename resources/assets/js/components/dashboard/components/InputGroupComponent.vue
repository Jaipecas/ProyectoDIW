<template>
  <div>
    <label>{{ title }}</label>
    <input
      v-model="valueInput"
      :type="type"
      class="form-control"
      :value="content"
      @keyup="changeValue"
    />
  </div>
</template>

<script>
export default {
  name: "InputGroupDash",
  props: {
    title: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      required: true,
      validator: function (value) {
        return ["text", "email", "password"].indexOf(value) !== -1;
      },
    },
    content: {
      type: String,
      required: true,
    },
  },

  data: function () {
    return {
      valueInput: "",
    };
  },

  created() {
    this.valueInput = this.content;
  },

  methods: {
    changeValue() {
      this.$emit("change-value", this.title, this.valueInput);
    },
  },
};
</script>

<style lang="scss" scoped></style>
