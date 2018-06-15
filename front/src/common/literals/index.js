import Vue from 'vue'
import store from '../../vuex/store'
import Promise from 'bluebird'
import _ from 'lodash'

export default () => {

  return new Promise(resolve => {
    console.log('store.getters.getLanguage', store.getters.getLanguage)
    Vue.prototype.lang = literal => {
      const literals = require(`./${store.getters.getLanguage}.json`)
      return _.get(literals, literal);
    }
    resolve()
  })
}

