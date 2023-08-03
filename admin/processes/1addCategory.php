<?php
include("../config.php");
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST["category_name"];

    try {
        $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
        $stmt->bindParam(':category_name', $category_name);
        $stmt->execute();

        // Redirect back to productCategory.php after the addition
        header("Location: ../1productCategory.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>