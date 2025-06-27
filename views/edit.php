<?php
include '../config/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();
?>

<form action="../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    Name: <input type="text" name="name" value="<?= $product['name'] ?>"><br><br>

    Categories:<br>
    <input type="checkbox" name="categories[]" value="Electronics" <?= strpos($product['categories'], 'Electronics') !== false ? 'checked' : '' ?>> Electronics
    <input type="checkbox" name="categories[]" value="Fashion" <?= strpos($product['categories'], 'Fashion') !== false ? 'checked' : '' ?>> Fashion
    <input type="checkbox" name="categories[]" value="Books" <?= strpos($product['categories'], 'Books') !== false ? 'checked' : '' ?>> Books
    <br><br>

    Price: <input type="number" name="price" step="0.01" value="<?= $product['price'] ?>"><br><br>
    Stock: <input type="number" name="stock" value="<?= $product['stock'] ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>
