<?php
session_start();

$studentnum ='';
$firstname ='';
$lastname = '';

if(!isset($_POST['studentnum']) 
    || !isset($_POST['firstname']) 
    || !isset($_POST['lastname'])
){
    $_SESSION['error'] = "<p class='error'>Cannot handle your request</p>";
    header('location: index.php');
    die();
}
require_once('dbinfo.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$studnum = $_POST['id'];
$newstudnum = $_POST['studentnum'];
$newfirstname = $_POST['firstname'];
$newlastname = $_POST['lastname'];

$studentnum = $mysqli->real_escape_string($studentnum);
$newstudnum = $mysqli->real_escape_string($newstudnum);
$newfirstname = $mysqli->real_escape_string($newfirstname);
$newlastname = $mysqli->real_escape_string($newlastname);

$query = "UPDATE students SET id='$newstudnum', firstname='$newfirstname', lastname='$newlastname' WHERE id='$studnum'";
echo $query;
$result = $mysqli->query($query);

if( $mysqli->affected_rows != 1 ) {  
    $_SESSION['error'] = "<p class='error'>Record wasn't updated.</p>";
    header('location: index.php');
    die();
}else{
    $_SESSION['error'] = "<p class='error'>Record Updated:"." ".$newstudnum." ".$newfirstname." ".$newlastname." </p>";
    header('location: index.php');
    die();
}

$mysqli->close();

?>