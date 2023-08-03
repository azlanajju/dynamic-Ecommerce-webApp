<?php include("./admin/config.php"); ?>
<?php include("./admin/processes/1getCategory.php"); ?>

<!-- fashion section start -->
<div class="fashion_section">
    <div id="my_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php
            try {
                // Query to fetch products from the database
                $stmt = $conn->query("SELECT * FROM products");
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $totalProducts = count($products);
                $productsPerSlide = 3;
                $slideCount = ceil($totalProducts / $productsPerSlide);

                for ($slide = 0; $slide < $slideCount; $slide++) {
                    $active = ($slide === 0) ? 'active' : '';
            ?>
                    <div class="carousel-item <?php echo $active; ?>">
                        <div class="container">
                            <h1 class="fashion_taital">Man & Woman Fashion</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    <?php
                                    for ($i = $slide * $productsPerSlide; $i < min(($slide + 1) * $productsPerSlide, $totalProducts); $i++) {
                                        $product = $products[$i];
                                    ?>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text"><?php echo $product['product_name']; ?></h4>
                                                <p class="price_text">Price <span style="color: #262626;">$ <?php echo $product['price']; ?></span></p>
                                                <div class="tshirt_img"><img src="./admin/uploads/<?php echo $product['picture_1']; ?>"></div>
                                                <div class="btn_main">
                                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }

                // Close the database connection
                $conn = null;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!-- fashion section end -->
