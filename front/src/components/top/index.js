export default {
  computed: {
    language() {
      return this.$store.getters.getLanguage
    },
    languages() {
      return this.$store.getters.getLanguages
    },
    menu() {
      return this.$store.getters.getMenu
    }
  },
  methods: {
    goToHome() {
      this.$store.commit('SET_ACTIVE_SECTION', 'home')
    },
    setLanguage(lang) {
      this.$store.commit('SET_LANGUAGE', lang)
    },
    openMenu() {
      this.$store.commit('TOGGLE_MENU')
    }
  }
}