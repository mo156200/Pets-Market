<?php
session_start();

// Check if the cart contains items
if (empty($_SESSION['cart'])) {
    $message = "Your cart is empty.";
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart_style.css">
</head>
<body>

<header class="header">
    <h1>Your Shopping Cart</h1>
    <nav>
        <a href="pets_market.php" class="continue-shopping-btn">Continue Shopping</a>
    </nav>
</header>

<?php if ($message): ?>
    <p class="cart-message"><?php echo $message; ?></p>
<?php endif; ?>

<div class="cart-container">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $item): 
                    $itemTotal = $item['price'];
                    $total += $itemTotal;
                ?>
                    <tr>
                        <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="cart-image"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td>EGP<?php echo $item['price']; ?></td>
                        <td>EGP<?php echo number_format($itemTotal, 2); ?></td>
                        <td><button class="remove-button" onclick="removeFromCart('<?php echo $key; ?>')">Remove</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <p><strong>Total Price:</strong> EGP <?php echo number_format($total, 2); ?></p>
            <button class="checkout-button">Proceed to Checkout</button>
        </div>
    <?php endif; ?>
</div>

<script>
    function removeFromCart(itemKey) {
        fetch('remove_from_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ itemKey: itemKey }) // Send the key of the item to remove
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Show success or error message
            location.reload(); // Reload the page to update the cart
        })
        .catch(error => console.error('Error:', error));
    }
</script>


</body>
</html>
