<template>
    <div class="user-data"> 
        <div class="avatar">{{ user.id }}</div>
        <div class="dato"><span class="data">ID: </span><span class="value">{{ user.id }}</span></div>
        <div class=""><span class="data">Usuario: </span><span class="value">{{ user.name }}</span></div>
        <div class=""><span class="data">Mail: </span><span class="value">{{ user.email }}</span></div>
        <div class=""><span class="data">País: </span><span class="value">{{ user.country }}</span></div>
        <div class=""><span class="data">Lenguaje favorito: </span><span class="value">{{ user.favourite_language}}</span></div>
        <div class="" v-if="user.updated_at"><span class="data">Última actualización: </span><span class="value">{{ user.updated_at }}</span></div>
        <div class="" v-else><span class="data">Última actualización: </span><span class="value">Nunca</span></div>
    </div>
</template>

<!-- el estilo lo implemento en scss -->
<!-- además, para ganar en reusabilidad y evitar conflictos, hago que las clases
     sólo tengan validez en el componente -->
<style lang="scss" scoped>
    @import "../../sass/variables";
    .user-data {
        background-color: $card-bg;
        width: 100%;
        margin: 15px;
        display: grid;
        grid-template: repeat(2,40px) / 200px repeat(3,1fr);
        grid-column-gap: 10px;
        font-size: 1.2em;

        .avatar {
            grid-column: 1 / 2;
            grid-row: 1 / 3;
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
    name: 'user-data-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props: ['user'],
    mounted() {
        console.log('UserDataComponent montado.');
        console.log('Datos usuario:', this.user );
    }
}
</script>
