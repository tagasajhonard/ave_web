<?php
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;

function sendNotificationToUser($fcmToken, $notificationData, $messaging, $database) {
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

        $messaging->send($message);
    } catch (MessagingException $e) {
        if (
            $e->getCode() === 'messaging/invalid-registration-token' ||
            $e->getCode() === 'messaging/not-found'
        ) {
            removeInvalidFcmToken($fcmToken, $database);
        } else {
            throw new Exception('FCM Send Error: ' . $e->getMessage());
        }
    }
}

function removeInvalidFcmToken($fcmToken, $database) {
    $userId = getUserIdFromToken($fcmToken, $database);
    if ($userId) {
        $userReference = $database->getReference("users/{$userId}");
        $userReference->update([
            'fcmToken' => null,
        ]);
    }
}

function getUserIdFromToken($fcmToken, $database) {
    $users = $database->getReference('users')->getValue();
    foreach ($users as $userId => $user) {
        if (isset($user['fcmToken']) && $user['fcmToken'] === $fcmToken) {
            return $userId;
        }
    }
    return null;
}
?>