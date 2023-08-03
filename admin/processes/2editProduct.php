<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

 include("../config.php"); 
 include("./1getCategory.php"); 
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = null;
} else {
    header("Location: index.php"); 
    exit;
}

// Close the database connection
$conn = null;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

  <div class="container mt-10 w-50">
        <h2 class="mt-5">Edit Product</h2>
        <form action="./2updateProduct.php" method="post" enctype="multipart/form-data">
            <!-- Add a hidden input field to store the product ID -->
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

            <div class="form-group mt-5">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="100" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category ID</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <?php foreach ($result as $row): ?>
                        <option value='<?php echo $row['category_id']; ?>' <?php if ($row['category_id'] === $product['category_id']) echo "selected"; ?>><?php echo $row['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Update</button>
        </form>
    </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>