<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $age = intval($_POST['age']);
    $price = floatval($_POST['price']);
    $description = $_POST['description'];

    // File upload handling
    $target_dir = "uploads/";
    $image = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $image; // Ensure unique filenames
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    if (isset($_FILES["image"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size (limit: 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow specific file formats
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Attempt upload
    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'pets_market');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepared statement to insert pet data
        $stmt = $conn->prepare("INSERT INTO pets (user_id, name, type, age, price, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issidss", $_SESSION['user_id'], $name, $type, $age, $price, $description, $target_file);

        if ($stmt->execute()) {
            header("Location: pets_market.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Failed to upload the image.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Pet</title>
    <link rel="stylesheet" href="add_pet.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <form method="POST" action="add_pet.php" enctype="multipart/form-data">
        <h2>Add Pet</h2>
        <input type="text" name="name" placeholder="Pet Name" required>
        <input type="text" name="type" placeholder="Type (e.g., Dog, Cat)" required>
        <input type="number" name="age" placeholder="Age (in years)" required>
        <input type="number" name="price" placeholder="Price " step="0.01" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Add Pet</button>
    </form>
</body>
</html>
