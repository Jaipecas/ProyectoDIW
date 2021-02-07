/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import axios from "axios";
import CardMixin from "./mixins/CardMixin";

Vue.component(
  "CardContainerComponent",
  require("./components/CardContainerComponent.vue").default
);

new Vue({
  el: "#app",
  /* data: {
    c_cards: [],
  }, */
  mixins: [CardMixin],
  methods: {
    currentGames() {
      // 3 últimas partida en juego vía AJAX
      const promise = axios.get("/api/info/currentgames/3");
      promise
        .then((response) => {
          console.log("currescr_indexnt games:", response);
          this.createCard(
            "Current Games",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Current Games",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    ranking() {
      // Rankig de los tres mejores usuario en español
      const promise = axios.get("/api/info/ranking/es/3");
      promise
        .then((response) => {
          console.log("Ranking:", response);
          this.createCard(
            "Ranking",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "Ranking",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    generalInfo() {
      // Información del sistema
      const promise = axios.get("/api/info/general");
      promise
        .then((response) => {
          console.log("System Info:", response);
          this.createCard(
            "System Info",
            response.status,
            response.statusText,
            response.data
          );
        })
        .catch((error) => {
          console.log("ERROR: " + error);
          this.createCard(
            "System Info",
            error.response.status,
            error.response.statusText,
            error.response.data
          );
        });
    },
    /* createCard(title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };

      this.c_cards.push(newcard);
    }, */
  },
});
