<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        #login-button, #timer, #qr-code {
            margin: 20px;
        }
        #qr-code {
            display: none; /* Initially hide the QR code */
            
        }
        #login-status {
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>
</head>
<body>

    <h1>Login Page</h1>

    <!-- Login button to start QR code login -->
    <button id="login-button">Login Using QR Code</button>

    <!-- QR code section (can be an image or custom solution) -->
    <div id="qr-code">
        <p>Scan the qr code of your ID</p>
        
    </div>

    <!-- Timer display -->
    <div id="timer">Time remaining: <span id="time-left">60</span> seconds</div>

    <!-- Status message -->
    <div id="login-status"></div>

    <script type="module">
        // Firebase configuration
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

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const db = firebase.database();

        // DOM elements
        const loginButton = document.getElementById('login-button');
        const timerElement = document.getElementById('time-left');
        const qrCodeElement = document.getElementById('qr-code');
        const loginStatusElement = document.getElementById('login-status');

        let sessionId, timer, countdown;

        // Function to start the login process
        loginButton.addEventListener('click', startLoginProcess);

        function startLoginProcess() {
    sessionId = Math.random().toString(36).substring(2); // Unique session ID
    const loginRef = db.ref('loginSessions/' + sessionId);

    // Get the current date and time
    const now = new Date();
    const timestamp = Date.now(); // Unix timestamp in milliseconds
    const readableDateTime = now.toLocaleString(); // Human-readable date and time format

    // Create session entry in Firebase
    loginRef.set({
        timestamp: timestamp,  // Store the Unix timestamp
        readableDateTime: readableDateTime,  // Store human-readable date and time
        status: 'pending'
    });

    // Show the QR code
    qrCodeElement.style.display = 'block';

    // Start the timer
    startTimer(60); // 60 seconds countdown

    // Listen for updates from Firebase (when scanned by the app)
    loginRef.on('value', (snapshot) => {
        const data = snapshot.val();
        if (data && data.status === 'verified') {
            loginStatusElement.textContent = `Are you ${data.adminName}?`;
            if (confirm(`Are you ${data.adminName}?`)) {
                loginStatusElement.textContent = 'Login successful!';
                loginRef.remove(); // Remove session after confirmation
            } else {
                loginStatusElement.textContent = 'Login rejected.';
                loginRef.remove(); // Remove session if rejected
            }
        }
    });
}


function handleScan(data) {
        const now = new Date();
        const scannedTime = now.toLocaleString(); // Get current time when scanned
        const scannedTimestamp = Date.now(); // Get Unix timestamp when scanned

        // Get the session's data from Firebase
        const loginRef = db.ref('loginSessions/' + sessionId);
        loginRef.once('value', (snapshot) => {
            const sessionData = snapshot.val();
            if (sessionData) {
                const sessionCreationTime = sessionData.timestamp;

                // Check if the scan is within 1 minute (60000 ms)
                if (scannedTimestamp - sessionCreationTime <= 60000) {
                    // Parse scanned data (assuming it contains name and position)
                    const scannedDetails = JSON.parse(data); // Assuming `data` is a JSON string
                    const name = scannedDetails.name;
                    const position = scannedDetails.position;

                    // Update the session with scanned details
                    loginRef.update({
                        scannedTime: scannedTime,
                        name: name,
                        position: position,
                        status: 'active'
                    });

                    loginStatusElement.textContent = 'Scan successful! Session updated.';
                } else {
                    loginStatusElement.textContent = 'Scan failed: Session expired.';
                }
            }
        });
    }

        // Timer function
        function startTimer(seconds) {
            countdown = seconds;
            timer = setInterval(() => {
                countdown--;
                timerElement.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(timer);
                    loginStatusElement.textContent = "Login timed out. Please try again.";
                    qrCodeElement.style.display = 'none'; // Hide QR code
                }
            }, 1000);
        }
    </script>

</body>

</html>
