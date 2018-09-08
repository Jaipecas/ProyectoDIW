/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

Vue.component('card-container-component', require('./components/CardContainerComponent.vue'));
Vue.component('user-data-component', require('./components/UserDataComponent.vue'));

const register = new Vue({
    el: '#app',
    data: { 
        cards: [{
            order: 1,
            type: 'Registro',
            errorCode: 200,
            statusCode: 'OK',
            output: "4"
        },
        {
            order: 2,
            type: 'listaaddddf',
            errorCode: 400,
            statusCode: 'ERROR',
            output: {
                hola: "wkilo",
                carcola: 224,
                pepsi: "milenial"
            }
        }] 
    },
    methods: {}
});