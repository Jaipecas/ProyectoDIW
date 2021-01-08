/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import { post } from "./test_helpers"; // importa la funcion post

let url =
  location.protocol +
  "//" +
  location.hostname +
  (location.port ? ":" + location.port : "");

new Vue({
  el: "#app",
  data: {},
  methods: {
    automatic_register(event) {
      event.preventDefault();

      let user = {
        name: "user4",
        country: "ES",
        email: "user4@c.com",
        password: "12345",
        password_confirmation: "12345",
      };
      post(url + "/scrabble/register", user);
    },
    wrong_register(event) {
      event.preventDefault();

      let user = {
        name: "user4",
        country: "ES",
        email: "user4@c.com",
        password: "12",
      };
      post(url + "/scrabble/register", user);
    },
  },
});
