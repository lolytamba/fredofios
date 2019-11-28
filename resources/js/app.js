
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '@mdi/font/css/materialdesignicons.css'
import '@fortawesome/fontawesome-free/css/all.css'
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify';
// import auth from './service/Auth'
import store from './store'
import Vuelidate from 'vuelidate';
//import http from './service/Http'
import { routes } from './routes'
import 'vuetify/dist/vuetify.min.css';
// import 'font-awesome/css/font-awesome.min.css';
// import 'font-awesome/css/font-awesome.css';


import App from './components/App'

//http.init(); 

//setupComponents(Vue);
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(Vuelidate);
// Vue.component('apexchart', VueApexCharts)

const router = new VueRouter({
    base:'/',
    mode: 'history',
    routes,
});

Vue.router = router

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requireLogin)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.loggedIn) {
        next({
          path: '/login',
          query: { redirect: to.fullPath }
        })
      } else {
        next()
      }
    } else {
      next() // make sure to always call next()!
    }
})

new Vue({
    el: '#app',
    router,
    vuetify : new Vuetify(),
    store,
    render: h => h(App),
    created() {
        try {
            auth.refresh()
        } catch (err) {
            // Do nothing :))
        }
    }
}).$mount('#app');
