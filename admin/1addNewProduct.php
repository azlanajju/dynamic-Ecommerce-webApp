<?php include("./config.php"); ?>
<?php include("./processes/1getCategory.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./0components.css">

</head>

<body>

    <?php include("./navBar.php"); ?>
    <?php include("./sideBar.php"); ?>

    <div class="rightContainer">

        <div class="container mt-10 w-50">
            <h2 class="mt-5">Add Product</h2>
            <form action="./processes/2addProdut.php" method="post" enctype="multipart/form-data">
                <div class="form-group mt-5">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category ID</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <?php foreach ($result as $row): ?>
                            <option value='<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>


                </div>
                <div class="form-group mt-5">
                    <label for="picture_1">Picture 1</label>
                    <input type="file" class="form-control-file" id="picture_1" name="picture_1">
                </div>
                <div class="form-group  mt-3">
                    <label for="picture_2">Picture 2</label>
                    <input type="file" class="form-control-file" id="picture_2" name="picture_2">
                </div>
                <div class="form-group  mt-3">
                    <label for="picture_3">Picture 3</label>
                    <input type="file" class="form-control-file" id="picture_3" name="picture_3">
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
            </form>
        </div>
    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>