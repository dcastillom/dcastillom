export default {
  computed: {
    introductions() {
      return this.$store.getters.getIntroductions[0] || []
    },
    // avatar() {
    //   let dbImg = this.introductions.avatar
    //   return !!dbImg ? 'data:image/gif;base64,' + dbImg : '/_build/imgs/avatar.jpg'
    // },
    avatar() {
      return this.introductions.avatar;
    },
    greeting() {
      return this.introductions.greeting
    }
  }
}