import {
  SET_SKILLS
} from '../mutation-types'

export const state = {
  skills: null
}

export const getters = {
  getSkills: state => state.skills
}

export const mutations = {
  [SET_SKILLS](state, data) {
     state.skills = data
  }
}

export default {
  state,
  mutations,
  getters
}
