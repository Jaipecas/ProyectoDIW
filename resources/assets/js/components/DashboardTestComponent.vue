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
                
                <li class="input-menu">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <li class="input-menu upper-margin"><a v-on:click.prevent="removeAvatar" href="#">Elimina avatar</a></li>
                <li class="input-menu"><a v-on:click.prevent="giveupGame" href="#">Abandonar partida</a></li>
                <li class="input-menu"><a v-on:click.prevent="userStatistics" href="#">Estadísticas usuario</a></li>
                <li class="input-menu"><a v-on:click.prevent="removeUser" href="#">Eliminar cuenta</a></li>
                <li class="input-menu"><a v-on:click.prevent="userGames" href="#">Partidas del usuario (pag 1)</a></li>
                <li class="input-menu"><a v-on:click.prevent="userGamesPag2" href="#">Partidas del usuario (pag 2)</a></li>
                <li class="input-menu upper-margin"><a v-on:click.prevent="deleteNotification" href="#">Borrar notificación</a></li>
                <li class="input-menu"><a v-on:click.prevent="requestChallenge" href="#">Solicitar partida</a></li>
                <li class="input-menu"><a v-on:click.prevent="updateProfile" href="#">Modificar datos usuario</a></li>
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
        requestChallenge:function () {
            var vm = this;
            // solicita una partida en español
            return axios.post('/challenge/request/es/level/40')
                .then(function (response) {
                    console.log("Reto creado:", response);
                    vm.createCard('Request Challenge', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Request Challenge', error.response.status, error.response.statusText, error.response.data);
                }); 
        },
        deleteNotification: function() {
            var vm = this;
            // pone a borrado el estado de una notificación (id=3)
            return axios.put('/notification/9/update/delete')
                .then(function (response) {
                    console.log("Borrado notificación:", response);
                    vm.createCard('Update Notification', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Update Notification', error.response.status, error.response.statusText, error.response.data);
                }); 
        },
        userGames: function() {
            var vm = this;
            // partidas del usuario paginadas, 3 por página
            return axios.get('/user/games/3')
                .then(function (response) {
                    console.log("Partidas de usuario:", response);
                    vm.createCard('User Games', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('User Games', error.response.status, error.response.statusText, error.response.data);
                });   
        },
        userGamesPag2: function() {
            var vm = this;
            // partidas del usuario paginadas, 3 por página
            return axios.get('/user/games/3?page=2')
                .then(function (response) {
                    console.log("Partidas de usuario:", response);
                    vm.createCard('User Games', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('User Games', error.response.status, error.response.statusText, error.response.data);
                });   
        },
        removeUser: function() {
            var vm = this;
            // estadísiticas via AJAX
            return axios.delete('/user/remove')
                .then(function (response) {
                    console.log("Eliminar cuenta:", response);
                    vm.createCard('Remove User', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Remove User', error.response.status, error.response.statusText, error.response.data);
                })
                .then(function() {
                    // siempre se ejecuta
                    // uso replace para que la página actual desaparezca del historial
                    // y evitar la tecla back
                    setTimeout(function () {
                        window.location.replace('/scrabble/login');
                    }, 2000);
                    
                });
        },
        userStatistics: function() {
            var vm = this;
            // estadísiticas via AJAX
            return axios.get('/user/statistics')
                .then(function (response) {
                    console.log("Estadísticas:", response);
                    vm.createCard('User Statistics', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('User Statistics', error.response.status, error.response.statusText, error.response.data);
                });
        },
        giveupGame: function() {
            var vm = this;
            // abandona la partida 3 (no se comprueba si es jugador de la partida o no)
            return axios.post('/game/12/giveup')
                .then(function (response) {
                    console.log("Abandonando partida:", response);
                    vm.createCard('Giveup Game', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Giveup Game', error.response.status, error.response.statusText, error.response.data);
                });
        },
        removeAvatar: function(event) {
          //  event.preventDefault(); no hace falta ya que lo he puesto en la llamada
            this.c_avatar = null;
            var vm = this;
            return axios.post('/user/avatar/remove')
                .then(function (response) {
                    console.log("Elimina avatar respuesta:", response);
                    vm.createCard('Remove Avatar', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Giveup Game', error.response.status, error.response.statusText, error.response.data);
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