/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './components/App';
Vue.use(VueAxios, axios);

import Word from './components/WordComponent'

const routes = [{
        name: 'home',
        path: '/',
        component: Word
    },
    {
        name: 'word',
        path: '/word/?q=:word',
        component: Word
    }
];


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
