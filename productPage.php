<?php
    include_once 'includedBuilts/header.php';
?>
                    <?php
                        $prod_id=$_GET['prodid'];
                        $specificProduct = getSpeciProducts($prod_id);
                        if ($row=mysqli_fetch_assoc($specificProduct)) {
                            ?>

                            <div>&nbsp</div>
                            <div>&nbsp</div>
                            <div>&nbsp</div>
                            <table class="productdes">
                                <tr><td>
                                    <div class="product-container">
                                        <div class="left-column">
                                            <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['product_name'] ?>">
                                        </div>
                                        <div class="right-column">
                                            <div class="product-description">
                                            
                                            <?php
                    
                                            $cat_id=$_GET['id'];
                                            $specificCat = displayCatName($cat_id);
                                            if ($row2=mysqli_fetch_assoc($specificCat)) {
                                                ?>
                                                
                                                <span><a href="category.php?id=<?php echo $cat_id; ?>"><?php echo $row2['cat_title']; ?></a></span>

                                                <?php
                                            }

                                            ?>
        
                                                <h1><?php echo $row['product_name'] ?></h1>
                                            </div>
                                            <div class="product-color">
                                                <span>Color</span>
                                        
                                                <div class="color-choose">
                                                <div>
                                                    <input data-image="PhantomViolet" type="radio" id="PhantomViolet" name="color" value="PhantomViolet" checked>
                                                    <label for="PhantomViolet"><span></span></label>
                                                </div>
                                                <div>
                                                    <input data-image="PhantomGrey" type="radio" id="PhantomGrey" name="color" value="PhantomGrey">
                                                    <label for="PhantomGrey"><span></span></label>
                                                </div>
                                                <div>
                                                    <input data-image="PhantomWhite" type="radio" id="PhantomWhite" name="color" value="PhantomWhite">
                                                    <label for="PhantomWhite"><span></span></label>
                                                </div>
                                                <div>
                                                    <input data-image="PhantomPink" type="radio" id="PhantomPink" name="color" value="PhantomPink">
                                                    <label for="PhantomPink"><span></span></label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <span><?php echo $row['price'] ?></span>
                                                <button class="buy-now">Buy now</button>
                                            </div>
                                        </div>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <center>
                                        <div class="product-specs">
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <hr>
                                            <div class="text-description">
                                                <p><?php echo $row['description'] ?></p>
                                            </div>
                                            <div class="other-specs">
                                                <div class="storage">
                                                    <h1>Storage</h1>
                                                    <button>128 GB</button>
                                                    <button>256 GB</button>
                                                    <button>512 GB</button>
                                                </div>
                                                <div class="connectivity">
                                                    <h1>Connectivity</h1>
                                                    <button>5G</button>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </td></tr>
                                <tr><td>
                                    <hr>
                                    <div class="other-prod">
                                    <?php
                                        include_once 'includedBuilts/otherProducts.php';
                                    ?>
                                    </div>
                                </td></tr>
                            </table>

                            <?php
                        }

                    ?>
           
    </body>
</html>