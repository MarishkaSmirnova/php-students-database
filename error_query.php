<?php
session_start();

$errorMessages	= "";

if ( isset($_SESSION['error']) ) {
    $errorMessages = $_SESSION['error'];
    echo "<div class = 'error'";	
    echo "<p>" . $errorMessages. "</p>";
    echo "</div>";

    unset($_SESSION['error']);
}
?>