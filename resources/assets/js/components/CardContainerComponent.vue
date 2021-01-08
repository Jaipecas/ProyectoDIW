<template>
  <div class="parent">
    <!-- Quiero repetir output-card-component. -->
    <!-- Un hijo no puede acceder directamente a los datos del padre 
                Por eso es necesario enlazarlo con un bind 
                v-bind:card = "pcard" enlaza el valor de card de este componente, 
                y lo pasa como pcard -->
    <div v-if="cards" class="card-container">
      <output-card-component
        v-for="card in cards"
        :key="card.order"
        :pcard="card"
      />
    </div>
    <div v-if="variables" class="card-container">
      <blade-variable-component
        v-for="variable in variables"
        :key="variable.order"
        :pvar="variable"
      />
    </div>
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
  } /* que sea siempre compuesto con - par evitar colisiones con otros tag HTML5 */,
  props: {
    cards: { default: null, type: Array, required: false },
    variables: { default: null, type: Array, required: false },
  },
};
</script>

<style lang="scss" scoped>
.parent {
  min-width: 100%;
}

/* Area de mensajes */
.card-container {
  text-align: center;
  min-width: 100%;
  display: flex;
  align-items: flex-start;
  overflow-x: auto;
}
</style>
