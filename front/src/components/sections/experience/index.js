export default {
  computed: {
    language() {
      return this.$store.getters.getLanguage
    }
  },
  methods: {
    setLanguage(lang) {
      this.$store.commit('SET_LANGUAGE', lang)
    }
  }
}