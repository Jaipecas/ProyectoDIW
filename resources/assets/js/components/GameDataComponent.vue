<template>
    <div class="game-data"> 
        <div class="info"><span class="data">ID: </span><span class="value">{{ game.id }}</span></div>
        <div class="info"><span class="data">Idioma: </span><span class="value">{{ game.language }}</span></div>
        <div class="info"><span class="data">Estado: </span><span class="value">{{ game.state }}</span></div>
        <div class="info"><span class="data">Inicio: </span><span class="value">{{ game.created_at }}</span></div>
        <div class="info" v-if="game.updated_at"><span class="data">Última tirada: </span><span class="value">{{ game.updated_at }}</span></div>
        <div class="info" v-else><span class="data">Última tirada: </span><span class="value">-</span></div>
    </div>
</template>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
    @import "../../sass/variables";
    .game-data {
        background-color: $card-bg;
        width: 96%;
        margin: 0px 2%;
        display: grid;
        grid-template: 40px / 90px repeat(4,1fr);
        grid-column-gap: 10px;
        font-size: 1.2em;

        .info {
            line-height: 40px;
        }
        
        .value {
            color: rgb(111, 97, 170);
            padding-left: $padding-left;
            font-weight: 700;
        }

        .data {
            padding-left: $padding-left;
            text-align: left;
        }
    }
</style>

<script>
export default {
    name: 'game-data-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props: [ 'game' ],
    mounted() {
        console.log('GameDataComponent montado.');
    }
}
</script>
