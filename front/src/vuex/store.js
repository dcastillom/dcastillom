import Vue from 'vue'
import Vuex from 'vuex'

import language from './modules/language'
import section from './modules/section'

import experiences from './modules/experiences'
import introductions from './modules/introductions'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    language,
    section,
    experiences,
    introductions
  }
})