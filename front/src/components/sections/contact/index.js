import Vue from 'vue'

export default {
  data: () => {
    return {
      //test: 'sssss'
    }
  },
  computed: {
    language() {
      return this.$store.getters.getLanguage
    },
    emailLink() {
      return `mailto:${ this.lang('contact.email') }?Subject=Contacto Web` 
    },
    phoneLink() {
      return `tel:${ this.lang('contact.phone') }` 
    }
  },
  methods: {
    setLanguage(lang) {
      this.$store.commit('SET_LANGUAGE', lang)
    }
  }
}