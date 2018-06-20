import _ from 'lodash'

import {
  SET_SLIDES
} from '../mutation-types'

export const state = {
  slides: null
}

export const getters = {
  getSlides: (state, store) => {
    return _.filter(state.slides, {'lang': store.getLanguage});
  }
}

export const mutations = {
  [SET_SLIDES](state, data) {
     state.slides = data
  }
}

export default {
  state,
  mutations,
  getters
}
