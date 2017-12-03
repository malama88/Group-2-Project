<?php // Script registration_form.php

include('templates/header.html');

ini_set('display_errors', 1); // Let me learn from my mistakes!
error_reporting(E_ALL); // Show all possible problems!

// This page receives the data from register.html.
// It will receive: first_name, last_name, email, password, response, and submit in $_POST.

// Create shorthand versions of the variables:
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$response = $_POST['response'];


// Print the registration message:
print "<p>Thank you, $first_name $last_name, for registering for the online journal.</p>";

include('templates/footer.html');

?>
