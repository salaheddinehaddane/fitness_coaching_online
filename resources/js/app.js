import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from "./routes";
require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);

// Vue.component('login', require('./components/login.vue').default);

import Toaster from 'v-toaster'

// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'

// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, { timeout: 5000 })

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});