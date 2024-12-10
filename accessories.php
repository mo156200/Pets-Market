<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'pets_market');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch accessories from the database
$accessories = $conn->query("SELECT * FROM accessories");

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories Market</title>
    <link rel="stylesheet" href="accessories.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
    <h1>Accessories Market</h1>
    <nav>
        <a href="pets_market.php">Home</a>
        <a href="cart.php" class="cart-btn">
            Cart 
            <span class="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
        </a>
        <a href="sell_accessory.php" class="sell-accessory-btn">Sell Accessories</a>
    </nav>
</header>

<div class="accessories-container">
    <?php if ($accessories && $accessories->num_rows > 0): ?>
        <?php while ($accessory = $accessories->fetch_assoc()): ?>
            <div class="accessory-card">
                <img src="<?php echo $accessory['image']; ?>" alt="<?php echo $accessory['name']; ?>" class="accessory-image">
                <div class="info">
                    <h3><?php echo htmlspecialchars($accessory['name']); ?></h3>
                    <p>Category: <?php echo htmlspecialchars($accessory['category']); ?></p>
                    <p>Price: EGP<?php echo htmlspecialchars($accessory['price']); ?></p>
                    <p>Description: <?php echo htmlspecialchars($accessory['description']); ?></p>
                    <button class="add-to-cart" 
                            data-id="<?php echo htmlspecialchars($accessory['id']); ?>" 
                            data-name="<?php echo htmlspecialchars($accessory['name']); ?>" 
                            data-price="<?php echo htmlspecialchars($accessory['price']); ?>"
                            data-image="<?php echo htmlspecialchars($accessory['image']); ?>">
                        Add to Cart
                    </button>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No accessories available at the moment.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var productId = $(this).data('id');
        var productName = $(this).data('name');
        var productPrice = $(this).data('price');
        var productImage = $(this).data('image');

        // Sending data to add_to_cart.php
        $.ajax({
            url: 'add_to_cart.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage
            }),
            success: function(response) {
                var result = JSON.parse(response);
                alert(result.message);

                // Update cart count dynamically
                if (result.message === 'Item added to cart') {
                    let cartCount = $('.cart-count').text();
                    $('.cart-count').text(parseInt(cartCount) + 1);
                }
            }
        });
    });
});
</script>
</body>
</html>
