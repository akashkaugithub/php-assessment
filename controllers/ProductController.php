<?php
include '../config/db.php';

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $categories = implode(", ", $_POST['categories']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    
    // Image upload
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $sql = "INSERT INTO products (name, categories, image, price, stock)
            VALUES ('$name', '$categories', '$image', '$price', '$stock')";
    
    if ($conn->query($sql)) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE products SET is_trashed = 1 WHERE id = $id";
    $conn->query($sql);
    header("Location: ../index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $categories = implode(", ", $_POST['categories']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET name='$name', categories='$categories', price='$price', stock='$stock' WHERE id = $id";
    $conn->query($sql);
    header("Location: ../index.php");
}

?>
