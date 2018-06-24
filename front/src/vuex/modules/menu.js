import {
  TOGGLE_MENU,
  OPEN_MENU,
  CLOSE_MENU
} from '../mutation-types'

export const state = {
  visible: false
}

export const getters = {
  getMenu: () => {
     return {
        visible: state.visible
     }
  }
}

export const mutations = {
  [TOGGLE_MENU](state) {
     state.visible = !state.visible
  },
  [OPEN_MENU](state) {
    state.visible = true
  },
  [CLOSE_MENU](state) {
     state.visible = false
  }
}

export default {
  state,
  mutations,
  getters
}
