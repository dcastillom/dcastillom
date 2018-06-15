import {
  SET_LANGUAGE,
  SET_LANGUAGES,
  SET_DEFAULT_LANGUAGE
} from '../mutation-types'

export const state = {
  language: 'es',
  languages: []
}

export const getters = {
  getLanguage: () => {
    return state.language
  },
  getLanguages: () => {
    return state.languages
  }
}

export const mutations = {
  [SET_LANGUAGE](state, data) {
    state.language = data
  },
  [SET_LANGUAGES](state, data) {
    state.languages = data
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