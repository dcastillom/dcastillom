import {
  SET_LANGUAGE,
  SET_DEFAULT_LANGUAGE
} from '../mutation-types'

export const state = {
  language: 'es'
}

export const getters = {
  getLanguage: () => {
    return state.language
  }
}

export const mutations = {
  [SET_LANGUAGE](state, data) {
    state.language = data
  },
  [SET_DEFAULT_LANGUAGE](state) {
    state.language = 'es'
  }
}

export default {
  state,
  mutations,
  getters
}