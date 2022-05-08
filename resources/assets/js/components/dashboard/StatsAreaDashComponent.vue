<template>
  <div class="container-stats">
    <h2 class="header-area-dash">Estadísticas</h2>
    <h5>Idioma</h5>
    <div class="language">
      <button name="before" @click="nextLanguage">&#8672;</button>
      <country-flag
        :country="statsList[statsLanguage].language_code"
        size="big"
        :rounded="true"
      />
      <button name="next" @click="beforeLanguage">&#8674;</button>
    </div>
    <div>
      <div class="stats-dash">
        <div :class="onChangelevel">
          {{ statsList[statsLanguage].level }}
        </div>
        <card-dash
          title="Partidas ganadas"
          :stat-integer="statsList[statsLanguage].won"
        />
        <card-dash
          title="Partidas perdidas"
          :stat-integer="statsList[statsLanguage].lost"
        />
        <card-dash
          title="Partidas más valiosa"
          :stat="statsList[statsLanguage].most_valuable_word"
        />
        <card-dash
          title="Palabra más valiosa"
          :stat-integer="statsList[statsLanguage].most_valuable_word_points"
        />
        <card-dash
          title="Partida mejor palabra"
          :stat-integer="statsList[statsLanguage].most_valuable_word_game"
          div
        />
        <card-dash
          title="Partida más corta"
          :stat-integer="statsList[statsLanguage].shortest_game"
          div
        />
        <card-dash
          title="Partida más larga"
          :stat-integer="statsList[statsLanguage].longest_game"
          div
        />
      </div>
    </div>
  </div>
</template>

<script>
import CardDash from "./CardDashComponent.vue";
import UserStats from "../../../../classes/UserStats";
import CountryFlag from "vue-country-flag";

export default {
  name: "StatsAreaDashComponent",
  components: {
    "card-dash": CardDash,
    "country-flag": CountryFlag,
  },
  data: function () {
    return {
      statsList: Array,
      statsLanguage: 0,
    };
  },
  computed: {
    onChangelevel: function () {
      let levelClass = "";
      if (
        this.statsList[this.statsLanguage].level >= 0 &&
        this.statsList[this.statsLanguage].level <= 5
      ) {
        levelClass = "level level-bronze";
      } else if (
        this.statsList[this.statsLanguage].level > 5 &&
        this.statsList[this.statsLanguage].level <= 9
      ) {
        levelClass = "level level-silver";
      } else if (this.statsList[this.statsLanguage].level > 9) {
        levelClass = "level level-gold";
      }

      return levelClass;
    },
  },
  created() {
    this.getUserDashStats();
  },
  methods: {
    async getUserDashStats() {
      this.statsList = await UserStats.getUserStats();
    },
    nextLanguage() {
      if (this.statsLanguage === this.statsList.length - 1) {
        this.statsLanguage = 0;
        return;
      }
      this.statsLanguage++;
    },
    beforeLanguage() {
      if (this.statsLanguage === 0) {
        this.statsLanguage = this.statsList.length - 1;
        return;
      }
      this.statsLanguage--;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-stats {
  display: flex;
  flex-direction: column;
  align-items: center;

  h5 {
    text-align: center;
    margin-top: 20px;
  }

  .language {
    display: flex;
    align-items: center;
    > * {
      margin: 10px;
    }
    button {
      @include round-button(45px, 45px, white, #ef4e7b, 1.5rem);
    }
  }

  .stats-dash {
    display: grid;
    grid-template: repeat(6, 1fr) / 0.5fr 1fr 1fr 0.5fr;
    gap: 20px;
    @include area-scroll(450px);

    > * {
      justify-self: center;
    }

    div:nth-child(1) {
      grid-column: 1/-1;
      align-self: center;
      margin-top: 30px;
      margin-bottom: 30px;
    }

    div:nth-child(2),
    div:nth-child(5),
    div:nth-child(7) {
      grid-column: 2 / 3;
    }
    div:nth-child(3),
    div:nth-child(6) {
      grid-column: 3 / 4;
    }
    div:nth-child(4) {
      grid-column: 2 / 4;
    }

    .level {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 110px;
      height: 110px;
      border-radius: 60px;
      color: rgb(255, 255, 255);
      font-size: 3rem;
      border: 2px solid rgb(26, 23, 23);
    }
    .level-silver {
      background: #c0c0c0;
    }
    .level-bronze {
      background: #db9249;
    }
    .level-gold {
      background: #ffd700;
    }
  }
}
</style>
