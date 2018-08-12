require('./bootstrap');


window.Vue = require('vue');
window.Vuetify = require('vuetify');

import Vue from 'vue';
import VueRouter from 'vue-router';

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import colors from 'vuetify/es5/util/colors';


Vue.use(VueRouter);

Vue.use(Vuetify, {
	theme: {
	    primary: '#3f51b5',
	    secondary: '#b0bec5',
	    accent: '#8c9eff',
	    success: '#4CAF50',
	    error: '#F44336',
	    warning: '#FBC02D',
	    info: '#0288D1'
	},
	iconfont: 'mdi'
});

let Toolbar = Vue.component('Toolbar', require('./components/Toolbar'));
let Home = Vue.component('Home', require('./components/Home'));
let About = Vue.component('About', require('./components/About'));
let Phones = Vue.component('Phones', require('./components/Phones'));
// let Snack = Vue.component('SnackS', require('./components/Snack'));


const routes = [
	{ path: '/home', component: Home },
	{ path: '/about', component: About },
	{ path: '/phones', component: Phones }
]

const router = new VueRouter({
	routes,
	mode: 'history'
})

const app = new Vue({
    el: '#app',
    components: {Toolbar},
    router
});

