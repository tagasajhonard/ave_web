<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Chat Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #messages {
            border: 1px solid #ccc;
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
            margin-bottom: 10px;
        }
        .message {
            padding: 5px;
            margin-bottom: 5px;
        }
        .message.admin {
            text-align: right;
            background-color: #e0e0e0;
        }
        .message.user {
            text-align: left;
            background-color: #f0f0f0;
        }
        #messageInput {
            width: 80%;
            padding: 10px;
        }
        #sendButton {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Admin Chat Interface</h1>
    <div id="messages"></div>
    <input type="text" id="messageInput" placeholder="Type a message">
    <button id="sendButton">Send</button>

    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

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

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        const database = firebase.database();
        const messagesRef = database.ref('messages');

        // Function to display messages
        function displayMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message');
            messageDiv.classList.add(sender === 'admin' ? 'admin' : 'user');
            messageDiv.textContent = text;
            document.getElementById('messages').appendChild(messageDiv);
            // Scroll to the bottom of the messages div
            document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
        }

        // Listen for new messages from all users
        messagesRef.on('child_added', (snapshot) => {
            const userMessagesRef = snapshot.ref;
            userMessagesRef.on('child_added', (childSnapshot) => {
                const message = childSnapshot.val();
                displayMessage(message.text, message.sender);
            });
        });

        // Send message
       document.getElementById('sendButton').addEventListener('click', () => {
    const messageInput = document.getElementById('messageInput');
    const text = messageInput.value;
    if (text.trim() !== '') {
        const now = new Date();
        const formattedTime = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const formattedDate = now.toLocaleDateString([], { year: 'numeric', month: '2-digit', day: '2-digit' });

        // Get current user's node name dynamically
        const currentUserNode = document.getElementById('currentUserNode').textContent;

        const message = {
            text: text,
            sender: 'Admin',
            timestamp: now.getTime(),
            formattedTime: `${formattedTime}, ${formattedDate}`
        };
        
        // Save message under the current user's node
        messagesRef.child(currentUserNode).child('Admin').push().set(message);
        messageInput.value = '';
    }
});


    </script>
</body>
</html>
