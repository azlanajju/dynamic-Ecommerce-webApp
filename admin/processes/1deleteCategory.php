<?php
include("../config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category_id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        header("Location: ../1productCategory.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../1productCategory.php");
    exit;
}
?>
