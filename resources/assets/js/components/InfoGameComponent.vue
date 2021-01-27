<template>
  <div class="info-game-data">
    <div class="tableboard">
      <table>
        <tr>
          <th />
          <th v-for="index in 15" :key="index" class="cell">{{ index }}</th>
        </tr>
        <tr v-for="indexY in 15" :key="indexY">
          <th class="cell">{{ String.fromCharCode(64 + indexY) }}</th>
          <td v-for="indexX in 15" :key="indexX" class="cell">
            {{
              getLetter(
                game.tableboard.charAt((indexY - 1) * 15 + (indexX - 1))
              )
            }}
          </td>
        </tr>
      </table>
    </div>
    <div class="players">
      <div class="player-info">
        <div v-if="user.avatar">
          <img :src="user.avatar" class="image" />
        </div>
        <div v-else class="image" />
        <div class="info">
          <span class="data">Usuario ({{ user.player }}): </span>
          <span class="value">{{ user.name }}</span>
        </div>
        <div class="info">
          <span class="data">País: </span>
          <span class="value">{{ user.country }}</span>
        </div>
        <div class="info">
          <span class="data">Puntos: </span>
          <span class="value">{{ c_user.score }}</span>
        </div>
      </div>
      <div class="player-info">
        <div v-if="opponent.avatar">
          <img :src="opponent.avatar" class="image" />
        </div>
        <div v-else class="image" />
        <div class="info">
          <span class="data">Usuario ({{ opponent.player }}): </span>
          <span class="value">{{ opponent.name }}</span>
        </div>
        <div class="info">
          <span class="data">País: </span>
          <span class="value">{{ opponent.country }}</span>
        </div>
        <div class="info">
          <span class="data">Puntos: </span>
          <span class="value">{{ c_opponent.score }}</span>
        </div>
      </div>
      <div class="player-tokens" :class="{ turn: isTurn, noturn: !isTurn }">
        <div v-for="token in tokens" :key="token.id" class="token">
          <span class="letter">{{ token.letter }}</span>
          <span class="points">{{ token.value }}</span>
        </div>
      </div>
    </div>
    <div class="panel-control">
      <div class="log">
        <span class="data">Letras en saco: </span>
        <span class="value">
          {{ c_game.remaining_tokens }} / {{ c_game.total_tokens }}
        </span>
      </div>
      <div class="throw">
        <div id="throw">
          <label for="rowpos">Fila 1ª letra:</label>
          <select id="rowpos" v-model="rowpos">
            <option
              v-for="indexY in 15"
              :key="indexY"
              :value="String.fromCharCode(64 + indexY)"
            >
              {{ String.fromCharCode(64 + indexY) }}
            </option>
          </select>
          <label for="colpos">Columna 1ª letra:</label>
          <select id="colpos" v-model="colpos">
            <option v-for="index in 15" :key="index" :value="index">
              {{ index }}
            </option>
          </select>
          <label for="direction">H/V:</label>
          <select id="direction" v-model="direction">
            <option value="H">Horizontal</option>
            <option value="V">Vertical</option>
          </select>
          <br />
          <label for="word">Palabra:</label>
          <input id="word" v-model="word" type="text" name="word" />
          <button id="send" type="button" @click="sendWord">
            Envia palabra
          </button>
        </div>
        <div id="return-letter">
          <span v-for="token in tokens" :key="token.id">
            <label for="">{{ token.letter }} ({{ token.value }})</label>
            <input
              v-model="tokensReturn"
              type="checkbox"
              name="returned-letter"
              :value="token.id + getCode(token.letter)"
            />
          </span>
          <br />
          <button id="return" type="button" @click="returnTokens">
            Devolver
          </button>
        </div>
        <div id="spend-turn">
          <button id="spend" type="button" @click="passTurn">
            Pasar turno
          </button>
          <button id="giveup" type="button" @click="giveup">Abandonar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

import { ScrabbleHelper } from "../scrabble_helper_library.js";

export default {
  name:
    "InfoGameComponent" /* que sea siempre compuesto con - para evitar colisiones con otros tag HTMHL5 */,
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
      tokens: [],
      rowpos: "A",
      colpos: 1,
      direction: "H",
      word: "",
      tokensReturn: [],
    };
  },
  computed: {
    isTurn() {
      return (
        (this.c_user.player == "P1" && this.c_game.state == "turn_p1") ||
        (this.c_user.player == "P2" && this.c_game.state == "turn_p2")
      );
    },
  },
  created() {
    this.c_game = this.game;
    this.c_user = this.user;
    this.c_opponent = this.opponent;

    this.fillTokens(this.c_user.tokens);
    this.listenForBroadcast();
  },
  mounted() {
    console.log("TableboardComponent montado.");
  },
  methods: {
    getLetter(d) {
      return ScrabbleHelper.getLetter(this.c_game.language, d);
    },
    getCode(d) {
      return ScrabbleHelper.getCode(this.c_game.language, d);
    },
    fillTokens(tokens) {
      this.tokens.length = 0;

      // añado el id
      for (let n = 0; n < tokens.length; n++) {
        let newToken = {
          id: this.tokens.length + n,
          value: tokens[n].value,
          letter: this.getLetter(tokens[n].letter),
        };

        this.tokens.push(newToken);
      }
    },
    createCard(title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };

      this.c_cards.push(newcard);
    },
    returnTokens() {
      let route = "/scrabble/game/" + this.c_game.id + "/user/return";

      let tmpTokens = [];

      for (let i = 0; i < this.tokensReturn.length; i++) {
        tmpTokens.push(this.tokensReturn[i].slice(-1));
      }

      const promise = axios.post(route, {
        tokens: tmpTokens,
      });

      promise
        .then((response) => {
          console.log("Respuesta piezas devueltas: ", response.data);

          // pongo las nuevas letras en pantalla
          this.fillTokens(response.data.tokens);

          // actualizo el estado
          this.c_game.state = response.data.state;

          this.tokensReturn.length = 0;
        })
        .catch((error) => {
          console.log(
            "ERROR: " +
              error.response.status +
              ". " +
              error.response.statusText +
              ". " +
              error.response.data
          );
        });
    },
    passTurn() {
      let route = "/scrabble/game/" + this.c_game.id + "/user/pass";
      const promise = axios.post(route);

      promise
        .then((response) => {
          console.log("Respuesta pasar turno: ", response);

          // actualizo el estado
          this.c_game.state = response.data.state;
        })
        .catch((error) => {
          console.log(
            "ERROR: " +
              error.response.status +
              ". " +
              error.response.statusText +
              ". " +
              error.response.data
          );
        });
    },
    giveup() {
      let route = "/scrabble/game/" + this.c_game.id + "/giveup";
      const promise = axios.post(route);

      promise
        .then((response) => {
          console.log("Partida abandonanda");

          // actualizo el estado
          this.c_game.state = response.data.state;
        })
        .catch((error) => {
          console.log(
            "ERROR: " +
              error.response.status +
              ". " +
              error.response.statusText +
              ". " +
              error.response.data
          );
        });
    },
    sendWord() {
      // envio la palabra
      // el JSON de ejemplo incuye todos los posibles datos a modificar
      // podría sólo indicarse uno
      let route = "/scrabble/game/" + this.c_game.id + "/user/throw";
      const promise = axios.post(route, {
        word: this.word,
        row: this.rowpos,
        column: this.colpos,
        direction: this.direction,
      });

      promise
        .then((response) => {
          console.log("Respuesta envio palabra:", response);

          // redibujo el tablero con la nueva palabra
          this.c_game.tableboard = ScrabbleHelper.updateTableboard(
            this.c_game.tableboard,
            response.data.icol,
            response.data.irow,
            this.direction,
            response.data.rword
          );

          // pongo las nuevas letras en pantalla
          this.fillTokens(response.data.tokens);

          // quito letras del saco
          this.c_game.remaining_tokens -= parseInt(
            response.data.newtokens.length
          );

          // actualizo sus puntos
          this.c_user.score = response.data.pscore;

          // actualizo el estado
          this.c_game.state = response.data.state;

          if (response.data.pstate == "win") {
            alert("¡¡Enhorabuena!! ¡¡Has ganado!!");
          }
        })
        .catch((error) => {
          console.log(
            "ERROR: " +
              error.response.status +
              ". " +
              error.response.statusText +
              ". " +
              error.response.data
          );
        });
    },
    listenForBroadcast() {
      console.log(
        "Escuchando canales: game." + this.c_game.id + ".user." + this.c_user.id
      );

      window.Echo.private("game." + this.c_game.id + ".user." + this.c_user.id)
        .listen(".OpponentThrow", (e) => {
          this.c_game.state = e.state;
          if (e.playerState == "pass") {
            alert("El contrincante ha pasado turno.");
            console.log("El contrincante ha pasado turno.");
          } else if (e.playerState == "win") {
            alert("Lo siento, has perdido :(");
            console.log("Lo siento, has perdido :(");
          } else if (e.playerState == "return") {
            alert("El contrincante ha devuelto fichas");
            console.log("El contrincante ha devuelto fichas");
          } else {
            this.c_game.remaining_tokens = e.numberRemainingTokens;
            this.c_opponent.score = e.playerScore;
            this.c_game.tableboard = e.tableboard;

            console.log("Recibida tirada oponente");
          }
        })
        .listen(".GiveupGame", (e) => {
          this.c_game.state = e.state;
          alert("El contrincante ha abandonado.");
          console.log("El contrincante ha abandonado.");
        });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";

.tableboard {
  background-color: $card-bg;
  font-size: 0.7rem;

  th {
    background-color: #332323;
  }

  .cell {
    border: 1px solid rgb(139, 104, 104);
    width: 2rem;
    text-align: center;
    font-weight: 600;
    color: #caced1;
  }
}

.panel-control {
  display: grid;
  grid-gap: 10px;
  grid-template-rows: 38px 242px;
}

.log {
  background-color: $card-bg;
}

.throw {
  background-color: $card-bg;
  display: grid;
  grid-template-rows: 1fr 1fr;

  label {
    margin-left: 0.5em;
  }
}

button {
  margin: 0 0.4em;
  padding: 0 0.3em;
}

.info-game-data {
  width: 96%;
  display: grid;
  grid-gap: 10px;
  grid-template: 18rem 40px / 30rem 0.9fr 1.1fr;
  margin: 10px 2%;
  font-size: 1.2em;

  .value {
    color: rgb(111, 97, 170);
    font-weight: 700;
  }
}

.players {
  display: grid;
  grid-gap: 10px;
  grid-template-rows: 120px 120px 40px;

  .image {
    width: 120px;
    height: 120px;
    background: rgb(128, 174, 184);
  }
}

.player-tokens {
  display: flex;
  justify-content: center;

  .token {
    border: 1px solid #9293a6;
    padding: 0.3em;
    margin: 0 0.8em;
  }

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
