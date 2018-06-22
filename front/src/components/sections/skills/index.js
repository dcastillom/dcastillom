import Chart from 'chart.js'

export default {

  methods: {
    createChart(object) {
      const ctx = this.$refs.myChart
      new Chart(ctx, {
        type: object.type,
        data: object.data,
        options: object.options,
      })
    },
    getSkillMap() {
      let items = this.$store.getters.getSkills || []
      let skills = []
      let levels = []
      let bgColors = []
      let bdColors = []

      for (var item of items) {
        skills.push(item.skill)
        levels.push(item.level)
        bgColors.push('rgba(54,73,93,.5)')
        bdColors.push('#36495d')
      }

      let skillsMap = [skills, levels, bgColors, bdColors]
      let data = {
        type: 'bar',
        data: {
          labels: skillsMap[0] || null,
          datasets: [{
            label: this.lang('skills-label'),
            data: skillsMap[1] || null,
            backgroundColor: skillsMap[2] || null,
            borderColor: skillsMap[3] || null,
            borderWidth: 3
          }]
        },
        options: {
          responsive: true,
          lineTension: 1,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                padding: 25,
              }
            }]
          },
          legend: {
            display: false
          }
        }
      }

      return !!items.length ? this.createChart(data) : setTimeout(() => {
          return this.getSkillMap()
        }, 1000)

    }
  },
  mounted() {
    this.getSkillMap()
  }
}