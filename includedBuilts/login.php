
<div class="LoginForm">
    <form class="LoginForm" action="includes/login.inc.php" method="post">
        <input type="text" placeholder="Username" name="uid">
        <input type="password" placeholder="Password" name="pwd">
        <button type="submit" name="submit">Log In</button>

        <?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p style='color: #ff3333; font-size: 20px; font-weight: bold;'> Fill in all fields! </p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p style='color: #ff3333; font-size: 20px; font-weight: bold;'> Incorrect Username or Passwords </p>";
    }
}

?>

    </form>
    <a class="regiBut" href="RegistrationForm.php">Register!</a>
</div>