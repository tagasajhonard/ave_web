const functions = require('firebase-functions');
const admin = require('firebase-admin');
admin.initializeApp();

exports.sendOrderAcceptedNotification = functions.database.ref('/Orders/{userFullName}/{orderId}/orderStatus')
    .onUpdate((change, context) => {
        const userFullName = context.params.userFullName;
        const orderId = context.params.orderId;

        // Get the user's FCM token
        return admin.database().ref(`/UserTokens/${userFullName}`).once('value')
            .then(snapshot => {
                const userFCMToken = snapshot.val();

                // Construct the notification message
                const message = {
                    notification: {
                        title: 'Order Accepted',
                        body: 'Your order is being prepared by Avenue Tea House...'
                    },
                    token: userFCMToken
                };

                // Send the notification
                return admin.messaging().send(message);
            })
            .catch(error => {
                console.error('Error sending notification:', error);
            });
    });
