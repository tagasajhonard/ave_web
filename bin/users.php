<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul id="userList"></ul>

    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCMTIQkR66Zz-ENPofBTkuxg-J1oRpaCf4",
            authDomain: "avenue-t-house.firebaseapp.com",
            databaseURL: "https://avenue-t-house-default-rtdb.firebaseio.com",
            projectId: "avenue-t-house",
            storageBucket: "avenue-t-house.appspot.com",
            messagingSenderId: "928838424164",
            appId: "1:928838424164:web:15702786dd617a1bf57171",
            measurementId: "G-SS7ZB7REHH"
        };

        firebase.initializeApp(firebaseConfig);
        const database = firebase.database();
        const messagesRef = database.ref('messages');

        // Function to fetch users from Firebase and display in the HTML
        function displayUsers() {
            const userList = document.getElementById('userList');

            // Clear previous user list
            userList.innerHTML = '';

            // Fetch users from Firebase
            messagesRef.once('value', (snapshot) => {
                snapshot.forEach((userSnapshot) => {
                    const user = userSnapshot.key;
                    const listItem = document.createElement('li');
                    listItem.textContent = user;
                    userList.appendChild(listItem);
                });
            });
        }

        // Call the displayUsers function when the page loads
        window.onload = function() {
            displayUsers();
        };
    </script>
</body>
</html>
