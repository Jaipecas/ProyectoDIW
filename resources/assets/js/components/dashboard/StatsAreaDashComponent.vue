<template>
  <div class="stats-dash">
    <div class="level" />
    <card-dash v-for="stat in statsList" :key="stat.language_code" />
  </div>
</template>

<script>
import CardDash from "../CardDashComponent.vue";
import UserStats from "../../../../classes/UserStats";

export default {
  name: "StatsAreaDashComponent",
  components: {
    "card-dash": CardDash,
  },
  data: function () {
    return {
      statsList: Array,
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
  },
};
</script>

<style lang="scss" scoped>
.stats-dash {
  display: grid;
  grid-template: repeat(4, 1fr) / 0.5fr 1fr 1fr 0.5fr;
  gap: 20px;
  height: 600px;
  overflow: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    display: none;
  }

  div:nth-child(1) {
    grid-column: 1/-1;
    justify-self: center;
    align-self: center;
    margin-top: 30px;
    margin-bottom: 30px;
  }

  div:nth-child(2) {
    grid-column: 2 / 3;
    justify-self: center;
  }
  div:nth-child(3) {
    grid-column: 3 / 4;
    justify-self: center;
  }
  div:nth-child(4) {
    grid-column: 2 / 4;
    justify-self: center;
  }
  div:nth-child(5) {
    grid-column: 2 / 3;
    justify-self: center;
  }
  div:nth-child(6) {
    grid-column: 3 / 4;
    justify-self: center;
  }

  .level {
    width: 110px;
    height: 110px;
    background: blue;
    border-radius: 60px;
  }
}
</style>
