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
    slides() {
      return this.$store.getters.getSlides || []
    },
    intro() {
      let intros = this.$store.getters.getIntroductions[0]
      return !!intros ? intros.intro : null
    },
    swiper() {
      return this.$refs.mySwiper.swiper
    }
  },
  mounted() {
    this.swiper.slideTo(0, 1000, false)
  }
}