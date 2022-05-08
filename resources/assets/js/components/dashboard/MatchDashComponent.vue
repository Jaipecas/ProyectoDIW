<template>
  <div class="container-match card">
    <div>
      <country-flag :country="game.language" size="big" rounded="true" />
    </div>

    <div>
      <div class="player-match">
        <img :src="avatar1" alt="avatar usuario" />
        <country-flag :country="user.country" size="medium" rounded="true" />
        <span>{{ user.name }}</span>
      </div>
      <div class="player-match">
        <img :src="avatar2" alt="avatar usuario" />
        <span>{{ game.opponent.name }}</span>
      </div>
    </div>

    <div>
      <span>{{ game.player_score }}</span>
      <span> - </span>
      <span>{{ games.opponent_score }}</span>
    </div>

    <div class="game-buttons">
      <button class="dash-button">&#10003;</button>
      <button class="dash-button">&#10007;</button>
    </div>
  </div>
</template>

<script>
import Game from "../../../../classes/Game";
import CountryFlag from "vue-country-flag";
import User from "../../../../classes/User";

export default {
  name: "MatchDashComponent",
  components: {
    "country-flag": CountryFlag,
  },
  props: {
    game: {
      type: Game,
      required: true,
    },
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      avatar1: "",
      avatar2: "",
    };
  },
  created() {
    this.loadAvatar1(this.game.player1.avatar);
    this.loadAvatar2(this.game.player2.avatar);
    console.log("PAERIDAS" + this.game);
  },
  methods: {
    //REPASAR ESTO NO ME COGE EL SEGUNO PARAMETRO
    loadAvatar1(ruta) {
      if (ruta === "" || ruta === null) {
        this.avatar1 = "/img/gamer.png";
      } else {
        this.avatar1 = ruta;
      }
    },
    loadAvatar2(ruta) {
      if (ruta === "" || ruta === null) {
        this.avatar2 = "/img/gamer.png";
      } else {
        this.avatar2 = ruta;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-match {
  display: grid;
  grid-template: repeat(4, 1fr) / repeat (3, 1fr);
  padding: 30px;

  > * {
    margin: 10px;
    display: flex;
    justify-content: center;
  }

  :nth-child(1) {
    grid-column: 1 / -1;
    margin-bottom: 10px;
  }

  :nth-child(2) {
    grid-column: 1 / -1;
    div.player-match {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px;
    }
  }

  :nth-child(3) {
    > * {
      margin-left: 10px;
      margin-right: 10px;
    }
  }

  :nth-child(4) {
    > * {
      margin: 10px;
    }
    :nth-child(1) {
      @include round-button(50px, 50px, rgb(255, 255, 255), #55c27b, 1.2rem);
    }
    :nth-child(2) {
      @include round-button(50px, 50px, rgb(255, 255, 255), #cd5545, 1.2rem);
    }
  }
}
.card {
  background: #eb8d7b;
}
</style>
