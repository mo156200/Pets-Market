<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Decode the JSON payload
$item = json_decode(file_get_contents('php://input'), true);

if ($item) {
    // Check if the item is already in the cart
    foreach ($_SESSION['cart'] as $cartItem) {
        if ($cartItem['id'] == $item['id']) {
            echo json_encode(['message' => 'Item already in cart']);
            exit;
        }
    }

    // Add the item to the cart
    $_SESSION['cart'][] = $item;
    echo json_encode(['message' => 'Item added to cart']);
} else {
    echo json_encode(['message' => 'Invalid item']);
}
?>
