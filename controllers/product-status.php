<?php
include '../config/db.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $currentStatus = $_GET['status'];

    // Toggle logic
    $newStatus = ($currentStatus === 'active') ? 'inactive' : 'active';

    $sql = "UPDATE products SET status = '$newStatus' WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error updating status: " . $conn->error;
    }
}
?>
