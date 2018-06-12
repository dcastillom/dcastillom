import request from 'superagent';
import _ from 'lodash';
import store from '../vuex/store'

const endPoints = require('./end-points.json')
const prefix = 'http://localhost:8081/api/' // TODO: Comprobar si es dev o pro

export default {

  getContents(urls = {}) {

    _.defaults(urls, endPoints)

    _.forEach(urls, (url, key) => {
      return request.get(`${prefix}${url}`)
        .then(data => {
          store.commit(`SET_${key.toUpperCase()}`, data.body)
        })
        .catch()
    })
  }
}
