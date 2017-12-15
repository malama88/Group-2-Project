<?php

define('TITLE', 'Welcome');
include('templates/header.html');

// Print some introductory text:
print '<p>Get started by creating your first journal entry.</p>';
	
	/* This script adds a blog entry to the database. */
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
	// Validate the form data:
	$problem = FALSE;
	if (!empty($_POST['title']) && !empty($_POST['entry'])) {
		$title = trim(strip_tags($_POST['title']));
		$entry = trim(strip_tags($_POST['entry']));
	} else {
		print '<p style="color: red;">Please submit both a title and an journal entry.</p>';
		$problem = TRUE;
	}
	if (!$problem) {
		// Connect and select:
		$dbc = mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310');
		// Define the query:
		$query = "INSERT INTO entries (id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())";
		// Execute the query:
		if (@mysqli_query($dbc, $query)) {
			print '<p>The journal entry has been added!</p>';
		} else {
			print '<p style="color: red;">Could not add the journal entry because:<br>' . mysqli_error($dbc).'.</p><p>The query being run was: ' . $query . '</p>';
		}
		mysqli_close($dbc); // Close the connection.
	} // No problem!
	
} // End of form submission IF.


 

// Leave PHP and display the form:


?>

<form action="view_entries.php" method="post">
	<p>Entry Title: <input type="text" name="title" size="40" maxsize="100"></p>
	<p>Entry Text: <textarea name="entry" cols="100" rows="20"></textarea></p>
	<input type="submit" name="submit" value="Log My Journal!">
</form>



<?php
include('templates/footer.html'); // Need the footer. ?>