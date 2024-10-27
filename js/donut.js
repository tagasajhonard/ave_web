const refer = firebase.database().ref('TopSelling');
refer.once('value').then((snapshot) => {
  const topSellingData = snapshot.val();

  // Extract labels and data from Firebase object
  const labels = Object.keys(topSellingData);
  const data = Object.values(topSellingData);

  const ctxDoughnut = document.getElementById('dougnutChart').getContext('2d');

  const doughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
      labels: labels, // Use truncated labels for display on the chart
      datasets: [{
        label: 'Sales Summary',
        data: data, // Use data from Firebase
        backgroundColor: ['#36A2EB', '#FF6384', '#FF9F40', '#FFCE56', '#4BC0C0', '#9966FF'], // You can adjust this as needed
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          labels: {
            font: {
              family: 'Poppins-Regular', // Apply your custom font to legend labels
              size: 10
            }
          }
        },
     
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            font: {
              family: 'Poppins-Regular', // Apply font to y-axis labels
              size: 12
            }
          }
        }
      },
      title: {
        display: true,
        text: 'Top Selling Products',
        font: {
          family: 'Poppins-Regular', // Font for chart title
          size: 18
        }
      }
    }
  });
});