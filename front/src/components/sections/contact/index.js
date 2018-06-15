import Vue from 'vue'

export default {
  data: () => {
    return {
      //test: 'sssss'
    }
  },
  computed: {
    emailLink() {
      return `mailto:${ this.lang('contact.email') }?Subject=Contacto Web` 
    },
    phoneLink() {
      return `tel:${ this.lang('contact.phone') }` 
    }
  }
}