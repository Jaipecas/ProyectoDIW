<template>
    <div id="info-game-data"> 
        <div class="tableboard">
            <table>
                <tr>
                    <th> </th>
                    <th class="cell" v-for="index in 15" :key="index">{{ index }}</th>
                </tr>
                <tr v-for="indexY in 15" :key="indexY">
                    <th class="cell">{{ String.fromCharCode(64 + indexY) }}</th>
                    <td v-for="indexX in 15" :key="indexX" class="cell">
                        {{ getLetter(game.tableboard.charAt((indexY-1)*15 + indexX)) }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="players">
            <div class="player-info">
                <img v-if="user.avatar" src="user.avatar" class="image">
                <div v-else class="image"></div>
                <div class="info"><span class="data">Usuario ({{ user.player }}): </span><span class="value">{{ user.name }}</span></div>
                <div class="info"><span class="data">País: </span><span class="value">{{ user.country }}</span></div>
                <div class="info"><span class="data">Puntos: </span><span class="value">{{ user.score }}</span></div>
            </div>
            <div class="player-info">
                <img v-if="opponent.avatar" src="opponent.avatar" class="image">
                <div v-else class="image"></div>
                <div class="info"><span class="data">Usuario ({{ opponent.player }}): </span><span class="value">{{ opponent.name }}</span></div>
                <div class="info"><span class="data">País: </span><span class="value">{{ opponent.country }}</span></div>
                <div class="info"><span class="data">Puntos: </span><span class="value">{{ opponent.score }}</span></div>
            </div>
            <div class="player-tokens" :class="{ turn: isTurn, noturn: !isTurn }">
                <div class="token" v-for="token in tokens" :key="token.id">
                    <span class="letter">{{ token.letter }}</span>
                    <span class="points">{{ token.value }}</span>
                </div>
            </div>
        </div>
        <div class="log"><span class="data">Inicio: </span><span class="value"></span></div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";
#info-game-data {
   
    width: 96%;
    display: grid;
    grid-gap: 10px 10px;
    grid-template: 18rem 40px / 30rem 1.2fr 0.8fr;
    margin: 10px 2%;
    font-size: 1.2em;

    .token {
        border: 1px solid #9293a6;
        padding: 0.4em;
        margin: 0 1em; 
        
    }

    .value {
        color: rgb(111, 97, 170);
        font-weight: 700;
    }

    .tableboard {
        background-color: $card-bg;
        font-size: 0.7rem;

        .cell {
            border: 1px solid rgb(139, 104, 104);
            width: 2rem;
            text-align: center
         }
    }

    .players {
        display: grid;
        grid-gap: 10px;
        grid-template-rows: 120px 120px 40px;

        .player-tokens {

            display: flex;
            justify-content: center;

            .points {
                font-size: 0.6em;
            }

            &.noturn {
                background: #673e35;
            }

            &.turn {
                background: #3f543c;
            }
        }

        .player-info {
            background-color: $card-bg; 
            display: grid;
            grid-column-gap: 10px;
            grid-template: 40px 40px 40px / 120px 1fr;

             > div:nth-child(1) {
                grid-row: 1 / 4; 
            }

            .info {
                line-height: 40px;
            }
        }

        .image {
            width: 120px;
            height: 120px;
            background: rgb(128, 174, 184);
        }
    }

    .log {
        background-color: $card-bg;
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

<script>
import GameDataComponent from './GameDataComponent'
import InfoGameComponent from './InfoGameComponent'
import CardContainerComponent from './CardContainerComponent'
import { ScrabbleHelper } from '../scrabble_helper_library.js'

export default {
    name: 'info-game-component', /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */
    props: {
        user: { required: true, type: Object },
        opponent: { required: true, type: Object },
        game: { required: true, type: Object },
    },
    data() {
        return {
            c_game: null,
            c_user: null,
            c_opponent: null,
            c_cards: [],
            tokens: []
        }
    },
    computed: {
        isTurn: function() {
            return  (this.c_user.player == 'P1' && this.c_game.state == 'turn_p1' ) ||
                    (this.c_user.player == 'P2' && this.c_game.state == 'turn_p2' )
        }
    },
    components: {
        CardContainerComponent, GameDataComponent, InfoGameComponent
    },
    methods: {
        getLetter: function(d) {
            return ScrabbleHelper.getLetter(this.c_game.language, d);
        },
        fillTokens: function(tokens) {
            // añado el id
            for(var n=0; n<tokens.length; n++) {
                var newToken = {
                    id: this.tokens.length + n,
                    value: tokens[n].value,
                    letter: this.getLetter(tokens[n].letter),
                }

                this.tokens.push(newToken);
            }
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
        },
        listenForBroadcast: function() { 
          /*  console.log("Escuchando canales: user"+this.c_user.id);
            Echo.private('user.' + this.c_user.id)
                .listen('AcceptedChallenge', (e) => {
                    alert("Generada partida " + e.gameId + "\nIdioma: " + e.lang +
                        "\nOponente\n\tid: " + e.oppoId +
                        "\n\tNombre: " + e.oppoName + "\n\tPaís: " + e.oppoCountry + 
                        "\n\tAvatar: " + e.oppoAvatar);

                    this.requestChallengeId = e.gameId;

                    console.log("Recibido");
                });*/
        }
    },
    created() {
        this.c_game = this.game;
        this.c_user = this.user;
        this.c_opponent = this.opponent;

        this.fillTokens(this.c_user.tokens);
        this.listenForBroadcast();
    },
    mounted() {
        console.log('TableboardComponent montado.');
    }
}
</script>