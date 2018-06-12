import moment from 'moment'
import store from '../../vuex/store'

export default {
  filters: {
    toISOString(str) {
      return moment(str).toISOString()
    },

    formatDate(str, format = null) {
      const outputFormat = 'MMMM YYYY'
      const lang = store.getters.getLanguage
      if (format == null) {
        return moment(str).lang(lang).format(outputFormat)
      }
      return moment(str, format).lang(lang).format(outputFormat)
    },
    
    diffForHumans(str) {
      return moment(str).from(moment())
    },
  },
}