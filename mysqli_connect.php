<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connect to MySQL</title>
</head>

<body>

<?php //Script 12.1 - mysqli_connect.php
/*  This script connects to the MySQL database. */

//Attempt to connect to MySQL and print out messages:
if($dbc=@mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310')) {
	
	print'<p>Successfully connected to the database!</p>';
	
	mysqli_close($dbc); //Close the connection.
} else {
	
	print'<p style="color: red;">Could not connect to the database:<br>'
	.mysqli_connect_error().'.</p>';
}

?>

</body>
</html>
