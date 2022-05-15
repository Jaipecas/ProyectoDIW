<template>
  <div>
    <fieldset>
      <legend>{{ tittleCard }}</legend>
      <input
        v-model="valueInput"
        :type="type"
        class="form-control"
        :value="content"
        @keyup="changeValue"
      />
    </fieldset>
  </div>
</template>

<script>
export default {
  name: "InputGroupDash",
  props: {
    tittleCard: {
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
    editable: {
      type: Boolean,
      default: true,
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
      this.$emit("change-value", this.tittleCard, this.valueInput);
    },
  },
};
</script>

<style lang="scss" scoped>
fieldset {
  border: 2px solid #ef4e7b;
  padding: 8px;
  border-radius: 4px;
}

legend {
  font-size: 1.2rem;
  width: auto;
  padding: 2px;
}
</style>
