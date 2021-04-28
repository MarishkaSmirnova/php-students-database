<!DOCTYPE html>
<html>
	<head>
		<title>TWD PHP Assignment 2 </title>
        <link rel="stylesheet" href="http://bcitcomp.ca/twd/css/style.css" />		
        <link 	type="text/css" rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<h1>PHP Students Database</h1>

        <?php
            include "error_query.php";  
        ?>

        <h2>Our students:</h2>

        <?php
        require_once('dbinfo.php');

        $sortOrder ='lastname';

        if(isset( $_GET['choice']) ) {

        $validChoices = array ('id','firstname','lastname');

        if ( in_array( $_GET['choice'], $validChoices) ) {
            $sortOrder = $_GET['choice'];
        }else {
            echo "<p class='error'>Your, '".$_GET['choice']."' is not a valid. </p>";
            }
        }

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sortOrder = $mysqli->real_escape_string($sortOrder);

        if ( mysqli_connect_errno() !== 0 ) {
            die("<p>Could not connect to DB:".$mysqli->connect_error."</p>");
        } 
        ?>

        <p>
            <a href="prepare_query.php">Add a Student</a>
        </p>

        <?php
        $query = 'SELECT id, firstname, lastname FROM students ORDER BY '.$sortOrder.';';

        $result = $mysqli->query($query);
        ?>

        <table border="1">

        <?php
        $arrayOfFieldNames = $result->fetch_fields();
        ?>

        <tr>

        <?php foreach( $arrayOfFieldNames as $oneFieldAsObject ) { ?>
            <th><a href='index.php?choice=<?php echo $oneFieldAsObject->name?>'><?php echo $oneFieldAsObject->name?></a></th>

        <?php } //ends foreach loop ?>

        </tr>

        <?php
        while( $record = $result->fetch_assoc() ){
        ?>
        <tr>
            
            <td><?php echo $record["id"] ?></td>
            <td><?php echo $record["firstname"] ?></td>
            <td><?php echo $record["lastname"] ?></td>

            <!-- delete and update links -->
            <td><a href='delete.php?id=<?php echo $record['id']?>&firstname=<?php echo $record['firstname']?>&lastname=<?php echo $record['lastname']?>'>Delete</a></td>

            <td><a href='update.php?id=<?php echo $record['id']?>&firstname=<?php echo $record['firstname']?>&lastname=<?php echo $record['lastname']?>'>Update</a></td>
            
        </tr>

        <?php } ?> <!--  end of while loop -->

        </table>

        <?php $mysqli->close() ?>


	</body>
</html>