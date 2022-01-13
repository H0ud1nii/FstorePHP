<div class="LoginForm">
    <form class="LoginForm" action="includes/logout.inc.php" method="post">
                                
    <?php
                                
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';

    $username = mysqli_real_escape_string($conn, $_SESSION["useruid"]);
    $sql= "SELECT * FROM users WHERE username='$username'";
    $res= $conn ->query($sql);


    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            
            ?>
            <center>
                <a style="color: #BB86FC; font-size: 30px; font-weight: bold;">Hello <br><?php echo "$row[FullName]";?></a><br>
                <img src="img/<?php echo "$row[gender]";?>.png" width="50px" height="50px"><br>
                <button type="submit" name="submit">Log Out</button>
            </center><?php
        }
    }
       
    ?>

    
    
    </form>
</div>