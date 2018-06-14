import _ from 'lodash'

import {
  SET_INTRODUCTIONS
} from '../mutation-types'

export const state = {
  introductions: null
}

export const getters = {
  getIntroductions: (state, store) => {
    return _.filter(state.introductions, {'lang': store.getLanguage});
  }
}

export const mutations = {
  [SET_INTRODUCTIONS](state, data) {
     state.introductions = data;
  }
}

export default {
  state,
  mutations,
  getters
}
