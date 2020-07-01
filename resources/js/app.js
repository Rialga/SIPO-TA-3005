import App from './layout/App'
import store from './store'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import axios from 'axios'
import Vue from 'vue'
import {routes} from "./router"


Vue.use(VueRouter);
Vue.use(VueAxios, axios);


axios.defaults.baseURL = 'http://localhost:8000/api';

Vue.config.productionTip = false

const router = new VueRouter({
    mode: 'history',
    routes: routes
});



new Vue({
    router: router,
    store,
    render: h => h(App)
}).$mount('#app')
