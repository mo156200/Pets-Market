<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the item key from the AJAX request
    $data = json_decode(file_get_contents('php://input'), true);
    $itemKey = $data['itemKey'];

    if (isset($_SESSION['cart'][$itemKey])) {
        // Remove the item from the session cart
        unset($_SESSION['cart'][$itemKey]);
        // Reindex the cart array to avoid gaps in keys
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        echo json_encode(['message' => 'Item removed from cart']);
    } else {
        echo json_encode(['message' => 'Item not found in cart']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}
