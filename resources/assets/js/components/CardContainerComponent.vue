<template>
  <!-- el atributo ref me permite definir un nombre que permite utilizar el elemento
  en el que se ubica desde el código Vue a través de this.$refs.nombre -->
  <div ref="container" class="card-container">
    <!-- Quiero repetir output-card-component. -->
    <!-- Un hijo no puede acceder directamente a los datos del padre 
                Por eso es necesario enlazarlo con un bind 
                v-bind:card = "pcard" enlaza el valor de card de este componente, 
                y lo pasa como pcard -->
    <template v-if="cards">
      <output-card-component
        v-for="card in cards"
        :key="card.order"
        :pcard="card"
      />
    </template>
    <template v-if="variables">
      <blade-variable-component
        v-for="variable in variables"
        :key="variable.order"
        :pvar="variable"
      />
    </template>
  </div>
</template>

<script>
import OutputCardComponent from "./OutputCardComponent";
import BladeVariableComponent from "./BladeVariableComponent";

export default {
  name: "CardContainerComponent",
  components: {
    OutputCardComponent,
    BladeVariableComponent,
  } /* que sea siempre compuesto con - par evitar colisiones con otros tag HTMHL5 */,
  props: {
    cards: { default: null, type: Array, required: false },
    variables: { default: null, type: Array, required: false },
  },
  methods: {
    scroll: function (toEnd) {
      if (toEnd)
        this.$refs.container.scrollLeft = this.$refs.container.scrollWidth;
      else this.$refs["container"].scrollLeft = 0;
    },
  },
};
</script>

<style lang="scss" scoped>
/* Area de mensajes */
.card-container {
  text-align: center;
  min-width: 100%;
  display: flex;
  align-items: flex-end;
  overflow-x: auto;
}
</style>
