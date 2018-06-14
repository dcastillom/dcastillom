import _ from 'lodash'

import {
  SET_EXPERIENCES
} from '../mutation-types'

export const state = {
  experiences: null
}

export const getters = {
  getExperiences: (state, store) => {
    return _.filter(state.experiences, {'lang': store.getLanguage});
  }
}

export const mutations = {
  [SET_EXPERIENCES](state, data) {
     state.experiences = data;
  }
}

export default {
  state,
  mutations,
  getters
}
