<template>
  <div :class="containerStyle">
    <country-flag :country="game.language" size="medium" :rounded="true" />
    <div>
      <span>{{ game.player_score }}</span>
      <span>-</span>
      <span>{{ game.opponent_score }}</span>
    </div>
    <img :src="avatar" alt="avatar usuario" />
    <span>{{ game.opponent[0].name }}</span>
    <div class="date">
      <span>{{ date }}</span>
      <span>{{ time }}</span>
    </div>
    <img src="/img/papelera.png" alt="papelera" @click="deleteGame" />
  </div>
</template>

<script>
import CountryFlag from "vue-country-flag";
import User from "../../../../classes/User";

export default {
  name: "MatchDashComponent",
  components: {
    "country-flag": CountryFlag,
  },
  props: {
    game: {
      type: Object,
      required: true,
    },
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      avatar: "",
      date: "",
      time: "",
      containerStyle: "container-match ",
    };
  },
  created() {
    this.loadAvatar(this.game.opponent[0].avatar);
    this.getDateTime();
    this.insertColor();
  },
  methods: {
    loadAvatar(ruta) {
      if (ruta === "" || ruta === null) {
        this.avatar = "/img/gamer.png";
      } else {
        this.avatar = ruta;
      }
    },

    getDateTime() {
      let date = new Date(this.game.updated_at);
      this.date = date.toLocaleDateString("es-ES");
      this.time = date.toLocaleTimeString("es-ES");
    },
    deleteGame() {
      this.$emit("delete-game", this.game.id);
    },
    insertColor() {
      switch (this.game.state) {
        case 0:
          this.containerStyle += "game-grey";
          break;
        case 1:
          this.containerStyle += "game-green";
          break;
        case 2:
          this.containerStyle += "game-red";
          break;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-match {
  display: grid;
  grid-template: 1fr / repeat(6, 1fr);
  background: red;
  padding: 4px;
  margin: 10px;

  > * {
    justify-self: center;
    align-self: center;
  }

  img[alt="avatar usuario"] {
    width: 50px;
    height: 50px;
  }
  .date {
    display: flex;
    flex-direction: column;
    padding: 5px;
  }

  img[alt="papelera"] {
    width: 35px;
    height: 35px;
  }
}
.game-green {
  background: $color-player-turn;
}
.game-red {
  background: $color-oponent-turn;
}
.game-grey {
  background: $color-no-turn;
}
</style>
