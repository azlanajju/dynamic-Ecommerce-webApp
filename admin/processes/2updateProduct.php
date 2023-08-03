<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category_id = $_POST["category_id"];

    // Prepare and execute the SQL query to update the product data in the database
    $stmt = $conn->prepare("UPDATE products SET product_name = :product_name, description = :description, price = :price, category_id = :category_id WHERE product_id = :product_id");
    $stmt->bindParam(":product_name", $product_name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->bindParam(":product_id", $product_id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        // Update successful
        echo "Product updated successfully.";
        header("Location: ../1allProducts.php");

    } else {
        // Update failed
        echo "Error updating product: " . $stmt->errorInfo()[2];
    }

    // Close the statement and database connection
    $stmt = null;
    $conn = null;
}
?>
