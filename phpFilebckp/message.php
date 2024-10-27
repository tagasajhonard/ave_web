<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="image/webicon.png">
<title>Messenger Clone</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .holder{
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .container {
        background-color: white;
        padding: 10px;
        display: flex;
        width: 80%;
        height: 80vh;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    * {
        box-sizing: border-box;
    }

    .users-container {
        flex: 0 0 auto;
        border-radius: 10px;
        width: 25%;
        box-shadow: 2px 2px 12px gray;
        padding: 10px;
        padding-right: 20px;
    }

    .chat-container {
        margin-left: 10px;
        border-radius: 10px;
        width: 75%;
        box-shadow: 2px 2px 12px gray;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    .user {
        margin-bottom: 10px;
        padding: 10px;
        cursor: pointer;
        border-radius: 5px;
        background-color: #f0f0f0;
    }

    .user.active {
        background-color: #007bff;
        color: #fff;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 40px;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .message {
        margin-bottom: 10px;
    }

    .message.admin {
        text-align: right;
        background-color: #007bff;
        color: #fff;
        border-radius: 10px;
        padding: 5px 10px;
        margin-right: 10px;
    }

    .message.user {
        text-align: left;
        background-color: #f0f0f0;
        border-radius: 10px;
        padding: 5px 10px;
        margin-left: 10px;
    }

    .chat-input {
        z-index: 2;
        right: 0;
        display: flex;
        align-items: center;
        padding: 10px;
        border-top: 1px solid #ccc;
        background-color: #fff; 
    }

    .chat-input input[type="text"] {
        flex: 1;
        padding: 8px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
    }

    .chat-input button {
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        box-sizing: border-box;
        width: auto;
    }
</style>
</head>
<body>
<div class="holder">
    <div class="container">
    <div class="users-container" id="usersContainer">
        <!-- Active users will be displayed here -->
    </div>
    <div class="chat-container">

        <div class="chat-messages" id="messages">
            <!-- chat will display here -->
        </div>
        <div class="chat-input">
            <input type="text" id="messageInput" placeholder="Type a message">
            <button id="sendButton">Send</button>
        </div>

    </div>
    <div id="currentUserNode" style="display: none;"></div>
</div>
</div>


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


   function displayUsersFromFirebase() {
            const usersContainer = document.getElementById('usersContainer');
            usersContainer.innerHTML = '';

            messagesRef.once('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    const user = childSnapshot.key;
                    const userDiv = document.createElement('div');
                    userDiv.classList.add('user');
                    userDiv.textContent = user;
                    userDiv.addEventListener('click', () => {
                        document.getElementById('messages').innerHTML = '';
                        displayMessagesForUser(user);
                        document.querySelectorAll('.user').forEach(userDiv => userDiv.classList.remove('active'));
                        userDiv.classList.add('active');
                        document.getElementById('currentUserNode').textContent = user;
                    });
                    usersContainer.appendChild(userDiv);
                });
            });
        }

function displayMessagesForUser(user) {
    const messagesDiv = document.getElementById('messages');
    messagesDiv.innerHTML = '';

    // Listen for new messages being added
    messagesRef.child(user).on('child_added', (messageSnapshot) => {
        const messageId = messageSnapshot.key;
        const messageData = messageSnapshot.val();
        const sender = messageData.sender;
        const text = messageData.text;
        const timestamp = messageData.timestamp;

        // Display each message
        displayMessage(text, sender);
    });
}

function displayMessage(text, sender) {
    const messagesDiv = document.getElementById('messages');
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message');
    messageDiv.classList.add(sender === 'Admin' ? 'admin' : 'user');
    messageDiv.textContent = text;
    messagesDiv.appendChild(messageDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}




 

document.getElementById('sendButton').addEventListener('click', () => {
    const messageInput = document.getElementById('messageInput');
    const text = messageInput.value;
    const currentUserNode = document.getElementById('currentUserNode').textContent;

    if (text !== '') {
        const now = new Date();
        const formattedTime = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const formattedDate = now.toLocaleDateString([], { year: 'numeric', month: '2-digit', day: '2-digit' });

        const message = {
            text: text,
            sender: 'Admin',
            timestamp: now.getTime(),
            formattedTime: `${formattedTime}, ${formattedDate}`
        };

        messagesRef.child(currentUserNode).push().set(message);
        messageInput.value = '';
    }
});



displayUsersFromFirebase();
</script>
</body>
</html>
