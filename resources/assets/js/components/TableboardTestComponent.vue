<template>
  <div id="tableboard">
    <div v-if="isWinner" class="ended win">
      Partida ya finalizada. ¡¡Ganaste!!
    </div>
    <div v-else-if="isLoser" class="ended lose">
      Partida ya finalizada. ¡¡Perdiste!!
    </div>
    <game-data-component :game="c_game" />
    <info-game-component :game="c_game" :user="c_user" :opponent="c_opponent" />
    <aside class="sidebar">
      <ul>
        <li class="input-menu">
          <a
            href="#"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          >
            Logout
          </a>
        </li>
      </ul>
    </aside>
    <card-container-component :cards="c_cards" />
  </div>
</template>

<script>
import GameDataComponent from "./GameDataComponent";
import InfoGameComponent from "./InfoGameComponent";
import CardContainerComponent from "./CardContainerComponent";

export default {
  name: "TableboardTestComponent",
  components: {
    CardContainerComponent,
    GameDataComponent,
    InfoGameComponent,
  } /* que sea siempre compuesto con - para evitar colisiones con otros tag HTML5 */,
  props: {
    user: { required: true, type: Object },
    opponent: { required: true, type: Object },
    game: { required: true, type: Object },
  },
  data: () => ({
    c_game: null,
    c_user: null,
    c_opponent: null,
    c_cards: [],
    requestChallengeId: null,
  }),
  computed: {
    isWinner: function () {
      return (
        (this.c_user.player == "P1" && this.c_game.state == "win_p1") ||
        (this.c_user.player == "P2" && this.c_game.state == "win_p2")
      );
    },
    isLoser: function () {
      return (
        (this.c_user.player == "P2" && this.c_game.state == "win_p1") ||
        (this.c_user.player == "P1" && this.c_game.state == "win_p2")
      );
    },
  },
  created() {
    this.c_game = this.game;
    this.c_user = this.user;
    this.c_opponent = this.opponent;

    console.log(this.user);

    this.listenForBroadcast();
  },
  mounted() {
    console.log("TableboardComponent montado.");
  },
  methods: {
    createCard: function (title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };

      this.c_cards.push(newcard);
    },
    listenForBroadcast: function () {
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
    },
  },
};
</script>

<style lang="scss" scoped>
.sidebar {
  grid-column: 1 / 3;
}

.variables-title {
  font-size: 1.6em;
  padding: 0.5em;
  font-weight: 500;
  margin-left: 15%;
}

.ended {
  border: 2px solid #000;
}

.win {
  background: #3dce3d;
  color: #000;
  font-size: 2em;
  font-weight: 600;
  text-align: center;
}

.lose {
  background: #e63552;
  font-size: 2em;
  font-weight: 600;
  text-align: center;
}
</style>
