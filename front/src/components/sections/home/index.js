export default {
  computed: {
    introductions() {
      return this.$store.getters.getIntroductions[0] || []
    },
    avatar() {
      return this.introductions.avatar;
    },
    greeting() {
      return this.introductions.greeting
    }
  }
}