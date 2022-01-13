<?php
 session_start();
 require_once 'includes/dbh.inc.php';
 require_once 'includes/functions.inc.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styling.css">
        <script src="js/scripts.js"></script> 
        <title>Fstore</title>
        <header>
            <div class="header">
                <a href="index.php">
                    <img src="img/logo.png" id="logo">
                </a>
                <?php

                    if (isset($_SESSION["useruid"])) {
                        include_once 'logout.php';
                    }
                    else {
                        include_once 'login.php';
                    }

                ?>
            </div>
            <div class="Navigationbar" id="myNavigationbar">
                <a href="index.php">Home</a>
                <div class="productsDropdown">
                    <button class="dropbtn">Products
                        <i></i>
                    </button>
                    <div class="dropdownContent">
                    <?php
                    
                    $cat = displayCat();
                    while ($row=mysqli_fetch_assoc($cat)) {
                        ?>
                            <a href="category.php?id=<?php echo $row['cat_id'] ?>"> <?php echo $row['cat_title']; ?> </a>
                        <?php
                    }

                    ?>
                    </div>
                </div>
                <a href = "mailto: fsm007@live.aul.edu.lb">Contact Us</a>
                <?php include_once 'search.php'; ?>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>
        </header>
    </head>
    <body>