<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["Name"];
    $gender = $_POST["gender"];
    $email = $_POST["Email"];
    $dob = $_POST["DOB"];
    $country = $_POST["country"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $gender, $email, $dob, $country, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../RegistrationForm.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../RegistrationForm.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../RegistrationForm.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../RegistrationForm.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $username) !== false) {
        header("location: ../RegistrationForm.php?error=usernametaken");
        exit();
    }
    if (uidExists($conn, $email, $email) !== false) {
        header("location: ../RegistrationForm.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd, $gender, $dob, $country);

}
else {
    header("location: ../RegistrationForm.php?redirect");
    exit();
}
