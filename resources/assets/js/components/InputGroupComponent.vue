<template>
  <div>
    <fieldset>
      <legend>{{ tittleCard }}</legend>
      <input :type="type" class="form-control" :value="content" />
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
    },
    content: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
fieldset {
  margin: 8px;
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
