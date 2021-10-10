require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';
import { BootstrapVue } from 'bootstrap-vue'
import Multiselect from 'vue-multiselect'

Vue.use(BootstrapVue);

window.Vue = require('vue').default;
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('multiselect', Multiselect)
const app = new Vue({
    el: '#app',
    router
});
