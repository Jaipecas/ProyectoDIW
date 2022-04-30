import Vue from "vue";


Vue.component(
    "DashboardComponent",
    require("./components/DashboardComponent.vue").default,
);

new Vue({
    el: "#app",
});