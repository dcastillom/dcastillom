import Chart from 'chart.js'

export default {
  data () {
    return {
      chartData: {
        type: 'bar',
        data: {
          labels: ['HTML', 'CSS', 'JScript', 'Vue.js', 'Angular', 'JQuery', 'Laravel'],
          datasets: [
            {
              label: "Skills",
              data: [20, 50, 10, 30, 40, 62, 27],
              backgroundColor: [
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)',
                'rgba(54,73,93,.5)'
              ],
              borderColor: [
                '#36495d',
                '#36495d',
                '#36495d',
                '#36495d',
                '#36495d',
                '#36495d',
                '#36495d',
              ],
              borderWidth: 3
            }
          ]
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
          }
        }
      }
    }
  },
  computed: {

  },
  methods: {
    createChart() {
      const ctx = this.$refs.myChart
      new Chart(ctx, {
        type: this.chartData.type,
        data: this.chartData.data,
        options: this.chartData.options,
      })
    }
  },
  mounted() {
    this.createChart()
  }
}