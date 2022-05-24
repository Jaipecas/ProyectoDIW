<template>
  <div class="vwrap">
    <div class="vmove">
      <div class="vitem">
        <h4>Partidas en juego</h4>
        <span>{{ infoList.games.playing }}</span>
      </div>
      <div class="vitem">
        <h4>Usuarios conectados</h4>
        <span>{{ infoList.users.connected }}</span>
      </div>
      <div class="vitem">
        <h4>Número de nacionalidades</h4>
        <span>{{ infoList.users.nacionalities }}</span>
      </div>
      <div class="vitem">
        <h4>Usuarios registrados</h4>
        <span>{{ infoList.users.number }}</span>
      </div>
    </div>
  </div>
</template>
<script>
import Info from "../../../../../classes/Info";
export default {
  name: "GamesDashComponent",
  data: function () {
    return {
      infoList: null,
    };
  },
  created() {
    this.getInfo();
  },
  methods: {
    async getInfo() {
      this.infoList = await Info.getGeneralInfo();
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.vwrap {
  overflow: hidden;
  .vmove {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;

    animation-name: tickerv;
    animation-duration: 15s;
    animation-delay: 2s;
    animation-iteration-count: infinite;
    transform: translateY(250px);

    .vitem {
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 200px;
      height: 100px;
      text-align: center;
      margin-top: 50px;
      @include dash-card(#f37055, 120px, 1.5rem);
    }
  }
}

@keyframes tickerv {
  0% {
    bottom: 0;
  }
  20% {
    bottom: 240px;
  }
  40% {
    bottom: 410px;
  }
  60% {
    bottom: 580px;
  }
  80% {
    bottom: 750px;
  }
  100% {
    bottom: 1000px;
  }
}
</style>
