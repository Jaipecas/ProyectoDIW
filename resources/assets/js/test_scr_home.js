/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Echo from "laravel-echo";
import Vue from "vue";

window.io = require("socket.io-client");

// Have this in case you stop running your laravel echo server
if (typeof io !== "undefined") {
  window.Echo = new Echo({
    broadcaster: "socket.io",
    host: window.location.hostname + ":6001",
  });
}

Vue.component(
  "DashboardTestComponent",
  require("./components/DashboardTestComponent.vue").default
);

new Vue({
  el: "#app",
});
