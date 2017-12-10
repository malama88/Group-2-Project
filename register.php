<?php

define('TITLE', 'Registration Form');
include('templates/header.html');

// Print some introductory text:
print '<h2>Registration Form</h2>
	<p>Register so that you can take advantage of certain features like this, that, and the other thing.</p>';

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $problem = false; // No problems so far.

    // Check for each value...
    if (empty($_POST['first_name'])) {
        $problem = true;
        print '<p class="text--error">Please enter your first name!</p>';
    }

    if (empty($_POST['last_name'])) {
        $problem = true;
        print '<p class="text--error">Please enter your last name!</p>';
    }

    if (empty($_POST['email']) || (substr_count($_POST['email'], '@') != 1) ) {
        $problem = true;
        print '<p class="text--error">Please enter your email address!</p>';
    }

    $email=$_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
    } else {
        echo("$email is not a valid email address");
    }

    if (empty($_POST['password1'])) {
        $problem = true;
        print '<p class="text--error">Please enter a password!</p>';
    }


    if (!$problem) { // If there weren't any problems...

        // Print a message:
        print '<p class="text--success">You are now registered!</p>';

        // Send the email:
        //$body = "Thank you, {$_POST['first_name']}, for registering with My Online Journal!'.";
        //mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@example.com');

        // Clear the posted values:
        $_POST = [];

    } else { // Forgot a field.

        print '<p class="text--error">Please try again!</p>';

    }

} // End of handle form IF.

// Create the form:
?>
    <form id="form" action="register.php" method="post" class="form--inline">

        <p><input placeholder= "First Name" type="text" name="first_name" size="20" required value="<?php if (isset($_POST['first_name'])) { print htmlspecialchars($_POST['first_name']); } ?>"></p>

        <p><input placeholder= "Last Name" type="text" name="last_name" size="20" required value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>"></p>

        <p><input placeholder= "Email Address" type="email" name="email" size="20" required value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"></p>

        <p><input placeholder= "Create Password" type="text" name="password1" size="20" required value="<?php if (isset($_POST['password1'])) { print htmlspecialchars($_POST['password1']); } ?>"></p>


        <p>Reason for using the online journal: <br>
            <input type="radio" name="response" value="personal" required> personal <br>
            <input type="radio" name="response" value="business"> business <br>
            <input type="radio" name="response" value="both"> both</p>


        <input type="submit" name="submit" value="Submit">

    </form>

<?php include('templates/footer.html'); // Need the footer. ?>