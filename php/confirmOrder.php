<?php
require_once 'firebase_init.php';
require_once 'notification_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $orderId = $data['orderId'] ?? null;

    if ($orderId) {
        try {
            confirm($orderId); // Calls your PHP confirm function
            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid order ID']);
    }
}
?>
