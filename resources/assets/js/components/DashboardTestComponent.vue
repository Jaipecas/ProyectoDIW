<template>
    <div id="dash">
        <user-data-component 
            :user="c_user" :avatar="c_avatar"
            @avatar-change="onAvatarChange">
        </user-data-component> 
        <p class="variables-title">Estadísticas</p>
        <card-container-component :variables="c_variables"></card-container-component> 
        <aside class="sidebar">
            <ul>
                
                <li class="input-menu" id="b04">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <li class="input-menu upper-margin" id="b05"><a v-on:click.prevent="removeAvatar" href="#">Elimina avatar</a></li>
                <li class="input-menu" id="b06"><a>Estadísticas usuarios</a></li>
                <li class="input-menu" id="b07"><a>Últimas partidas en juego</a></li>
            </ul>
        </aside>
        <card-container-component :cards="c_cards"></card-container-component> 
    </div>
</template>

<script>
import UserDataComponent from './UserDataComponent'
import CardContainerComponent from './CardContainerComponent'

export default {
    name: 'dashboard-test-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props: {
        user: { required: true, type: Object },
        avatar: { required: true, type: String },
        variables: { required: true, type: Array }
    },
    data() {
        return {
            c_user: null,
            c_avatar: null,
            c_variables: null,
            c_cards: []
        }
    },
    components: {
        CardContainerComponent, UserDataComponent
    },
    methods: {
        onAvatarChange: function (image) {
            this.c_avatar = image;
        },
        removeAvatar: function(event) {
          //  event.preventDefault(); no hace falta ya que lo he puesto en la llamada
            this.c_avatar = null;
            var vm = this;
            return axios.post('/user/avatar/remove')
                .then(function (response) {
                    
                    console.log("Elimina avatar respuesta:", response);
                    var newcard = {
                        order: vm.c_cards.length + 1,
                        type: 'Remove Avatar',
                        errorCode: response.status,
                        statusCode: response.statusText,
                        output: response.data
                    }

                    vm.c_cards.push(newcard);
                })
                .catch(function (error) {
                    var newcard = {
                        order: vm.c_cards.length + 1,
                        type: 'Remove Avatar',
                        errorCode: error.response.status,
                        statusCode: error.response.statusText,
                        output: error.response.data
                    }

                    vm.c_cards.push(newcard);

                    console.log("ERROR: " + error);
                });
        }
    },
    created() {
        this.c_user = this.user;
        this.c_variables = this.variables;

        if (!this.avatar) 
            this.c_avatar = null;
        else
            this.c_avatar = this.avatar;
    },
    mounted() {
        console.log('DashboardComponent montado.');
    }
}
</script>

<style lang="scss" scoped>
#dash {
    max-width: 100%;
    display: grid;
    grid-gap: 10px;
    grid-template-columns: 1fr 0.5fr 6fr;

    > div:nth-child(1) {
        grid-column: 1 / 4; 
    }

    > div:nth-child(3) {
        grid-column: 2 / 4; 
    }
}

.sidebar {
    grid-column: 1 / 3; 
 }

.variables-title {
    font-size: 1.6em;
    padding: 0.5em;
    font-weight: 500;
    margin-left: 15%;
}
 </style>