require('./bootstrap');
window.Vue = require('vue');
Vue.component('theheader', require('./components/TheHeader.vue').default);
Vue.component('solvepage', require('./components/SolvePage.vue').default);

const app = new Vue({
    el: '#app'
});

// '123-0099 ririeooo',
// '/[0-9]{3}-[0-9]{4}/',