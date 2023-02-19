<?php
/*
 * login.php
 * login processing
 *
 * redirects unauthorized access on its own
 */

require_once "db.php";

session_start();

$passQuery = "SELECT j_password FROM j_login WHERE BINARY j_email = '{$_POST['email']}'";
$result = $conn->query($passQuery);

if($result)
    $storedPass = $result->fetch_assoc()['j_password'];
else {
    $_SESSION['badUsrOrPass'] = 'set';
    header("Location: ../index.php");
    die();
}

if (password_verify($_POST['password'], $storedPass)) {
    session_regenerate_id();

    $userIDquery = "SELECT j_id FROM j_login WHERE BINARY j_email = '{$_POST['email']}'";
    $userID = $conn->query($userIDquery)->fetch_assoc()['j_id'];

    $nameQuery = "SELECT j_user_fname, j_user_lname FROM j_user WHERE j_user_login_id = '{$userID}'";
    $fullName = $conn->query($nameQuery)->fetch_assoc();
    $fname = $fullName['j_user_fname'];
    $lname = $fullName['j_user_lname'];

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $_POST['email'];

    header("Location: ../index.php?show=inbox");
    die();
}
else {
    $_SESSION['badUsrOrPass'] = 'set';

    header("Location: ../index.php");
    die();
}

?>
