require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';

window.Vue = require('vue').default;
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);

const app = new Vue({
    el: '#app',
    router
});
