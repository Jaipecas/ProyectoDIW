import Vue from "vue";


Vue.component(
    "DashboardComponent",
    require("./components/dashboard/DashboardComponent.vue").default,
);

new Vue({
    el: "#app",
});