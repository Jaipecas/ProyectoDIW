<template>
  <div class="output-variable">
    <div v-if="pvar instanceof Object" class="json">
      <table>
        <td v-for="(value, key) in pvar" :key="key">
          <tr class="key">
            {{
              key | reducido
            }}
          </tr>
          <tr class="value">
            {{
              value === null ? "-" : value
            }}
          </tr>
        </td>
      </table>
    </div>
    <div v-else class="string">
      {{ pvar }}
    </div>
  </div>
</template>

<script>
export default {
  name: "BladeVariableComponent",
  filters: {
    reducido: function (val) {
      if (val.length < 10) return val;
      else
        return (
          val.substring(0, 4) +
          "..." +
          val.substring(val.length - 3, val.length)
        );
    },
  } /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */,
  props: {
    pvar: {
      type: Object,
      required: true,
    },
  },
  mounted() {
    console.log("BladeVariableComponent montado.");
  },
};
</script>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
@import "../../sass/variables";
.output-variable {
  background-color: $card-bg;
  min-width: 650px;
  font-size: 1rem;
  margin: 0 15px;
  padding: 0.7em 4px;

  .value {
    color: rgb(111, 97, 170);
    font-weight: 700;
  }

  table {
    border-spacing: 0.25em 0;
    border-collapse: separate;
  }

  td {
    text-align: center;
  }
}
</style>
