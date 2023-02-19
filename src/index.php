<?php
	/*
	 * CSCI 2170: Fall 2021, Assignment 4
	 * index.php - the main homepage file for this template
	 * Author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 */

    require_once "includes/header.php";
?>
	<main id="homepg-main-content" class="pg-main-content">
    <?php
        // display page heading lvl. 2 and border
        include_once "includes/indexH2.php";

        // Display login page if user has not logged in
        if(!isset($_SESSION['fname'])) {
    ?>
        <form id="loginForm" action="includes/login.php" method="post">
            <?php
            // display this if user has a failed login attempt
            if(isset($_SESSION['badUsrOrPass']))
                echo "<p id='badUsrOrPassMsg'>* Wrong username or password. Please try again. *</p>";
            ?>
            <div id="loginUserInputs">
                <label for="emailBox">Your Email:</label>
                <input type="text" name="email" id="emailBox" required>
                <label for="passwordBox">Your Password:</label>
                <input type="password" name="password" id="passwordBox" required>
            </div>
            <div id="loginFormButtons">
                <input type="submit" id="loginButton" name="login" value="Login">
                <input type="reset" id="loginClearButton" name="clear" value="Clear">
            </div>
        </form>
    <?php
        }
        else {
    ?>
    <?php
            if(isset($_GET['show'])) {
                if ($_GET['show'] === 'inbox')
                    include_once "includes/inbox.php";
                elseif ($_GET['show'] === 'sent')
                    include_once "includes/sent.php";
                elseif ($_GET['show'] === 'compose')
                    include_once "includes/compose.php";
            }
            else
                include_once "includes/inbox.php";
        }
    ?>
	</main>
<?php
    require_once "includes/footer.php";
?>