<template>
    <div class="output-card"> 
        <div class="info number">{{ pcard.order }}</div>
        <div class="info type"> {{ pcard.type }}</div>
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
        position: relative;
        top:0;
        left: 0;

        .info {
            position: absolute;
            top: 0;
            font-size: 1em;
            padding-top: 0.4em;
        }
        
        .type {
            right: 0;
            color: $info-type-color;
            padding-right: 0.6em;
            font-weight: 300;
        }

        .number {
            left: 0;
            color: rgb(111, 97, 170);
            padding-left: 0.4em;
            font-weight: 700;
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
