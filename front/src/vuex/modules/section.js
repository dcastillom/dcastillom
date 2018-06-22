import {
  SET_ACTIVE_SECTION,
  CLEAR_ACTIVE_SECTION
} from '../mutation-types'

export const state = {
  activeSection: 'home'
}

export const getters = {
  getActiveSection: () => {
    return state.activeSection
  }
}

export const mutations = {
  [SET_ACTIVE_SECTION](state, data) {
    state.activeSection = data
  },
  [CLEAR_ACTIVE_SECTION](state) {
    state.activeSection = 'home'
  }
}

export default {
  state,
  mutations,
  getters
}