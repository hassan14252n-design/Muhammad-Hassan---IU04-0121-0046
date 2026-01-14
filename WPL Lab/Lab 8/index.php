<?php
$conn = mysqli_connect('localhost', 'root', '', 'products');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    $query = "INSERT INTO products (product_name, product_category, product_price, product_quantity)
              VALUES ('$product_name', '$product_category', '$product_price', '$product_quantity')";
    mysqli_query($conn, $query);
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Management</title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<style>
body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
.container { background-color: #fff; padding: 20px 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-top: 30px; }
h1 { text-align: center; margin-bottom: 20px; color: #343a40; }
.form-group label { font-weight: 500; margin-bottom: 5px; }
.form-control { border-radius: 8px; padding: 10px; font-size: 14px; }
.btn-primary { border-radius: 8px; padding: 10px 20px; font-weight: 500; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
.table { background-color: #fff; border-radius: 12px; overflow: hidden; margin-top: 30px; }
.table th, .table td { text-align: center; vertical-align: middle; }
a.btn { margin: 0 5px; text-decoration: none; padding: 5px 12px; border-radius: 6px; }
</style>
</head>
<body>
<div class="container">
    <h1>Product Management</h1>
    <form method="post" action="">
        <div class="form-group mb-3">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Enter product name" required>
        </div>
        <div class="form-group mb-3">
            <label>Product Category</label>
            <input type="text" class="form-control" name="product_category" placeholder="Enter product category" required>
        </div>
        <div class="form-group mb-3">
            <label>Product Price</label>
            <input type="number" class="form-control" name="product_price" placeholder="Enter product price" required>
        </div>
        <div class="form-group mb-3">
            <label>Product Quantity</label>
            <input type="number" class="form-control" name="product_quantity" placeholder="Enter product quantity" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Add Product">
    </form>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['product_category']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_quantity']; ?></td>
                <td>
                    <a href="editform.php?product_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete.php?product_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
