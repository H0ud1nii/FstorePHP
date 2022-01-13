<?php

require_once 'dbh.inc.php';

function emptyInputSignup($name, $gender, $email, $dob, $country, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($gender) || empty($email) || empty($dob) || empty($country) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
       $result = true;  
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { 
        $result = true;  
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $result = true;  
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) { 
        $result = true;  
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username , $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../RegistrationForm.php?error=stmtFAILED");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $gender, $dob, $country) {
    $sql = "INSERT INTO users (FullName, email, username, usersPwd, gender, birthday, country) VALUES (?, ? ,? ,? ,? ,? ,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../RegistrationForm.php?error=stmtFAILED");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $username, $hashedPwd, $gender, $dob, $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../RegistrationForm.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
       $result = true;  
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username , $username);

    if ($uidExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["username"];
        header("location: ../index.php");
        exit();
    }
}

function displayCat() {
    global $conn; 
    $sql = "SELECT * FROM categories WHERE is_available=1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function displayCatName($cat_id='') {
    global $conn; 
    if ($cat_id!='') {
        $sql = "SELECT cat_title FROM categories WHERE cat_id=$cat_id";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getProducts($cat_id='') {
    global $conn;
    $sql = "SELECT * FROM products WHERE is_available=1 ORDER BY product_id desc";

    if ($cat_id!='') {
        $sql = "SELECT * FROM products WHERE is_available=1 AND cat_title=$cat_id";
    }

    $result = mysqli_query($conn, $sql);
    return $result;
}

function getSpeciProducts($cat_id='') {
    global $conn;
    $sql = "SELECT * FROM products WHERE is_available=1 ORDER BY product_id desc";

    if ($cat_id!='') {
        $sql = "SELECT * FROM products WHERE product_id=$cat_id";
    }

    $result = mysqli_query($conn, $sql);
    return $result;
}


function getLatestProducts() {
    global $conn;
    $sql = "SELECT * FROM products WHERE is_available=1 ORDER BY RAND() LIMIT 5";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getOtherProducts() {
    global $conn;
    $sql = "SELECT * FROM products WHERE is_available=1 ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getSlideShowImg() {
    global $conn;
    $sql = "SELECT * FROM slideshow order by RAND()";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getGender() {
    global $conn;
    $sql = "SELECT gender FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}