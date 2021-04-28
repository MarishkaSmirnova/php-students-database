<!DOCTYPE html>
<html>
	<head>
		<title>TWD PHP Assignment 2 </title>
        <link rel="stylesheet" href="http://bcitcomp.ca/twd/css/style.css" />		
        <link 	type="text/css" rel="stylesheet" href="styles.css" />
	</head>
	<body>
        <h1>Administering DB From a Form</h1>
        <h2>Update a student...</h2>
        <?php
            include "error_query.php";
        ?>

        <?php
            require_once('dbinfo.php');

            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        ?>
        
        <fieldset>
            <legend>Update a record</legend>

            <form method="post" action="update_query.php">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                <input type="text" name="studentnum" id="studentnum" value="<?php echo $_GET['id']; ?>">
                <label for="studentnum">- Student #</label><br>

                <input type="text" name="firstname" id="firstname" value="<?php echo $_GET['firstname']; ?>">
                <label for="firstname">- Firstname</label><br>
            
                <input type="text" name="lastname" id="lastname" value="<?php echo $_GET['lastname']; ?>">
                <label for="lastname">- Lastname</label><br>
                <input type="submit" value="Submit">
            </form>   		
        </fieldset>
            

    </body>
</html>