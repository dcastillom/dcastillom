import dateMixin from '../../../common/mixins/date';

export default {
  mixins: [dateMixin],
  computed: {
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