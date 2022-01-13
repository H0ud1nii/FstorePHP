            <center>
                <h1>Latest Products</h1>
                <div>
                    <?php
                        $products=getLatestProducts();

                        while ($row=mysqli_fetch_assoc($products)) {
                            ?>

                                    <a href="productPage.php?id=<?php echo $row['cat_title'] ?>&prodid=<?php echo $row['product_id'] ?>"><button>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="<?php echo $row['img'] ?>" >
                                            </div>
                                            <div class="product-info">
                                                <h2><?php echo $row['product_name'] ?></h2>
                                                <p class="price"><?php echo $row['price'] ?></p>
                                            </div>
                                        </div>
                                    </button></a>

                            <?php
                        }

                    ?>
                </div>
            </center>