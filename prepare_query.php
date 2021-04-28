<!DOCTYPE html>
<html>
	<head>
		<title>TWD PHP Assignment 2 </title>
	<link rel="stylesheet" href="http://bcitcomp.ca/twd/css/style.css" />		
	<link 	type="text/css" 
			rel="stylesheet" 
			href="styles.css" />
	</head>
    <body>
		<h1>Administering DB From a Form</h1>
		<h2>Add a student...</h2>

		<?php
			include "error_query.php";
		?>

		<form method="POST" action="adduser.php">
		<fieldset>
			<legend>Add a record:</legend>
				<input type="text" name="studentnum" id="studentnum" />
				<label for="studentnum">- Student #</label>
				<br/>
				<input type="text" name="firstname" id="firstname" />
				<label for="firstname">- Firstname</label>
				<br/>
				<input type="text" name="lastname" id="lastname" />
				<label for="lastname">- Lastname</label>
				<br/>
				<input type="submit" /><br />
		</fieldset>
		</form>

    </body>
</html>