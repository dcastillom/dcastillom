export default {
  computed: {
    language() {
      return this.$store.getters.getLanguage
    }
  },
  methods: {
    goToHome() {
      this.$store.commit('SET_ACTIVE_SECTION', 'home')
    },
    setLanguage(lang) {
      this.$store.commit('SET_LANGUAGE', lang)
    }
  }
}