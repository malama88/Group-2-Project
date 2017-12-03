<?php // index.php
/* This is the home page for this site.
It uses templates to create the layout */

// Include the header:
include('templates/header.html');
// Leave the PHP section to display lost of HTML:

?>
<div class="form">



    <form id="register" action="registration_form.php" method="post">

        <h1>Registration</h1>

        <p>Please complete this form to register for your online journal account:</p>

        <p><input placeholder= "First Name" type="text" name="first_name" size="20" required></p>
        <p><input placeholder= "Last Name" type="text" name="last_name" size="20" required></p>

        <p><input placeholder= "Email Address" type="email" name="email" size="20" required></p>

        <p><input placeholder= "Create Password" type="text" name="password" size="20" required></p>

        <p>Reason for using the online journal: <br>
            <input type="radio" name="response" value="personal" required> personal <br>
            <input type="radio" name="response" value="business"> business <br>
            <input type="radio" name="response" value="both"> both</p>


        <input type="submit" name="submit" value="Submit">

    </form>
</div>
<?php  //Return to PHP.
include('templates/footer.html');
//include the footer.

?>