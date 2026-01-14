<?php
$conn = mysqli_connect('localhost', 'root', '', 'products');
$id = $_GET['product_id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<style>
    body { background: #f8f9fa; }
    .container { margin-top: 50px; max-width: 600px; }
    .card { box-shadow: 0 0 15px rgba(0,0,0,0.1); }
</style>
</head>
<body>
<div class="container">
    <div class="card p-4">
        <h3 class="text-center mb-3">Edit Product</h3>
        <form method="post" action="editformsubmit.php">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <div class="form-group mb-3">
                <label>Product Name</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $data['product_name'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label>Product Category</label>
                <input type="text" class="form-control" name="product_category" value="<?php echo $data['product_category'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label>Product Price</label>
                <input type="number" step="0.01" class="form-control" name="product_price" value="<?php echo $data['product_price'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label>Product Quantity</label>
                <input type="number" class="form-control" name="product_quantity" value="<?php echo $data['product_quantity'] ?>" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Update Product">
            </div>
        </form>
    </div>
</div>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
