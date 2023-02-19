<?php
    /*
    * CSCI 2170: Example - Getting started with using DB in PHP
    * The functions file for the example
    * Author: Raghav V. Sampangi (raghav@cs.dal.ca)
    *
    * Permission for use granted on 17 October 2021
    * Date accessed: 10 November 2021
    *
    */

// redirect user in case of unauthorized access
redirect();

// Function to sanitize form submissions
function sanitizeData ($string) {
    $sanitizedString = trim($string);
    $sanitizedString = stripslashes($sanitizedString);
    $sanitizedString = htmlspecialchars($sanitizedString);
    return $sanitizedString;
}

// Function to redirect user in case of unauthorized access
function redirect() {
    $path = explode('\\', getcwd());
    $currDirectory = $path[sizeof($path) - 1];
    if ($currDirectory === 'includes') {
        header("Location: index.php");
        die();
    }
}
?>
