<template>
  <div class="container-main">
    <h2 class="header-area-dash">Estadísticas</h2>
    <div class="container-stats">
      <div class="container-cards">
        <h5>Idioma</h5>
        <div class="language">
          <!-- quiza usar el componente creado en partidas -->
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
        <div>
          <bar-chart :chart-data="chartData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardDash from "./CardDashComponent.vue";
import LangFlag from "vue-lang-code-flags";
import BarChart from "./BarChartComponent.vue";

export default {
  name: "StatsAreaDashComponent",
  components: {
    "card-dash": CardDash,
    "lang-flag": LangFlag,
    "bar-chart": BarChart,
  },
  props: {
    stats: {
      type: Array,
      required: true,
    },
  },
  data: function () {
    return {
      statsUser: null,
      statsLanguage: 0,
      statsWinLose: null,
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
  created() {
    this.statsUser = this.stats;
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
    getDataBarChart() {
      this.statsWinLose = {
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
};
</script>

<style lang="scss" scoped>
@import "resources/assets/sass/_dashboard_main.scss";

.container-main {
  display: flex;
  flex-direction: column;
  align-items: center;

  h5 {
    text-align: center;
    margin-top: 20px;
  }
  .container-stats {
    display: grid;
    grid-template: 1fr / 1fr 1fr;
    width: 100%;

    .container-cards {
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
    }
  }

  .container-graphs {
    @include dash-card(#a1bcf0, 300px, 1.2rem);
  }
}
</style>
