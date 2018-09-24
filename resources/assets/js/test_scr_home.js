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
        cards: [] 
    },
    methods: {
        remove_avatar: function(event) {
            event.preventDefault();

            var vm = this;
            return axios.post('/user/avatar/remove')
                .then(function (response) {
                    
                    console.log(response);
                    var newcard = {
                        order: vm.cards.length + 1,
                        type: 'Remove Avatar',
                        errorCode: response.status,
                        statusCode: response.statusText,
                        output: response.data
                    }

                    vm.cards.push(newcard);
                })
                .catch(function (error) {
                    console.log("ERROR: " + error);
                });
        }

    }
});