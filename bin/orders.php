<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div id="ordersList"></div>
</body>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-messaging.js"></script>

<script>

        // Initialize Firebase
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
        const storage = firebase.storage();

        function displayOrders() {
    const ordersRef = database.ref("Orders");

    ordersRef.on("value", function(snapshot) {
        const orders = snapshot.val();
        const ordersList = document.getElementById("ordersList");

        ordersList.innerHTML = ""; 

        for (const userFullName in orders) {
            const userOrders = orders[userFullName];
            
            for (const orderId in userOrders) {
                const order = userOrders[orderId];
                const items = order.items;

                let itemsList = "<ul>";
                items.forEach(item => {
                    itemsList += `<li>${item.productName} - ${item.quantity} x ${item.productPrice} (${item.size})</li>`;
                });
                itemsList += "</ul>";

                const orderText = `<div>
                                    <p><strong>User: </strong>${order.fullName}</p>
                                    <p><strong>Order ID: </strong>${orderId}</p>
                                    <p><strong>Items: </strong>${itemsList}</p>
                                    <button onclick="acceptOrder('${userFullName}', '${orderId}')">Accept</button>
                                  </div>`;
                ordersList.innerHTML += orderText;
            }
        }
    });
}

        // Function to accept an order
        function acceptOrder(userFullName, orderId) {
    const orderRef = database.ref("Orders/" + userFullName + "/" + orderId);
    
    // Update the order status to "accepted"
    orderRef.update({
        orderStatus: "accepted"
    }).then(function() {
        alert("Order accepted!");
        
        // Send notification to the user
        sendNotificationToUser(userFullName, orderId);
    }).catch(function(error) {
        console.error("Error updating order status:", error);
    });
}

       function sendNotificationToUser(userFullName, orderId) {
    // Retrieve user's FCM token from the database based on the order ID
    const userFCMTokenRef = database.ref("UserTokens/" + userFullName);
    userFCMTokenRef.once("value", function(snapshot) {
        const userFCMToken = snapshot.val();
        
        // Construct the notification message
        const notificationMessage = {
            notification: {
                title: 'Order Accepted',
                body: 'Your order is being prepared by Avenue Tea House...'
            },
            token: userFCMToken
        };

        // Send the notification
        firebase.messaging().send(notificationMessage)
            .then((response) => {
                console.log('Notification sent successfully:', response);
            })
            .catch((error) => {
                console.error('Error sending notification:', error);
            });
    });
}

        // Call the function to display orders when the page loads
        displayOrders();

</script>
</html>