<?php
include "db.php";

if (isset($_POST['submit'])) {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];

    $stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_price, product_quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $name, $category, $price, $quantity);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Add Product</h1>
<form method="POST">
    <input type="text" name="product_name" placeholder="Product Name" required>
    <input type="text" name="product_category" placeholder="Category" required>
    <input type="number" step="0.01" name="product_price" placeholder="Price" required>
    <input type="number" name="product_quantity" placeholder="Quantity" required>
    <button type="submit" name="submit">Add Product</button>
    <a href="index.php">Back to List</a>
</form>
</body>
</html>
