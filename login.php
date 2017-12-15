<?php

// login.php - created by Nichole Rich

define('TITLE', 'Login');
include('templates/header.html');

	// Print some introductory text:
    print '<h2></h2>
	<p> </p>';

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    // Handle the form:
    if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
        // Connect
        $email = strtolower($_POST['email']);
        $passwordHash = md5($_POST['password']);
        $dbc = mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310');
        $query = "SELECT * FROM USERS WHERE email='$email' AND password='$passwordHash'";
        $result = $result = mysqli_query($dbc,$query);
        $rows = mysqli_num_rows($result);


        if ($rows == 1 ) { // Correct!

            // Do session stuff:
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['loggedin'] = time();

            // Redirect the user to the welcome page!
            ob_end_clean(); // Destroy the buffer!
            header ('Location: welcome.php');
            exit();

        } else { // Incorrect!

            print '<p class="text--error">The submitted email address and password do not match those on file!<br>Go back and try again.</p>';


        }

    } else { // Forgot a field.

        print '<p class="text--error">Please make sure you enter both an email address and a password!<br>Go back and try again.</p>';

    }

} else { // Display the form.

    print '<form id="form" action="login.php" method="post" class="form--inline">
	<p><input placeholder="Email Address" type="email" name="email" size="20"></p>
	<p><input placeholder="Password" type="password" name="password" size="20"></p>
	<p><input type="submit" name="submit" value="Log In!" class="button--pill"></p>
	</form>';}




include('templates/footer.html'); // Need the footer. ?>
