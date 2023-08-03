<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../config.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $product_id);

    if ($stmt->execute()) {
        echo "Product deleted successfully.";
        header("Location: ../1allProducts.php");

    } else {
        echo "Error deleting product: " . $stmt->errorInfo()[2];
    }

    $stmt = null;
    $conn = null;
} else {
    header("Location: ../1allProducts.php");
    exit;
}
?>
