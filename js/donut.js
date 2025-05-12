const refer = firebase.database().ref('BestSeller');
refer.on('value', (snapshot) => {
  const topSellingData = snapshot.val();
  if (!topSellingData) return;

  // Convert object to array and sort by quantity descending
  const sortedItems = Object.entries(topSellingData)
    .sort(([, a], [, b]) => b.quantity - a.quantity)
    .slice(0, 5); // Get top 5 items

  const labels = sortedItems.map(([key]) => key);
  const data = sortedItems.map(([, value]) => value.quantity);

  // Destroy old chart if it exists
  if (window.doughnutChart) {
    window.doughnutChart.destroy();
  }

  const ctxDoughnut = document.getElementById('dougnutChart').getContext('2d');

  window.doughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
      labels: labels,
      datasets: [{
        label: 'Sales Summary',
        data: data,
        backgroundColor: ['#36A2EB', '#FF6384', '#FF9F40', '#FFCE56', '#4BC0C0', '#9966FF'],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          labels: {
            font: {
              family: 'Poppins-Regular',
              size: 10
            }
          }
        }
      },
      title: {
        display: true,
        text: 'Top 5 Selling Products',
        font: {
          family: 'Poppins-Regular',
          size: 18
        }
      }
    }
  });
});
