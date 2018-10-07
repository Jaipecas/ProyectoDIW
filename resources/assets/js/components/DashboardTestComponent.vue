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
                <li class="input-menu" id="b06"><a v-on:click.prevent="giveupGame" href="#">Abandonar partida</a></li>
                <li class="input-menu" id="b07"><a v-on:click.prevent="userStatistics" href="#">Estadísticas usuario</a></li>
                <li class="input-menu" id="b08"><a v-on:click.prevent="removeUser" href="#">Eliminar cuenta</a></li>
                <li class="input-menu" id="b08"><a>Últimas partidas en juego</a></li>
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
        removeUser: function() {

        },
        userStatistics: function() {
            var vm = this;
            // estadísiticas via AJAX
            return axios.get('/user/statistics')
                .then(function (response) {
                    console.log("Estadísticas:", response);
                    createCard('User Statistics', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    createCard('User Statistics', error.response.status, error.response.statusText, error.response.data);
                });
        },
        giveupGame: function() {
            var vm = this;
            // abandona la partida 3 (ni se comprueba si es jugador de la partida o no)
            return axios.post('/game/12/giveup')
                .then(function (response) {
                    console.log("Abandonando partida:", response);
                    createCard('Giveup Game', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    createCard('Giveup Game', error.response.status, error.response.statusText, error.response.data);
                });
        },
        removeAvatar: function(event) {
          //  event.preventDefault(); no hace falta ya que lo he puesto en la llamada
            this.c_avatar = null;
            var vm = this;
            return axios.post('/user/avatar/remove')
                .then(function (response) {
                    console.log("Elimina avatar respuesta:", response);
                    createCard('Remove Avatar', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    createCard('Giveup Game', error.response.status, error.response.statusText, error.response.data);
                });
        },
        createCard: function(title, status, statusText, data) {
            var newcard = {
                order: this.c_cards.length + 1,
                type: title,
                errorCode: status,
                statusCode: statusText,
                output: data
            }

            this.c_cards.push(newcard);
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