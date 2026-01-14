<?php
include "db.php";

$result = $conn->prepare("SELECT * FROM products");
$result->execute();
$data = $result->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Product List</h1>
<a class="add-btn" href="create.php">+ Add Product</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price ($)</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['product_name']) ?></td>
        <td><?= htmlspecialchars($row['product_category']) ?></td>
        <td><?= $row['product_price'] ?></td>
        <td><?= $row['product_quantity'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
