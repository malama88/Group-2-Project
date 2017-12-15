<?php

// register.php - created by Nichole Rich

define('TITLE', 'Registration Form');
include('templates/header.html');

// Print some introductory text:
print '<h2>Registration Form</h2>
	<p>Register so that you can take advantage of certain features like this, that, and the other thing.</p>';

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $problem = false; // No problems so far.

    // Check for each value...
    $first_name=$_POST['first_name'];
    if (empty($first_name)) {
        $problem = true;
        print '<p class="text--error">Please enter your first name!</p>';
    }

    $last_name=$_POST['last_name'];
    if (empty($last_name)) {
        $problem = true;
        print '<p class="text--error">Please enter your last name!</p>';
    }

    $email=$_POST['email'];
    if (empty($email) || (substr_count($email, '@') != 1) ) {
        $problem = true;
        print '<p class="text--error">Please enter your email address!</p>';
    }


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
    } else {
        echo("$email is not a valid email address");
        $problem = true;
    }

    $password1=$_POST['password1'];
    if (empty($password1)) {
        $problem = true;
        print '<p class="text--error">Please enter a password!</p>';
    }



    if (!$problem) { // If there weren't any problems...

        // Connect
        $dbc = mysqli_connect('thewritedev.com', 'thewrjk1_group', 'web2310', 'thewrjk1_WEB2310');

        // Check to see if user is registered
        $query="SELECT * from USERS WHERE email='$email'";
        $result = mysqli_query($dbc,$query);
        $rows = mysqli_num_rows($result);

        if($rows == 1) {
            // Already Registered
            print'<p>You are already registered.</p>';
        } else {
            // Register
            // Define the query
            $passwordHash = md5($password1);
            $query = "INSERT INTO USERS (first_name, last_name, email, password, signup_date) 
            VALUES ('$first_name', '$last_name', '$email', '$passwordHash', NOW())";

            // Execute the query
            if (@mysqli_query($dbc, $query)) {
                print '<p class="text--success">You are now registered!</p>';
            } else {
                print '<p>Could not register because: <br>' . mysqli_error($dbc) . '.</p>
                <p>The query being run was: ' . $query . '</p>';
            }
        }

        mysqli_close($dbc); // close the connection


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


        <input type="submit" name="submit" value="Submit">

    </form>

<?php

?>

<?php include('templates/footer.html'); // Need the footer. ?>