<?php
include 'config/db.php';
?>

<form method="GET">
    <input type="text" name="search" placeholder="Search product..." value="<?= $_GET['search'] ?? '' ?>">
    <select name="status">
        <option value="">All Status</option>
        <option value="active" <?= (($_GET['status'] ?? '') == 'active') ? 'selected' : '' ?>>Active</option>
        <option value="inactive" <?= (($_GET['status'] ?? '') == 'inactive') ? 'selected' : '' ?>>Inactive</option>
    </select>
    <button type="submit">Filter</button>
</form>


<h2>All Products</h2>
<a href="views/create.php">+ Add Product</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Categories</th>
        <th>Image</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
  $where = "WHERE is_trashed = 0";

// Search by name
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $where .= " AND name LIKE '%$search%'";
}

// Filter by status
if (!empty($_GET['status'])) {
    $status = $_GET['status'];
    $where .= " AND status = '$status'";
}

// Final query
$sql = "SELECT * FROM products $where";
$result = $conn->query($sql);

    
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['categories']}</td>";
    echo "<td><img src='uploads/{$row['image']}' width='60'></td>";
    echo "<td>{$row['price']}</td>";
    echo "<td>{$row['stock']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "<td>
        <a href='views/edit.php?id={$row['id']}'>Edit</a> | 
        <a href='controllers/ProductController.php?delete={$row['id']}'>Trash</a> | 
        <a href='controllers/product-status.php?id={$row['id']}&status={$row['status']}'>
            " . ($row['status'] === 'active' ? 'Deactivate' : 'Activate') . "
        </a>
    </td>";
    echo "</tr>";
}
    ?>
</table>