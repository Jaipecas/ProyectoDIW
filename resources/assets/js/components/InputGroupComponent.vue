<template>
  <div>
    <fieldset>
      <legend>{{ name }}</legend>
      <input :type="type" class="form-control" />
    </fieldset>
  </div>
</template>

<script>
export default {
  name: "InputGroupDash",
  props: {
    name: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
fieldset {
  margin: 8px;
  border: 1px solid silver;
  padding: 8px;
  border-radius: 4px;
}

legend {
  font-size: 1.2rem;
  width: auto;
  padding: 2px;
}
</style>
