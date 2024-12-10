<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    // التحقق من الزر الذي تم الضغط عليه
    if ($action == 'facebook') {
        // إذا تم الضغط على زر فيسبوك
        header("Location: https://www.facebook.com");
        exit();
    } elseif ($action == 'gmail') {
        // إذا تم الضغط على زر جيميل
        header("Location: https://mail.google.com");
        exit();
    } else {
        echo "إجراء غير معروف!";
    }
} else {
    echo "تم الوصول إلى الصفحة بطريقة غير صحيحة.";
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>صفحة بأزرار فيسبوك وجيميل</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            text-align: center;
            background-color: #2c1b1b;
            color: #fff;
            padding: 20px;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            background-color: #3b5998;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .facebook {
            background-color: #3b5998;
        }
        .facebook:hover {
            background-color: #061b47;
        }
        .gmail {
            background-color: #d44638;
        }
        .gmail:hover {
            background-color: #b23123;
        }
    </style>
</head>
<body>
    <h1>مرحبًا بك!</h1>
    <p>اختر أحد الخيارات التالية:</p>
    <form action="signin.php" method="POST">
        <button type="submit" name="action" value="facebook" class="button facebook">فيسبوك</button>
        <button type="submit" name="action" value="gmail" class="button gmail">جيميل</button>
        <a href="signup.php">Sign Up</a>
    </form>
</body>
</html>
