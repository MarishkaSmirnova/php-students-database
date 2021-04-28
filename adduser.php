<?php

session_start();

$studentnum ='';
$firstname ='';
$lastname = '';


// validate form fields
if (!isset($_POST['studentnum'])
    || !isset($_POST['firstname'])
    ||!isset($_POST['lastname'])
) {
    $_SESSION['error'] = "<p class='error'>Please register!</p>";
    header('location: prepare_query.php');
    die();
}


if (trim($_POST['studentnum']) === '' 
    || trim($_POST['firstname']) === ''
    || trim($_POST['lastname']) === ''
) {
    $_SESSION['error'] = "<p class='error'>Record NOT Added.</p>";
    header('location: prepare_query.php');
    die();
}

$studentnum = trim($_POST['studentnum']);
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);


require_once('dbinfo.php');

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_errno() !== 0) {
    $_SESSION['error'] = "<p class ='error>Could not connect to database.</p>";
    header('location: prepare_query.php');
    die();
}

$studentnum = $db->real_escape_string($studentnum);
$firstname = $db->real_escape_string($firstname);
$lastname = $db->real_escape_string($lastname);

$query = 'SELECT * FROM students WHERE BINARY id="'.$studentnum.'";';

$result = $db->query($query);

if($result->num_rows > 0){
    $_SESSION['error'] = "<p class='error'>The student number '".$studentnum ."' is already exist!</p>";
    header('location: prepare_query.php');
    die();
}

$query = 'INSERT INTO students (id, firstname, lastname) VALUES ("'.$studentnum.'","'.$firstname.'","'.$lastname.'");';
$result = $db->query($query);

if($db->affected_rows !== 1){
    $_SESSION['error'] = "<p class='error'>Cannot add you in database. Please try again.</p>";
    header('location: prepare_query.php');
    die();
}

$_SESSION['error'] = "<p>Record Added:"." ".$studentnum." ".$firstname." ".$lastname." </p>";
header('location: index.php');
die();

$db->close();
?>