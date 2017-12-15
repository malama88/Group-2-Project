<?php // add_entry.php
/* This script adds a journal entry to the database. */

define('TITLE', 'Add a Journal Entry');
include('templates/header.html');

print'<h2>Log your Journal here!</h2>';


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
			print '<p>Your journal entry has been added!</p>';
		} else {
			print '<p style="color: red;">Could not add your journal entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
		mysqli_close($dbc); // Close the connection.
	} // No problem!
	
} // End of form submission IF.

// Display the form:
?>

<form action="add_entry.php" method="post">
	<p>Entry Title: <input type="text" name="title" size="40" maxsize="100"></p>
	<p>Entry Text: <textarea name="entry" cols="100" rows="50"></textarea></p>
	<input type="submit" name="submit" value="Post This Entry!">
</form>

</body>
</html>
