<?php
include("../config.php");
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$submitted = false; // Initialize a flag to indicate if the form is submitted

// Check if the category ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category_id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM categories WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: 1productCategory.php");
    exit;
}

// Handle the form submission and update the category
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST["category_name"];
    $category_id = $_POST["category_id"];

    try {
        $stmt = $conn->prepare("UPDATE categories SET category_name = :category_name WHERE category_id = :category_id");
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();

        // Set the submitted flag to true
        $submitted = true;
        header("Location: ../1productCategory.php");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <a onclick="window.location.href = '../1productCategory.php';" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Edit Category</label>
                            <input type="text" name="category_name" class="form-control"
                                value="<?php echo $category['category_name']; ?>" placeholder="enter updated category"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="modal-footer">
                            <a onclick="window.location.href = '../1productCategory.php';" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            <button  type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script> 
        // Wait for the page to load
        document.addEventListener("DOMContentLoaded", function () {
            // Get the modal element by ID
            const modal = document.getElementById("exampleModal");
            // Open the modal
            const modalInstance = new bootstrap.Modal(modal, {});
            modalInstance.show();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>









<!-- 
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Edit Category</h1>
    <form method="post" action="updateCategory.php"> 
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" id="category_name" >
        <button type="submit">Update Category</button>
    </form>
</body>
</html> -->