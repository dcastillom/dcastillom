import dateMixin from '../../../common/mixins/date';

export default {
  mixins: [dateMixin],
  computed: {
    language() {
      return this.$store.getters.getLanguage
    },
    experiences() {
      return this.$store.getters.getExperiences
    }
  },
  methods: {
    getLinks(links) {
      return links.split(/[\s,]+/);
    }
  }
}