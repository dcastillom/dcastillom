import Top from './components/top/index.vue'
import Navigation from './components/navigation/index.vue'
import Home from './components/sections/home/index.vue'
import Introduction from './components/sections/introduction/index.vue'
import Experience from './components/sections/experience/index.vue'
import Education from './components/sections/education/index.vue'
import Skills from './components/sections/skills/index.vue'
import Interests from './components/sections/interests/index.vue'
import Contact from './components/sections/contact/index.vue'
import Download from './components/sections/download/index.vue'
import Bottom from './components/bottom/index.vue'

export default {
  computed: {
    activeSection() {
      return this.$store.getters.getActiveSection
    }
  },
  components: {
    Top,
    Navigation,
    Home,
    Introduction,
    Experience,
    Education,
    Skills,
    Interests,
    Contact,
    Download,
    Bottom
  }
}