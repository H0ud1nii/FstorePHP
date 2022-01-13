<?php

                        if (isset($_POST['submit-search'])) { 
                            $search = mysqli_real_escape_string($conn, $_POST['search-field']);
                            $sql = "SELECT * FROM products WHERE is_available=1 AND (product_name LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%' OR cat_title_name LIKE '%$search%')";
                            $res = mysqli_query($conn, $sql);
                            $sqlResult = mysqli_num_rows($res);

                            if ($sqlResult > 0) {
                                    ?>
                                    <div class="productsDropdown">
                                        <button class="dropbtn">Search Results ↓
                                            <i></i>
                                        </button>
                                        <div class="dropdownContent">
                                            <?php
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                        <a href="productPage.php?id=<?php echo $row['cat_title'] ?>&prodid=<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                
                            }
                            else {
                                ?>
                                    <div class="productsDropdown">
                                        <button class="dropbtn">Search Results ↓
                                            <i></i>
                                        </button>
                                        <div class="dropdownContent">
                                            <a>No Match Found</a>
                                        </div>
                                    </div>
                                    <?php
                            }
                        }

                    ?>
                <form class="search-container" method="post">
                    <input type="search" name="search-field" placeholder="Search..">
                    <button type="submit" name="submit-search" class="searchbtn"><img class="searchbtn" src="img/searchIcon.png" width="43px" height="43px"></button>
                </form>