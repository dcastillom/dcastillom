import Vue from 'vue'
import bootApp from './boot/index'
import app from './app.vue'
import VueRouter from 'vue-router'
import routes from './routes'
import store from './vuex/store.js'

Vue.use(VueRouter)
Vue.use(store)

const router = new VueRouter({
  linkActiveClass: 'active',
  mode: 'history',
  routes
})


bootApp()
  .then(() => {
    new Vue({
      el: '#app',
      render: h => h(app),
      router,
      store
    })

  })


