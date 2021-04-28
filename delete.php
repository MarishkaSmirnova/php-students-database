<!DOCTYPE html>
<html>
	<head>
		<title>TWD PHP Assignment 2 </title>
        <link rel="stylesheet" href="http://bcitcomp.ca/twd/css/style.css" />		
        <link 	type="text/css" rel="stylesheet" href="styles.css" />
	</head>
	<body>
        <h1>Administering DB From a Form</h1>
        <h2>Delete a student...</h2>
        <?php
            include "error_query.php";
        ?>

        <?php
        require_once('dbinfo.php');

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        ?>

        <fieldset>
        
        <legend>Delete a record - Are you sure?</legend>

        <form method="post" 
            action="delete_query.php?id='<?php echo $_GET['id']; ?>'">
    
            <label for="confirm">Yes</label>
            <input type="radio" name="confirm" id="yes" value="yes">
            <br>
            <label for="no">No</label>
            <input type="radio" name="no" id="no" value="no">
            <br>

            <input type="submit" value="Submit">
        </form>

        </fieldset>
    </body>
</html>