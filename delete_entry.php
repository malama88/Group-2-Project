<?php // delete_entry.php
/*  This script delets a journal entry.  */
define('TITLE', 'Delete a Journal Entry');
include('templates/header.html');

// Print some introductory text:

//connect and select:
$dbc = mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310');

if (isset($_GET['id']) && is_numeric($_GET['id'])) { //display the entry in a form
	
	//Define the query:
 $query="SELECT title, entry FROM ENTRIES WHERE id = {$_GET['id']}";
 if($r=mysqli_query($dbc, $query)) { //Retrieve the information.
		
		// Make the form:
		print'<form action="delete_entry.php"method="post">
		<p>Are you sure you want to delete your journal entry?</p>
		<p><h3>'.$row['title'].'</h3>'.$row['entry'].'<br>
		<input type="hidden" name="id" value="'.$_GET['id'].'">
	 <input type="submit" name="submit" value="Delete this Journal!"></p>
		</form>';
				
	} else { //Couldn't get the information.
		
			print '<p style="color: red;">Could not retrieve your journal entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			
		
		}
	
} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.
	
	// Define the query:
	$query = "DELETE FROM ENTRIES WHERE id={$_POST['id']} LIMIT 1";
	$r = mysqli_query($dbc, $query); // Execute the query.
	
	// Report on the result:
	if (mysqli_affected_rows($dbc) == 1) {
		print '<p>The journal entry has been deleted.</p>';
	
} else {
		print '<p style="color: red;">Could not delete the journal entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
	
} else { // No ID received.
	
	print '<p style="color: red;">This page has been accessed in error.</p>';
	
} // End of main IF.

mysqli_close($dbc); // Close the connection.

include('templates/footer.html'); // Need the footer.
?>

