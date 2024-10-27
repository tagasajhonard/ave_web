<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>chart</title>
</head>
<style type="text/css">
    .container {
            display: flex;

        }

        .chart {
            width: 100%;
            height: 100%;
        }

/*        canvas {
            width: 50% !important;
            height: 50% !important;
        }*/
</style>
<body>
	<div class="container">
		<div class="chart">
			<canvas id="dougnutChart" width="300px" height="300px"></canvas>
		</div>
        <div class="chart">
            <canvas id="barChart" width="300px" height="300px"></canvas>
        </div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<script>
	  const firebaseConfig = {
  apiKey: "AIzaSyCMTIQkR66Zz-ENPofBTkuxg-J1oRpaCf4",
  authDomain: "avenue-t-house.firebaseapp.com",
  databaseURL: "https://avenue-t-house-default-rtdb.firebaseio.com",
  projectId: "avenue-t-house",
  storageBucket: "avenue-t-house.appspot.com",
  messagingSenderId: "928838424164",
  appId: "1:928838424164:web:2c289e01a7744d8df57171",
  measurementId: "G-GMMWS6J7ED"
};

        firebase.initializeApp(firebaseConfig);
        
        const database = firebase.database();



</script>
<script src="dougnut.js"></script>
<script src="bar.js"></script>
</html>