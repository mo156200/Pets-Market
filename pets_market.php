<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'pets_market');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pets from the database
$pets = $conn->query("SELECT * FROM pets");

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Market</title>
    <link rel="stylesheet" href="pets_market.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
    <h1>Welcome to Pets Market</h1>
    <nav>
        <a href="cart.php" class="cart-btn">
            Cart 
            <span class="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
        </a>
        <a href="add_pet.php" class="add-pet-btn">Add Pet</a>
        <a href="accessories.php" class="accessories-btn">Shop Accessories</a> <!-- زر بيع الاكسسوارات -->
    </nav>
</header>


<div class="pets-container">
    <?php while ($pet = $pets->fetch_assoc()) { ?>
        <div class="pet-card">
            <img src="<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>" class="pet-image">
            <div class="info">
                <h3><?php echo $pet['name']; ?></h3>
                <p>Type: <?php echo $pet['type']; ?></p>
                <p>Age: <?php echo $pet['age']; ?> years</p>
                <p>Price: EGP<?php echo $pet['price']; ?></p>
                <p>Description: <?php echo $pet['description']; ?></p>
                <button class="buy-button" onclick="addToCart(<?php echo htmlspecialchars(json_encode($pet)); ?>)">Add to Cart</button>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function addToCart(pet) {
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(pet),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            updateCartCount();
        })
        .catch(error => console.error('Error:', error));
    }

    function updateCartCount() {
        fetch('get_cart_count.php')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.cart-count').innerText = data.cartCount;
            });
    }

    // Update the cart count on page load
    updateCartCount();
</script>
</body>
</html>
