<?php
session_start();
require_once "includes/db.php";
require_once "includes/functions.php";

// redirect user in case of unauthorized access
redirect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JediMail</title>

	<!-- Link to the CSS reset file, Normalize.css
		 Author: Nicolas Gallagher
		 URL: https://necolas.github.io/normalize.css/
		 Date accessed: 31 Oct 2021
-->
	<link rel="stylesheet" href="css/normalize.css">

	<!-- Link to the main stylesheet for this template -->
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
	<header id="homepg-banner" class="pg-banner">
		<h1><a href="index.php">JediMail</a></h1>
	</header>

    <?php
        if(isset($_SESSION['fname'])) {
    ?>

	<nav class="primary-nav">
		<a id='inboxNavLink' href="index.php?show=inbox">Inbox</a>
		<a href="index.php?show=sent">Sent &amp; drafts</a>
		<a href="index.php?show=compose">Write new email</a>
        <a href="includes/logout.php">Logged in as <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] . " (logout)"; ?></a>
	</nav>

<?php
    }
?>