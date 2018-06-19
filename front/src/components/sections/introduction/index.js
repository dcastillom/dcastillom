import { swiper, swiperSlide } from 'vue-awesome-swiper'

export default {
  components: {
    swiper,
    swiperSlide
  },
  data () {
    return {
      swiperOption: {
        pagination: {
          el: '.swiper-pagination'
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      }
    }
  },
  computed: {
    introductions() {
      return this.$store.getters.getIntroductions[0] || []
    },
    intro() {
      return this.introductions.intro;
    },
    swiper() {
      return this.$refs.mySwiper.swiper
    },
    images() {
      return [ '/1.jpg', '/2.jpg', '/3.jpg' ]
    }
  },
  mounted() {
    this.swiper.slideTo(0, 1000, false)
  }
}