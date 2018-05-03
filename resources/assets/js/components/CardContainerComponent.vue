<template>
    <div>
        <div class="card-container">
            <!-- Quiero repetir output-card-component. -->
            <!-- Un hijo no puede acceder directamente a los datos del padre 
                 Por eso es necesario enlazarlo con un bind 
                 v-bind:card = "pcard" enlaza el valor de card de este componente, 
                 y lo pasa como pcard -->
            <output-card-component v-for='card in cards' :key='card.order' v-bind:pcard='card'>
            </output-card-component>
        </div>
    </div>  
</template>

<script>
import OutputCardComponent from './OutputCardComponent'

export default {
    name: 'card-container-component', /* que sea siempre compuesto con - par evitar colisiones con otros tag HTMHL5 */
    props: {
        cards: {
            type: Array,
            required: true,
        }
    },
    components: {
        OutputCardComponent
    }
}
</script>

<style lang="scss" scoped>
/* Area de mensajes */
.card-container {
    text-align: center;
    min-width: 100%;
    min-height: 200px;
    display: flex;
    align-items: flex-start;
    float: right;
    overflow-x: auto;
}
</style>


