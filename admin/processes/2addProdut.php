<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include("../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category_id = $_POST["category_id"];
    $picture_1 = $_FILES["picture_1"]["name"];
    $picture_2 = $_FILES["picture_2"]["name"];
    $picture_3 = $_FILES["picture_3"]["name"];

    // Prepare and execute the SQL query to insert the product data into the database
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, category_id, picture_1, picture_2, picture_3)
                            VALUES (:product_name, :description, :price, :category_id, :picture_1, :picture_2, :picture_3)");
    $stmt->bindParam(":product_name", $product_name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->bindParam(":picture_1", $picture_1);
    $stmt->bindParam(":picture_2", $picture_2);
    $stmt->bindParam(":picture_3", $picture_3);

    // Upload the product images to a directory on the server
    $target_dir = "../uploads/"; // Change this directory to the one where you want to store the images
    move_uploaded_file($_FILES["picture_1"]["tmp_name"], $target_dir . $picture_1);
    move_uploaded_file($_FILES["picture_2"]["tmp_name"], $target_dir . $picture_2);
    move_uploaded_file($_FILES["picture_3"]["tmp_name"], $target_dir . $picture_3);

    // Execute the query and check for success
    if ($stmt->execute()) {
        // Insertion successful
        echo "Product inserted successfully.";
        header("Location: ../1allProducts.php");

    } else {
        // Insertion failed
        echo "Error inserting product: " . $stmt->errorInfo()[2];
    }

    // Close the statement and database connection
    $stmt = null;
    $conn = null;
}
?>
