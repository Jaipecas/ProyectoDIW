<template>
  <div class="container-news">
    <div>
      <h3>{{ newsList[newsCount].header }}</h3>
      <p>{{ newsList[newsCount].updated_at }}</p>
    </div>
    <div>
      <button class="button-text" @click="firstNews">Primera</button>
      <button class="button-arrow" @click="beforeNews">&#8672;</button>
      <button class="button-arrow" @click="nextNews">&#8674;</button>
      <button class="button-text" @click="lastNews">Ultima</button>
    </div>
  </div>
</template>

<script>
import Info from "../../../../classes/Info";
import News from "../../../../classes/News";

export default {
  name: "NewsAreaComponent",
  data: function () {
    return {
      newsList: null,
      newsCount: 0,
      dateNews: "",
    };
  },
  created() {
    this.getNews();
  },
  methods: {
    async getNews() {
      this.data = await Info.getNews();
      this.newsList = this.data.map((news) => Object.assign(new News(), news));
      this.newsList.map((news) => {
        let date = new Date(news.updated_at);
        news.updated_at = date.toLocaleDateString("es-ES");
        return news;
      });
    },

    nextNews() {
      if (this.newsCount !== this.newsList.length - 1) {
        this.newsCount++;
      }
    },
    beforeNews() {
      if (this.newsCount !== 0) {
        this.newsCount--;
      }
    },
    firstNews() {
      this.newsCount = 0;
    },
    lastNews() {
      this.newsCount = this.newsList.length - 1;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./resources/assets/sass/_dashboard_main.scss";

.container-news {
  display: grid;
  grid-template: 200px 1fr / 1fr;

  :nth-child(1) {
    justify-self: center;
    cursor: pointer;
    h3 {
      max-height: 150px;
      overflow: hidden;
      font-size: 1.3rem;
    }

    p {
      font-size: 1rem;
    }

    > * {
      text-align: center;
    }
  }

  :nth-child(2) {
    align-self: flex-end;
    justify-self: center;

    .button-text {
      @include dash-button(0.8rem);
    }
    .button-arrow {
      @include round-button(30px, 30px, white, #ef4e7b, 1rem);
    }
  }
}
</style>
