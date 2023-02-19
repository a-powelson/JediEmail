<?php
/*
 * emailCount.php
 * file for asynchronously updating email count in
 * inbox nav link
 */

require_once "db.php";

session_start();

if(!isset($_SESSION['email'])){
    header("Location: index.php");
    die();
}

$emailCountQuery = "SELECT COUNT(j_mail_recipient_email) AS count FROM j_mail
                    WHERE j_mail_recipient_email = '{$_SESSION['email']}' && j_mail_draft = 0";

$emailCount = $conn->query($emailCountQuery)->fetch_assoc()['count'];

echo $emailCount;
?>
