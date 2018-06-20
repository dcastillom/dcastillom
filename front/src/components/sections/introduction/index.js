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
      return this.$store.getters.getIntroductions
    },
    slides() {
      return this.$store.getters.getSlides
    },
    intro() {
      return this.introductions.intro;
    },
    swiper() {
      return this.$refs.mySwiper.swiper
    },
    pollas() {
      return 'sss.jpg'
    }
    // images() {
    //   return [ '/1.jpg', '/2.jpg', '/3.jpg' ]
    // }
  },
  mounted() {
    this.swiper.slideTo(0, 1000, false)
  }
}