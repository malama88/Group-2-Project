<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create a Table</title>
</head>

<body>

<?php // create_table_users.php
/* This script connects to the MySQL server, selects
the database, and creates a table for users registration. */

//Connect and select:
if($dbc=@mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310')) {
	
// Define the query:
	$query = 'CREATE TABLE users (
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password1 VARCHAR(15) NOT NULL
	)';
	
	// Execute the query:
	if (@mysqli_query($dbc, $query)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
	mysqli_close($dbc); // Close the connection.
} else { // Connection failure.
	print '<p style="color: red;">Could not connect to the database:<br>' . mysqli_connect_error() . '.</p>';
}
?>

</body>
</html>
