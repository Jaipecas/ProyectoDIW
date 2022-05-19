<template>
  <div class="container-news">
    <div>
      <h3>{{ newsList[newsCount].header }}</h3>
      <p>{{ newsList[newsCount].updated_at }}</p>
    </div>
    <move-buttons
      :length-list="newsList.length - 1"
      size-buttons="S"
      @change-count="changePage"
    />
  </div>
</template>

<script>
import MoveButtons from "./MoveButtonsComponent.vue";

import Info from "../../../../classes/Info";
import News from "../../../../classes/News";

export default {
  name: "NewsAreaComponent",
  components: {
    "move-buttons": MoveButtons,
  },
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

    changePage(count) {
      this.newsCount = count;
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
}
</style>
