<template>
  <div class="start-area">
    <select-lang :languages="langList" @selected-lang="selectLang" />
    <select-text :texts="arrayTexts" @change-area="changeArea" />
    <!-- las cards con los tres tipos de juego -->
    <div class="game">
      <!-- random -->
      <div v-show="showArea == 0" class="game-random">
        <p>Pulsa el botón y comienza una partida aleatoria</p>
        <img src="/img/twinBlades.png" alt="" />
        <div v-show="messageError != ''" class="alert alert-danger">
          {{ messageError }}
        </div>
        <div v-show="createdChallenge" class="alert alert-success">
          {{ messageSuccess }}
        </div>
        <button @click="createRandomChallenge">Inicia una partida</button>
      </div>
      <!-- against user -->
      <div v-show="showArea == 1" class="game-user">
        <input
          class="searchInput"
          type="text"
          placeholder="Busca contrincante"
          title="Type in a name"
          @keyup="searchUsers($event)"
        />

        <ul class="listUsers">
          <li
            v-for="userS in usersSearched"
            :key="userS.id"
            @click="userClick(userS)"
          >
            <a>{{ userS.name }}</a>
          </li>
        </ul>

        <div v-if="userSelected != null" class="user-selected card">
          <img :src="setAvatar" alt="user img" />
          <country-flag :country="userSelected.country" size="normal" />
          <span>{{ userSelected.name }}</span>
        </div>

        <div v-show="messageError != ''" class="alert alert-danger">
          {{ messageError }}
        </div>
        <div v-show="createdChallenge" class="alert alert-success">
          {{ messageSuccess }}
        </div>
        <button @click="createAgainstChallenge">Inicia una partida</button>
      </div>
      <!-- level -->
      <div v-show="showArea == 2" class="game-level">
        <div class="levels">
          <div v-for="level in levels" :key="level" @click="changeLevel(level)">
            {{ level }}
          </div>
        </div>
        <div v-show="messageError != ''" class="alert alert-danger">
          {{ messageError }}
        </div>
        <div v-show="createdChallenge" class="alert alert-success">
          {{ messageSuccess }}
        </div>
        <button @click="createLevelChallenge">Inicia una partida</button>
      </div>
    </div>
  </div>
</template>

<script>
import SelectLanguageComponent from "../components/SelectLanguageComponent.vue";
import SelectTextComponent from "../components/SelectTextComponent.vue";
import CountryFlag from "vue-country-flag";

import Info from "../../../../../classes/Info";
import User from "../../../../../classes/User";
import Challenge from "../../../../../classes/Challenge";

export default {
  name: "StartGameAreaComponent",
  components: {
    "select-lang": SelectLanguageComponent,
    "select-text": SelectTextComponent,
    "country-flag": CountryFlag,
  },
  props: {
    user: {
      type: User,
      required: true,
    },
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
      usersSearched: null,
      userSelected: null,
      inputWord: "",
      levels: ["1", "2", "3", "4", "5"],
      selectedLang: "es",
      selectedLevel: null,
      messageError: "",
      messageSuccess: "¡Partida creada!",
      createdChallenge: false,
    };
  },
  computed: {
    setAvatar: function () {
      if (this.userSelected.avatar !== "/img/gamer.png")
        return "/storage/" + this.userSelected.avatar;

      return this.userSelected.avatar;
    },
  },
  methods: {
    //Eventos

    changeArea(area) {
      this.showArea = area;
      this.messageError = "";
      this.createdChallenge = false;
    },
    selectLang(lang) {
      this.selectedLang = lang;
    },
    async searchUsers(event) {
      if (event.key === "Backspace") {
        this.inputWord = this.inputWord.slice(0, -1);
      } else {
        this.inputWord += event.key;
      }

      if (this.inputWord !== "") {
        const data = await Info.searchUsers(this.inputWord);
        this.usersSearched = data;
      } else {
        this.usersSearched = null;
      }
    },
    userClick(user) {
      this.usersSearched = null;
      this.userSelected = Object.assign(new User(), user);
      this.messageError = "";
    },
    changeLevel(levelSelected) {
      this.selectedLevel = levelSelected;

      const arrayLevels = Array.from(
        document.getElementsByClassName("levels")[0].childNodes
      );

      arrayLevels.forEach((level, index) => {
        if (index < levelSelected) {
          level.classList.add("level-active");
          level.classList.remove("level-inactive");
        } else {
          level.classList.add("level-inactive");
          level.classList.remove("level-active");
        }
      });
    },

    //Creación de partidas

    async createRandomChallenge() {
      this.postChallenge("random");
    },

    async createAgainstChallenge() {
      if (this.userSelected === null) {
        this.messageError = "Debe seleccionar un contrincante";
        this.createdChallenge = false;
        return;
      }
      this.postChallenge("against");
    },

    async createLevelChallenge() {
      if (this.selectedLevel === null) {
        this.messageError = "Seleccione un nivel";
        this.createdChallenge = false;
        return;
      }
      this.postChallenge("level");
    },

    async postChallenge(challengeType) {
      this.messageError = "";
      try {
        await this.createChallenge().postChallenge(challengeType);
        this.createdChallenge = true;
      } catch (error) {
        this.messageError = error;
        this.createdChallenge = false;
      }
    },

    createChallenge() {
      let challenge = new Challenge();
      challenge.language = this.selectedLang;
      challenge.level = this.selectedLevel;
      challenge.opposingPlayer = this.userSelected;

      return challenge;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.start-area {
  display: grid;
  grid-template: 75px 75px 1fr / 1fr;
  width: 100%;

  .game {
    justify-self: center;
    margin: 20px;
    width: 75%;
    height: 400px;

    > * {
      height: 100%;
    }

    .game-random {
      @include dash-card($dash-gradient1, 120px, 1.5rem);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;

      p {
        font-size: 1.2rem;
      }

      img {
        max-width: 120px;
        height: 120px;
      }
      button {
        @include dash-button2(1.5rem, "blue");
        margin-top: 5px;
      }
    }
    .game-user {
      @include dash-card($dash-gradient2, 120px, 1.5rem);
      display: flex;
      flex-direction: column;
      justify-content: space-between;

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
        position: absolute;
        z-index: 1;
        margin-top: 52px;

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

      .user-selected {
        display: grid;
        grid-template: 1fr 1fr / 1fr 1fr;
        padding: 20px;

        img {
          grid-column: 1 / -1;
          width: 50px;
          height: 50px;
        }
        .flag {
          align-self: center;
          justify-self: self-end;
          margin-right: 5px;
        }
        span {
          font-size: 1rem;
          align-self: center;
          justify-self: self-start;
          margin-left: 5px;
          padding-top: 10px;
        }
      }

      button {
        @include dash-button2(1.5rem, "red");
        margin-top: 5px;
      }
    }

    .game-level {
      @include dash-card($dash-gradient1, 120px, 1.5rem);
      display: flex;
      flex-direction: column;
      justify-content: center;

      .levels {
        display: flex;
        justify-content: center;

        > * {
          @include token-tableboard(40px, 40px, 10px);
          background-color: #b3b3b3;
          cursor: pointer;
          margin-bottom: 5px;
        }

        .level-active {
          background-color: #f9f4b8;
        }

        .level-inactive {
          background-color: #b3b3b3;
        }
      }

      button {
        @include dash-button2(1.5rem, "blue");
        margin: 20px;
      }
    }

    .alert {
      font-size: 0.9rem;
      margin: 20px;
    }
  }
}
</style>
