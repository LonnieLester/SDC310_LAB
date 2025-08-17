<?php
$errors = array(); // Initialize an error array.

// Check for a first name:
$first_name = trim($_POST['first_name']);
if (empty($first_name)) {
    $errors[] = 'You forgot to enter your first name.';
}

// Check for a last name:
$last_name = trim($_POST['last_name']);
if (empty($last_name)) {
    $errors[] = 'You forgot to enter your last name.';
}

// Check for an email address:
$email = trim($_POST['email']);
if (empty($email)) {
    $errors[] = 'You forgot to enter your email address.';
}

// Check for passwords and match:
$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);
if (!empty($password1)) {
    if ($password1 !== $password2) {
        $errors[] = 'Your two passwords did not match.';
    }
} else {
    $errors[] = 'You forgot to enter your password.';
}

// Process the form if no errors
if (empty($errors)) {
    try {
        $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);

        require('mysqli_connect.php');

        // Insert query using prepared statement
        $query = "INSERT INTO users (first_name, last_name, email, password, registration_date) 
                  VALUES (?, ?, ?, ?, NOW())";

        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, 'ssss', $first_name, $last_name, $email, $hashed_passcode);
        mysqli_stmt_execute($q);

        if (mysqli_stmt_affected_rows($q) == 1) {
            header("location: register-thanks.php");
            exit();
        } else {
            $errorstring = "<p class='text-center col-sm-8' style='color:red'>
                System Error<br />You could not be registered due to a system error.<br>
                We apologize for any inconvenience.</p>";
            echo $errorstring;

            mysqli_close($dbcon);

            echo '<footer class="jumbotron text-center col-sm-12" style="padding-bottom:1px; padding-top:8px;">';
            include("footer.php");
            echo '</footer>';
            exit();
        }

    } catch (Exception $e) {
        print "The system is busy. Please try later.";
    } catch (Error $e) {
        print "The system is busy. Please try again later.";
    }

} else {
    // Display errors
    $errorstring = "<p class='text-center col-sm-8' style='color:red'>
        Error! The following error(s) occurred:<br>";

    foreach ($errors as $msg) {
        $errorstring .= " - $msg<br>\n";
    }

    $errorstring .= "Please try again.</p>";

    echo $errorstring;
}
?>
