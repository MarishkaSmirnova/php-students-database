<?php

$studid ='';
$firstname ='';
$lastname = '';

session_start();

if( !isset($_POST['confirm'] )) {
    $_SESSION['error'] = "<p>Delete record aborted.</p>";
    header('location: index.php');
    die();
}

require_once('dbinfo.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$studId = $_GET['id'];

$studid = $mysqli->real_escape_string($studid);
$firstname = $mysqli->real_escape_string($firstname);
$lastname = $mysqli->real_escape_string($lastname);

$query = "DELETE FROM students WHERE id = $studId";
$result = $mysqli->query($query);

if( $mysqli->affected_rows !== 1){
    $_SESSION['error'] = "<p class='error'>Cannot delete the data</p>";
    header('location: index.php');
    die();
}else {
    $_SESSION['error'] = "<p class='error'>Record with ID: ".$studId." has been deleted" ."</p>";
    header('location: index.php');
    die();
}

$mysqli->close();

?>