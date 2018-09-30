<template>
    <div class="output-variable"> 
        <div class="json" v-if="pvar instanceof Object">
            <table>
                <td v-for="(value, key) in pvar" v-bind:key="value">
                    <tr class="key">{{ key }} </tr>
                    <tr class="value">{{ value }}</tr>
                </td>
            </table>
        </div>
        <div class="string" v-else>{{ pvar }}</div>
    </div>
</template>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
    @import "../../sass/variables";
    .output-variable {
        background-color: $card-bg;
        min-width: 400px;
        font-size: 1.3em;
        margin: 0 15px;
        padding: 0.7em 15px;

        .value {
            color: rgb(111, 97, 170);
            font-weight: 700;
        }
        
        table {
            border-spacing: 0.25em 0px;
            border-collapse: separate;
        }

        td {
            text-align: center;
        }   
        
    }
</style>

<script>
export default {
    name: 'blade-variable-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props:  {
        pvar: {
            type: Object,
            required: true,
        }
    },
    mounted() {
        console.log('BladeVariableComponent montado.')
    }
}
</script>
