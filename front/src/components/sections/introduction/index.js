export default {
  methods: {
    setLanguage(lang) {
      this.$store.commit('SET_LANGUAGE', lang)
    }
  }
}