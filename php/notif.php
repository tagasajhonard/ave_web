<?php

public function sendNotificationToUser($fcmToken, $notificationData)
    {

        try {


            $message = CloudMessage::withTarget('token', $fcmToken)
                ->withNotification([
                    'title' => $notificationData['title'],
                    'body' => $notificationData['body'],
                    'sound' => 'default',
                ])
                ->withData([
                    'orderId' => $notificationData['orderId'],
                ]);


            $this->messaging->send($message);
        } catch (\Kreait\Firebase\Exception\MessagingException $e) {

            if (
                $e->getCode() === 'messaging/invalid-registration-token' ||
                $e->getCode() === 'messaging/not-found'
            ) {

                $this->removeInvalidFcmToken($fcmToken);
            } else {
                throw new \Exception('FCM Send Error: ' . $e->getMessage());
            }
        }
    }

    private function removeInvalidFcmToken($fcmToken)
    {

        $userId = $this->getUserIdFromToken($fcmToken);
        if ($userId) {
            $userReference = $this->database->getReference("users/{$userId}");
            $userReference->update([
                'fcmToken' => null
            ]);
        }
    }

    private function getUserIdFromToken($fcmToken)
    {

        $users = $this->database->getReference('users')->getValue();

        foreach ($users as $userId => $user) {
            if (isset($user['fcmToken']) && $user['fcmToken'] === $fcmToken) {
                return $userId;
            }
        }

        return null;
    }




public function confirmOrder(Request $request, $orderId)
    {
        $ordersRef = $this->firebaseService->getDatabase()->getReference('orders/' . $orderId);
        $orderDetails = $ordersRef->getValue();

        if ($orderDetails) {
            $ordersRef->update(['status' => 'confirmed']);

            $userId = $orderDetails['userId'];
            $userRef = $this->firebaseService->getDatabase()->getReference('users/' . $userId);
            $userData = $userRef->getValue();

            if ($userData) {
                $fcmToken = $userData['fcmToken'];

                $notificationData = [
                    'title' => 'Order Confirmed',
                    'body' => 'Your order #' . $orderId . ' has been confirmed!',
                    'orderId' => $orderId,
                ];

                $this->firebaseService->sendNotificationToUser($fcmToken, $notificationData);
            }

            return redirect()->route('pending_orders.paginated')->with('success', 'Order confirmed successfully!');
        }

        return redirect()->route('pending_orders.paginated')->with('error', 'Order not found!');
    }
    
    ?>


