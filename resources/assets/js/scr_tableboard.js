import Vue from "vue";

window.io = require("socket.io-client");

Vue.component(
    "TableboardComponent",
    require("./components/tableboard/TableboardComponent.vue").default
);

new Vue({
    el: "#app",
});