<?php
include "db.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];

    $update = $conn->prepare("UPDATE products SET product_name=?, product_category=?, product_price=?, product_quantity=? WHERE id=?");
    $update->bind_param("ssdii", $name, $category, $price, $quantity, $id);
    $update->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Edit Product</h1>
<form method="POST">
    <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>
    <input type="text" name="product_category" value="<?= htmlspecialchars($product['product_category']) ?>" required>
    <input type="number" step="0.01" name="product_price" value="<?= $product['product_price'] ?>" required>
    <input type="number" name="product_quantity" value="<?= $product['product_quantity'] ?>" required>
    <button type="submit" name="update">Update Product</button>
    <a href="index.php">Back to List</a>
</form>
</body>
</html>
