/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import axios from "axios";

Vue.component(
  "CardContainerComponent",
  require("./components/CardContainerComponent.vue")
);

new Vue({
  el: "#app",
  data: {
    c_cards: [],
  },
  methods: {
    currentGames() {
      // 3 ultimas partida en juego via AJAX
      return axios
        .get("/api/info/currentgames/3")
        .then((response) => {
          console.log("current games:", response);
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
      return axios
        .get("/api/info/ranking/es/3")
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
      return axios
        .get("/api/info/general")
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
    createCard(title, status, statusText, data) {
      let newcard = {
        order: this.c_cards.length + 1,
        type: title,
        errorCode: status,
        statusCode: statusText,
        output: data,
      };

      this.c_cards.push(newcard);
    },
  },
});
