<template>
  <div :class="containerStyle">
    <lang-flag :iso="game.language" :squared="false" />
    <div>
      <span>{{ game.player_score }}</span>
      <span>-</span>
      <span>{{ game.opponent_score }}</span>
    </div>
    <img :src="opponent.avatar" alt="avatar usuario" />
    <span>{{ opponent.name }}</span>
    <div class="date">
      <span>{{ date }}</span>
      <span>{{ time }}</span>
    </div>
    <img src="/img/papelera.png" alt="papelera" @click="deleteGame" />
  </div>
</template>

<script>
import LangFlag from "vue-lang-code-flags";
import User from "../../../../classes/User";

export default {
  name: "MatchDashComponent",
  components: {
    "lang-flag": LangFlag,
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
      opponent: "",
    };
  },
  created() {
    this.getDateTime();
    this.insertColor();
    this.opponent = Object.assign(new User(), this.game.opponent[0]);
  },
  methods: {
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

  .flag-icon {
    height: 35px;
    width: 35px;
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
