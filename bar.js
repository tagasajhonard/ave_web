const ctxBar = document.getElementById('barChart').getContext('2d');

const barChart = new Chart(ctxBar, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Sales Summary',
      data: [100, 190, 30, 50, 90, 30, 200, 240, 190, 170, 100, 50],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
