require('./bootstrap');
window.Vue = require('vue');
Vue.config.productionTip = false

import App from './layout/App'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import axios from 'axios'
import {routes} from "./router"


Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
