                                    <center>
                                    <h1>Other Products</h1>
                                    <?php
                                        $products=getOtherProducts();

                                        while ($row=mysqli_fetch_assoc($products)) {
                                            ?>

                                            <a href="productPage.php?id=<?php echo $row['cat_title'] ?>&prodid=<?php echo $row['product_id'] ?>">
                                                <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['product_name'] ?>">
                                            </a>

                                            <?php
                                        }

                                    ?>
                                    </center>