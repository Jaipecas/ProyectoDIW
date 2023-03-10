<template>
  <div class="container-main">
    <h2 class="header-area-dash">Estadísticas</h2>
    <div class="container-stats">
      <div class="container-cards">
        <h5>Idioma</h5>
        <div class="language">
          <button name="before" @click="nextLanguage">&#8672;</button>
          <lang-flag :iso="statsUser[statsLanguage].language_code" />
          <button name="next" @click="beforeLanguage">&#8674;</button>
        </div>
        <div>
          <div class="stats-dash">
            <div :class="onChangelevel">
              {{ statsUser[statsLanguage].level }}
            </div>
            <card-dash
              title="Partidas ganadas"
              :stat-integer="statsUser[statsLanguage].won"
            />
            <card-dash
              title="Partidas perdidas"
              :stat-integer="statsUser[statsLanguage].lost"
            />
            <card-dash
              title="Partidas más valiosa"
              :stat-string="statsUser[statsLanguage].most_valuable_word"
            />
            <card-dash
              title="Palabra más valiosa"
              :stat-integer="statsUser[statsLanguage].most_valuable_word_points"
            />
            <card-dash
              title="Partida mejor palabra"
              :stat-integer="statsUser[statsLanguage].most_valuable_word_game"
            />
            <card-dash
              title="Partida más corta"
              :stat-integer="statsUser[statsLanguage].shortest_game"
            />
            <card-dash
              title="Partida más larga"
              :stat-integer="statsUser[statsLanguage].longest_game"
            />
          </div>
        </div>
      </div>
      <div class="container-graphs">
        <select-text :texts="arrayTexts" @change-area="changeArea" />
        <div>
          <bar-chart v-if="chartShow == 0" :chart-data="chartData" />
          <line-chart v-else-if="chartShow == 1" :chart-data="dataLineChart" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardDash from "../components/CardDashComponent.vue";
import LangFlag from "vue-lang-code-flags";
import BarChart from "../components/BarChartComponent.vue";
import LineChart from "../components/LineChartComponent.vue";
import User from "../../../../../classes/User";
import SelectTextComponent from "../components/SelectTextComponent.vue";

export default {
  name: "StatsAreaDashComponent",
  components: {
    "card-dash": CardDash,
    "lang-flag": LangFlag,
    "bar-chart": BarChart,
    "line-chart": LineChart,
    "select-text": SelectTextComponent,
  },
  props: {
    stats: {
      type: Array,
      required: true,
    },
    user: {
      type: User,
      required: true,
    },
  },
  data: function () {
    return {
      statsUser: null,
      statsLanguage: 0,
      langScores: null,
      dataLineChart: null,
      arrayTexts: ["Partidas ganadas/perdidas", "Progresión puntuaciones"],
      chartShow: 0,
    };
  },
  computed: {
    onChangelevel: function () {
      let levelClass = "";
      if (
        this.stats[this.statsLanguage].level >= 0 &&
        this.stats[this.statsLanguage].level <= 5
      ) {
        levelClass = "level level-bronze";
      } else if (
        this.stats[this.statsLanguage].level > 5 &&
        this.stats[this.statsLanguage].level <= 9
      ) {
        levelClass = "level level-silver";
      } else if (this.stats[this.statsLanguage].level > 9) {
        levelClass = "level level-gold";
      }

      return levelClass;
    },
    chartData: function () {
      return {
        labels: [""],
        datasets: [
          {
            label: "Partidas ganadas",
            data: [this.statsUser[this.statsLanguage].won],
            backgroundColor: ["rgba(255, 99, 132, 0.2)"],
            borderColor: ["rgb(255, 99, 132)"],
            borderWidth: 2,
          },
          {
            label: "Partidas perdidas",
            data: [this.statsUser[this.statsLanguage].lost],
            backgroundColor: ["rgba(255, 159, 64, 0.2)"],
            borderColor: ["rgb(255, 159, 64)"],
            borderWidth: 2,
          },
        ],
      };
    },
  },
  watch: {
    langScores() {
      this.loadDataLineChart();
    },
    statsLanguage() {
      this.loadDataLineChart();
    },
  },

  created() {
    this.statsUser = this.stats;
    this.getUserScores();
  },
  methods: {
    nextLanguage() {
      if (this.statsLanguage === this.stats.length - 1) {
        this.statsLanguage = 0;
      } else {
        this.statsLanguage++;
      }
    },
    beforeLanguage() {
      if (this.statsLanguage === 0) {
        this.statsLanguage = this.stats.length - 1;
      } else {
        this.statsLanguage--;
      }
    },
    async getUserScores() {
      let langScores = {};
      let data = [];

      //se lanzan las promesas en paralelo
      this.stats.forEach((stats) => {
        langScores[stats.language_code] = this.user.getScoreHistory(
          stats.language_code
        );
      });

      //esperamos a que esten todas
      data = await Promise.all(Object.values(langScores));

      //asociamos los datos a cada uno de los lenguajes
      this.stats.forEach((stats, index) => {
        langScores[stats.language_code] = data[index];
      });

      this.langScores = langScores;
    },

    loadDataLineChart() {
      this.dataLineChart = {
        labels: this.langScores[
          this.statsUser[this.statsLanguage].language_code
        ].dates,
        datasets: [
          {
            label: "Puntuaciones",
            backgroundColor: "#f87979",
            data: this.langScores[
              this.statsUser[this.statsLanguage].language_code
            ].scores,
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            tension: 0.1,
          },
        ],
      };
    },
    changeArea(count) {
      this.chartShow = count;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-main {
  display: grid;
  grid-template: 80px 1fr /1fr;
  height: 100%;
  border-radius: 10px;
  background-image: linear-gradient(#b3ccfe, #ffffff);

  .container-stats {
    justify-self: center;
    align-self: center;
    display: grid;
    grid-template: 1fr / 1fr 1fr;
    width: 90%;

    .container-cards {
      width: 80%;
      justify-self: center;
      display: grid;
      grid-template: 30px 60px 1fr / 1fr;

      h5 {
        justify-self: center;
      }

      .language {
        display: flex;
        align-items: center;
        justify-content: center;

        > * {
          margin: 10px;
        }
        button {
          @include round-button(45px, 45px, white, #ef4e7b, 1.5rem);
        }
        .flag-icon {
          width: 40px;
          height: 40px;
        }
      }

      .stats-dash {
        display: grid;
        grid-template: repeat(6, 1fr) / 1fr 1fr;
        gap: 10px;
        height: 400px;
        margin-top: 5px;
        padding: 10px;

        > * {
          justify-self: center;
        }

        div:nth-child(even) {
          grid-column: 1 / 2;
          justify-self: flex-end;
        }
        div:nth-child(odd) {
          grid-column: 2 / 3;
          justify-self: flex-start;
        }

        div:nth-child(1) {
          grid-column: 1/-1;
          justify-self: center;
        }

        .level {
          display: flex;
          justify-content: center;
          align-items: self-end;
          width: 70px;
          height: 70px;
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
    .container-graphs {
      width: 80%;
      justify-self: center;
      display: grid;
      grid-template: 0.2fr 1fr / 1fr;

      .select-text {
        justify-self: center;
      }
    }
  }
}
</style>
