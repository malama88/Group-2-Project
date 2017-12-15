<?php // view_entries.php
/*  This script retriees journal entries from the database */
define('TITLE', 'View Journal Entries');
include('templates/header.html');

print'<h1>My Journal</h1>
<p><a class=\"button\" href=\"add_entry.php\">Add another Journal log</a></p>';


//Connect and select:
$dbc=mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310');
	
	// Define the query:
	$query = 'SELECT * FROM entries ORDER BY date_entered DESC';
if($r = mysqli_query($dbc, $query)) { // Run the query.
	
	//Retrieve and print every record:
	while($row = mysqli_fetch_array($r)) {
		print"<p><h3>{$row['title']}</h3>
		{$row['entry']}<br>
		<a class=\"button\" href=\"edit_entry.php?id={$row['id']}\" >Edit</a>
		<a class=\"button\" href=\"delete_entry.php?id={$row['id']}\">Delete</a>
		</p><hr/>\n";
	}
	
} else { // Query didn't run.
	print'<p style="color: red;">Could not retrieve the data because: <br>'.mysqli_error($dbc).'.</p>
	<p>The query being run was: '.$query.'</p>';
	
} //End of query IF.

mysqli_close($dbc); //Close the connection.

include('templates/footer.html'); // Need the footer.
?>
