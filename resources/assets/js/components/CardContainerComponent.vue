<template>
    <div class="card-container">
        <!-- Quiero repetir output-card-component. -->
        <!-- Un hijo no puede acceder directamente a los datos del padre 
                Por eso es necesario enlazarlo con un bind 
                v-bind:card = "pcard" enlaza el valor de card de este componente, 
                y lo pasa como pcard -->
            <output-card-component v-if="cards" v-for='card in cards' :key='card.order' v-bind:pcard='card'>
            </output-card-component>
            <blade-variable-component v-if="variables" v-for='variable in variables' :key='variable.order' v-bind:pvar='variable'>
            </blade-variable-component>
    </div>
</template>

<script>
import OutputCardComponent from './OutputCardComponent'
import BladeVariableComponent from './BladeVariableComponent'

export default {
    name: 'card-container-component', /* que sea siempre compuesto con - par evitar colisiones con otros tag HTMHL5 */
    props: {
        cards: { type: Array, required: false },
        variables: { type: Array, required: false }
    },
    components: {
        OutputCardComponent, BladeVariableComponent
    }
}
</script>

<style lang="scss" scoped>
/* Area de mensajes */
.card-container {
    text-align: center;
    min-width: 100%;
    display: flex;
    align-items: flex-start;
    overflow-x: auto;
}

</style>


