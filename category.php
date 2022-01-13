<?php
    include_once 'includedBuilts/header.php';
?>
        <br>
        <?php
                    
                    $cat_id=$_GET['id'];
                    $specificCat = displayCatName($cat_id);
                    while ($row=mysqli_fetch_assoc($specificCat)) {
                        ?>
                        
                            <h1><?php echo $row['cat_title']; ?></h1>

                        <?php
                    }

        ?>
        <br>
        <div class="CardsLayout">
                    <?php
                        $specificProduct = getProducts($cat_id);
                        
                        while ($row=mysqli_fetch_assoc($specificProduct)) {
                           
                           ?>
                                
                                <div>&nbsp</div>
                                <div>&nbsp</div>
                                <div>&nbsp</div>
                                <div>&nbsp</div>
                                <div class="cards">
                                    <img src="<?php echo $row['img'] ?>" alt="<?php echo $row['product_name'] ?>" style="width:100%">
                                    <h2><?php echo $row['product_name'] ?></h2>
                                    <p class="price"><?php echo $row['price'] ?></p>
                                    <p  class="sdescription"><?php echo $row['description'] ?></p>
                                    <a href="productPage.php?id=<?php echo $row['cat_title'] ?>&prodid=<?php echo $row['product_id'] ?>"><button>Details</button></a>
                                </div>

                            <?php
                        }

                    ?>
            
        </div>
    </body>
</html>