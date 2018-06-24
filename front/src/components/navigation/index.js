export default {
  computed: {
    activeSection() {
      return this.$store.getters.getActiveSection
    },
    menu: function() {
      return this.$store.getters.getMenu
    }
  },
  methods: {
    setActiveSection(section) {
      this.$store.commit('SET_ACTIVE_SECTION', section)
      this.$store.commit('CLOSE_MENU')
    },
    displayMenu(event) {

      let mobile = window.innerWidth < 500

      if (event.type == 'click' && mobile) {
        let classes = event.target.classList
        let displayIt = classes.contains('ico-hamburger') && !classes.contains('displayed')
        this.$store.commit(displayIt ? 'OPEN_MENU' : 'CLOSE_MENU')
        return
      }

      this.$store.commit(mobile ? 'CLOSE_MENU' : 'OPEN_MENU')
    }
  },
  mounted() {
    window.addEventListener('load', event => this.displayMenu(event))
    window.addEventListener('resize', event => this.displayMenu(event))
    window.addEventListener('click', event => this.displayMenu(event))
  }
}