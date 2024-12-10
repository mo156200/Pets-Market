<?php
session_start();

// Check if the user is logged in (Optional)
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form and insert the new accessory into the database
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image']; // Make sure you handle image uploads properly

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'pets_market');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert new accessory into the database
    $sql = "INSERT INTO accessories (name, category, price, description, image) VALUES ('$name', '$category', '$price', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New accessory added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Accessories</title>
    <link rel="stylesheet" href="sell_accessory.css">
</head>
<body>
    <header class="header">
        <h1>Sell Accessories</h1>
    </header>

    <div class="form-container">
        <form method="POST" action="sell_accessory.php" enctype="multipart/form-data">
            <label for="name">Accessory Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required><br>

            <label for="price">Price (EGP):</label>
            <input type="number" id="price" name="price" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>

            <input type="submit" value="Add Accessory">
        </form>
    </div>
</body>
</html>
