<template>
  <div class="start-area">
    <select-lang :languages="langList" />
    <select-text :texts="arrayTexts" @change-area="changeArea" />
    <div class="game">
      <div v-show="showArea == 0" class="game-random">
        <p>Pulsa el botón y comienza una partida aleatoria</p>
        <img src="/img/twinBlades.png" alt="" />
        <button class="start-game">Inicia una partida</button>
      </div>
      <div v-show="showArea == 1" class="game-user">
        <input
          class="searchInput"
          type="text"
          placeholder="Busca contrincante"
          title="Type in a name"
        />

        <ul class="listUsers">
          <li><a href="#">Adele</a></li>
          <li><a href="#">Agnes</a></li>

          <li><a href="#">Billy</a></li>
          <li><a href="#">Bob</a></li>

          <li><a href="#">Calvin</a></li>
          <li><a href="#">Christina</a></li>
          <li><a href="#">Cindy</a></li>
        </ul>
      </div>
      <div v-show="showArea == 2" class="game-level">
        <p>Level</p>
      </div>
    </div>
  </div>
</template>

<script>
import SelectLanguageComponent from "./SelectLanguageComponent.vue";
import SelectTextComponent from "./SelectTextComponent.vue";

export default {
  name: "StartGameAreaComponent",
  components: {
    "select-lang": SelectLanguageComponent,
    "select-text": SelectTextComponent,
  },
  data: function () {
    return {
      langList: ["es", "en"],
      arrayTexts: [
        "Partida aleatoria",
        "Partida contra usuario",
        "Partida por nivel",
      ],
      showArea: 0,
    };
  },
  methods: {
    changeArea(area) {
      this.showArea = area;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.start-area {
  display: grid;
  grid-template: 75px 75px 1fr / 1fr;

  .game {
    justify-self: center;
    margin: 20px;

    .game-random {
      @include dash-card($dash-gradient1);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      img {
        max-width: 150px;
        height: 150px;
      }
      button {
        @include dash-button2(1.5rem);
        margin-top: 10px;
      }
    }
    .game-user {
      @include dash-card($dash-gradient2);
    }
    .game-level {
      @include dash-card($dash-gradient1);
    }
  }

  * {
    box-sizing: border-box;
  }

  .searchInput {
    background-image: url("/css/searchicon.png");
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
  }

  .listUsers {
    list-style-type: none;
    padding: 0;
    margin: 0;

    li a {
      border: 1px solid #ddd;
      margin-top: -1px;
      background-color: #f6f6f6;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      color: black;
      display: block;
    }

    li a:hover:not(.header) {
      background-color: #eee;
    }
  }
}
</style>
