import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import {routes} from './routes.js'
import {store} from './store/store.js'
import VueResource from 'vue-resource'
import vPagination from 'vue-plain-pagination'

Vue.component('vPagination', vPagination)
Vue.use(VueResource)
Vue.use(VueRouter)

const router=new VueRouter({routes})
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})


