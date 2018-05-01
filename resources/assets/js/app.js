
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('card-container-component', require('./components/CardContainerComponent.vue'));

const app = new Vue({
    el: '#app',
    data: { 
        cards: [{
            order: 1,
            type: 'Registro',
            erroCode: 200,
            statusCode: 'OK',
            output: {
                hola: "w",
                carcola: 2
            }
        },
        {
            order: 2,
            type: 'listaaddddf',
            erroCode: 400,
            statusCode: 'ERROR',
            output: {
                hola: "wkilo",
                carcola: 224
            }
        }]
    }
});
