<template>
    <div id="tableboard">
        <game-data-component 
            :game="c_game">
        </game-data-component> 
        <card-container-component :variables="c_variables"></card-container-component> 
        <aside class="sidebar">
            <ul>
                <li class="input-menu">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </aside>
        <card-container-component :cards="c_cards"></card-container-component> 
    </div>
</template>

<script>
import GameDataComponent from './GameDataComponent'
import CardContainerComponent from './CardContainerComponent'

export default {
    name: 'tableboard-test-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props: {
        user: { required: true, type: Object },
        game: { required: true, type: Object },
        variables: { required: true, type: Array }
    },
    data() {
        return {
            c_game: null,
            c_variables: null,
            c_cards: [],
            requestChallengeId: null
        }
    },
    components: {
        CardContainerComponent, GameDataComponent
    },
    methods: {
        createCard: function(title, status, statusText, data) {
            var newcard = {
                order: this.c_cards.length + 1,
                type: title,
                errorCode: status,
                statusCode: statusText,
                output: data
            }

            this.c_cards.push(newcard);
        },
        listenForBroadcast: function() { 
            console.log("Escuchando canales: user"+this.c_user.id);
            Echo.private('user.' + this.c_user.id)
                .listen('AcceptedChallenge', (e) => {
                    alert("Generada partida " + e.gameId + "\nIdioma: " + e.lang +
                        "\nOponente\n\tid: " + e.oppoId +
                        "\n\tNombre: " + e.oppoName + "\n\tPaís: " + e.oppoCountry + 
                        "\n\tAvatar: " + e.oppoAvatar);

                    this.requestChallengeId = e.gameId;

                    console.log("Recibido");
                });
        }
    },
    created() {
        this.c_game = this.game;
        this.c_variables = this.variables;

        this.listenForBroadcast();
    },
    mounted() {
        console.log('TableboardComponent montado.');
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