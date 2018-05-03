<template>
    <div class="output-card"> 
        <div class="info number">{{ pcard.order }}</div>
        <div class="info type"> {{ pcard.type }}</div>
        <div class="data">
            <p>Estado</p>
            <!-- hago un bind a la propiedad class, de manera que activo la
                clase error en el caso de que el error sea mayor de 204 -->
            <div class="status" :class="{ 'error': pcard.errorCode > 204 }">
                {{ pcard.errorCode }} {{ pcard.statusCode }}
            </div>
            <p>Salida</p>
            <div class="output">
                <div class="json" v-if="pcard.output instanceof Object">
                    <!-- <table>
                        <tr v-for="(value, key) in pcard.output" v-bind:key="value">
                            <td class="key">{{ key }}: </td>
                            <td class="value">{{ value }}</td>
                        </tr>
                     </table> -->
                     <!-- No es necesario añadir un filtro para formatear los datos
                          En versiones previas de vue si que era necesario | json -->
                   <pre>{{ pcard.output }}</pre>
                </div>
                <div class="string" v-else>{{ pcard.output }}</div>
            </div>
        </div>
    </div>
</template>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
    @import "../../sass/variables";
    .output-card {
        background-color: $card-bg;
        min-width: 400px;
        max-width: 600px;
        margin: 15px;

        .info {
            font-size: 1em;
            padding-top: 0.4em;
            margin-bottom: 0.65em;
        }
        
        .type {
            float: right;
            color: $info-type-color;
            padding-right: 0.6em;
            font-weight: 300;
        }

        .number {
            float: left;
            color: rgb(111, 97, 170);
            padding-left: $padding-left;
            font-weight: 700;
        }

        .data {
            padding-left: $padding-left;
            text-align: left;
            clear: both;

            p {
                margin-top: 0.6em;
                margin-bottom: 0.3em;
            }

            .status {
                color: #18dd4a;
                padding-left: $padding-left-output;
            }

            .error {
                color: #df2914ee;
            }
        }

        .output {
            color:#9b9ba5;
            padding-left: $padding-left-output;

            table {
                border-collapse: collapse;
                width: 80%;
            }

            td {
                text-align: left;
            }
        }
    }
</style>

<script>
export default {
    name: 'output-card-component', /* que sea siempre compuesto con - par evitar colisiones con otros tag HTMHL5 */
    props:  {
        pcard: {
            type: Object,
            required: true,
        }
    },
    /* si hubieran datos internos, que no es el caso
    data () {   // en un componente SIEMPRE tiene que ser una función 
        return { var1: 'hola' }
    }*/
    mounted() {
        console.log('OutputCardComponent montado.')
    }
}
</script>
