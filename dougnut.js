// Assuming you have initialized Firebase and have a reference to your database





// const dbRef = firebase.database().ref('TopSelling');

// dbRef.once('value').then((snapshot) => {
//   const topSellingData = snapshot.val();
  
//   // Extract labels and data from Firebase object
//   const labels = Object.keys(topSellingData);
//   const data = Object.values(topSellingData);

//   // Now we can update the chart configuration
//   const ctxDoughnut = document.getElementById('dougnutChart').getContext('2d');

//   const doughnutChart = new Chart(ctxDoughnut, {
//     type: 'doughnut',
//     data: {
//       labels: labels, // Use labels from Firebase data
//       datasets: [{
//         label: 'Sales Summary',
//         data: data, // Use data from Firebase
//         backgroundColor: ['#36A2EB', '#FF6384', '#FF9F40', '#FFCE56', '#4BC0C0', '#9966FF'], // You can adjust this as needed
//         borderWidth: 1
//       }]
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: true
//         }
//       }
//     }
//   });
// });
