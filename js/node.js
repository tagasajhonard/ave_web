const express = require('express');
const bodyParser = require('body-parser');
const admin = require('firebase-admin');
const app = express();
const port = 3000;

// Initialize Firebase Admin SDK
const serviceAccount = require('T:\Downloads\avenue-t-house-firebase-adminsdk-5j6hr-b57c67fc24.json');
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

app.use(bodyParser.json());

// API to send FCM notification
app.post('/send-notification', (req, res) => {
  const { fcmToken, orderId } = req.body;

  const message = {
    token: fcmToken,
    notification: {
      title: 'Order Accepted',
      body: `Your order ${orderId} has been accepted!`,
    },
  };

  admin.messaging().send(message)
    .then((response) => {
      console.log('Successfully sent message:', response);
      res.status(200).send({ success: true });
    })
    .catch((error) => {
      console.error('Error sending message:', error);
      res.status(500).send({ success: false, error });
    });
});

app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
