/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

Vue.component('card-container-component', require('./components/CardContainerComponent.vue'));

const register = new Vue({
    el: '#app',
    data: { 
        c_cards: []
    },
    methods: {
        currentGames: function() {
            var vm = this;
            // 3 ultimas partida en juego via AJAX
            return axios.get('/api/info/currentgames/3')
                .then(function (response) {
                    console.log("current games:", response);
                    vm.createCard('Current Games', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Current Games', error.response.status, error.response.statusText, error.response.data);
                });
        },
        ranking: function() {
            var vm = this;
            // Rankig de los tres mejores usuario en español
            return axios.get('/api/info/ranking/es/3')
                .then(function (response) {
                    console.log("Ranking:", response);
                    vm.createCard('Ranking', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('Ranking', error.response.status, error.response.statusText, error.response.data);
                });
        },
        generalInfo: function() {
            var vm = this;
            // Información del sistema
            return axios.get('/api/info/general')
                .then(function (response) {
                    console.log("System Info:", response);
                    vm.createCard('System Info', response.status, response.statusText, response.data);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                    vm.createCard('System Info', error.response.status, error.response.statusText, error.response.data);
                });
        },
        createCard: function(title, status, statusText, data) {
            var newcard = {
                order: this.c_cards.length + 1,
                type: title,
                errorCode: status,
                statusCode: statusText,
                output: data
            }

            this.c_cards.push(newcard);
        }  
    }
});
