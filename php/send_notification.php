<?php
require_once 'firebase_init.php';
require_once 'notification_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $fcmToken = $data['fcmToken'] ?? null;
    $notificationData = $data['notificationData'] ?? null;

    if ($fcmToken && $notificationData) {
        try {
            sendNotificationToUser($fcmToken, $notificationData, $messaging, $database);
            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    }
}
?>