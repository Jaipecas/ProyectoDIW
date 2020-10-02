import Echo from "laravel-echo"
window.io = require('socket.io-client');

// Have this in case you stop running your laravel echo server
if (typeof io !== 'undefined') {
  window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
    csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    auth: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      }
    }
  });
}

Vue.component('tableboard-test-component', require('./components/TableboardTestComponent.vue'));

const register = new Vue({
  el: '#app',
});