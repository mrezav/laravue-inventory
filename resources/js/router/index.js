
import Vue from 'vue';

const { default: VueRouter } = require('vue-router');
Vue.use(VueRouter)

const Home = require('./../pages/Home.vue').default
const Items = require('./../pages/Items.vue').default
const Costumers = require('./../pages/Costumers.vue').default
const Sales = require('./../pages/Sales.vue').default
// const Notfound = require('./../pages/Notfound.vue').default
import User from './../pages/User.vue'
import Notfound from './../pages/Notfound.vue'

const routes = [
    {
        name: 'home',
        path : '/',
        component: Home
    },
    {
        name: 'item',
        path : '/item',
        component: Items
    },
    {
        name: 'customer',
        path : '/customer',
        component: Costumers
    },
    {
        name: 'sale',
        path : '/sale',
        component: Sales
    },
    {
        name: 'user',
        path : '/user/:name?',
        component: User,
        props: true
    },
    {
        path : '*',
        component: Notfound
    }
]

const router = new VueRouter({
    mode:'history',
    routes: routes
})

export default router