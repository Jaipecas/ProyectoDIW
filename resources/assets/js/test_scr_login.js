/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from "vue";
import { post } from "./test_helpers"; // importa la función post

var url =
  location.protocol +
  "//" +
  location.hostname +
  (location.port ? ":" + location.port : "");

new Vue({
  el: "#app",
  data: {},
  methods: {
    automatic_login1: function (event) {
      event.preventDefault();

      var user = { email: "u1@c.com", password: "12345" };
      post(url + "/scrabble/login", user);
    },
    automatic_login2: function (event) {
      event.preventDefault();

      var user = { email: "u2@c.com", password: "12345" };
      post(url + "/scrabble/login", user);
    },
    wrong_login: function (event) {
      event.preventDefault();

      var user = { email: "u2@c.com", password: "1245" };
      post(url + "/scrabble/login", user);
    },
    wrong_register: function (event) {
      event.preventDefault();

      var user = {
        name: "user4",
        country: "ES",
        email: "user4@c.com",
        password: "12",
      };
      post(url + "/scrabble/register", user);
    },
  },
});
