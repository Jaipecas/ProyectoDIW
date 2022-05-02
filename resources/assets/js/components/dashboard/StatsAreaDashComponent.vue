<template>
  <div class="container-stats">
    <h2>Estadísticas</h2>
    <h5>Idioma</h5>
    <div class="language">
      <button name="before" @click="changeLanguage($event)">&#8672;</button>
      <country-flag
        :country="statsList[statsLanguage].language_code"
        size="big"
        rounded="true"
        shadow="true"
      />
      <button name="next" @click="changeLanguage($event)">&#8674;</button>
    </div>
    <div>
      <div class="stats-dash">
        <div class="level">
          {{ statsList[statsLanguage].level }}
        </div>
        <card-dash
          title="Partidas ganadas"
          :stat="statsList[statsLanguage].won"
        />
        <card-dash
          title="Partidas perdidas"
          :stat="statsList[statsLanguage].lost"
        />
        <card-dash
          title="Partidas más valiosa"
          :stat="statsList[statsLanguage].most_valuable_word"
        />
        <card-dash
          title="Palabra más valiosa"
          :stat="statsList[statsLanguage].most_valuable_word_points"
        />
        <card-dash
          title="Partida mejor palabra"
          :stat="statsList[statsLanguage].most_valuable_word_game"
          div
        />
        <card-dash
          title="Partida más corta"
          :stat="statsList[statsLanguage].shortest_game"
          div
        />
        <card-dash
          title="Partida más larga"
          :stat="statsList[statsLanguage].longest_game"
          div
        />
      </div>
    </div>
  </div>
</template>

<script>
import CardDash from "../CardDashComponent.vue";
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
  created() {
    this.getUserDashStats();
  },
  methods: {
    async getUserDashStats() {
      this.statsList = await UserStats.getUserStats();
      console.log(this.statsList);
    },
    changeLanguage(event) {
      if (this.statsLanguage === this.statsList.length) {
        this.statsLanguage = 0;
        return;
      }

      if (event.target.name === "next") {
        this.statsLanguage++;
      } else {
        this.statsLanguage--;
      }
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

  h2 {
    text-align: center;
    margin-top: 20px;
  }

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
      width: 110px;
      height: 110px;
      background: blue;
      border-radius: 60px;
    }
  }
}
</style>
