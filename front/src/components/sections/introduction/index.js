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
    // setTimeout(() => {
    //   this.banners.push('/4.jpg')
    //   console.log('banners update')
    // }, 3000)
    // console.log(
    //   'This is current swiper instance object', this.mySwiper, 
    //   'It will slideTo banners 3')
    // this.mySwiper.slideTo(3, 1000, false)
    let swiper = 
    this.swiper.slideTo(0, 1000, false)
  }
}