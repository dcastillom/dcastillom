export default {
  computed: {
    activeSection() {
      return this.$store.getters.getActiveSection
    }
  },
  methods: {
    setActiveSection(section) {
      this.$store.commit('SET_ACTIVE_SECTION', section)
    }
  }
}