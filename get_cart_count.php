<?php
session_start();

// Get the cart count
$cartCount = count($_SESSION['cart']);

echo json_encode(['cartCount' => $cartCount]);
?>
