<h2>Create Product</h2>
<form action="../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required><br><br>
    
    Categories:<br>
    <input type="checkbox" name="categories[]" value="Electronics"> Electronics
    <input type="checkbox" name="categories[]" value="Fashion"> Fashion
    <input type="checkbox" name="categories[]" value="Books"> Books
    <br><br>

    Image: <input type="file" name="image"><br><br>
    Price: <input type="number" name="price" step="0.01" required><br><br>
    Stock: <input type="number" name="stock" required><br><br>
    
    <button type="submit" name="create">Create Product</button>
</form>
<a href="../index.php">Back to list</a>
