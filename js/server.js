const express = require("express");
const bodyParser = require("body-parser");
const admin = require("firebase-admin");
const cors = require("cors");

const app = express();
app.use(cors()); // Enable CORS
app.use(bodyParser.json()); // Parse JSON body

// Initialize Firebase Admin SDK
const serviceAccount = require("./path/to/serviceAccount.json");
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://your-database.firebaseio.com",
});

// Send Notification Function
app.post("/confirmOrder", async (req, res) => {
  const { orderId, fcmToken, notificationData } = req.body;

  if (!fcmToken || !notificationData || !orderId) {
    return res.status(400).json({ success: false, message: "Invalid data" });
  }

  try {
    const message = {
      token: fcmToken,
      notification: {
        title: notificationData.title,
        body: notificationData.body,
      },
      data: {
        orderId: orderId,
      },
    };

    // Send FCM Notification
    await admin.messaging().send(message);

    // Update Firebase Database (optional)
    const db = admin.database();
    const orderRef = db.ref(`Orders/${orderId}`);
    await orderRef.update({ status: "accepted", acceptedTime: new Date().toISOString() });

    return res.json({ success: true, message: "Notification sent and order updated" });
  } catch (error) {
    console.error("Error sending notification:", error);
    return res.status(500).json({ success: false, message: "Internal Server Error" });
  }
});

// Start the server
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
