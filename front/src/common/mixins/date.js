import moment from 'moment'
import store from '../../vuex/store'

export default {
  filters: {
    toISOString(str) {
      return moment(str).toISOString()
    },

    formatDate(str, format = null) {
      const lang = store.getters.getLanguage
      return moment(str, 'DD/MM/YYYY').locale(lang).format(!!format ? format : 'MMMM YYYY')
    },

    
    diffForHumans(str) {
      return moment(str).from(moment())
    },
  },
}