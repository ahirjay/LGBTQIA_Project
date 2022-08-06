<!--Page Name: create.php
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Creates an admin.
 -->

<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
    header("location: ../../src/admin-login.php");
    exit;
}
?>

<?php
// Include config file
require_once "../shared/config.php";
require_once "../shared/password.php";

// Define variables and initialize with empty values
$Username = $Password = $Firstname = $Lastname = $ConfirmedPassword = "";
$Username_err = $Password_err = $Firstname_err = $Lastname_err = $ConfirmedPassword_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    $input = trim($_POST["Username"]);
    $sql = "SELECT * FROM Admins";
    $stmt = mysqli_prepare($link, $sql);
    $username_arr = array();

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($username_arr, $row['Username']);
            }
        }
    }
    if (empty($input)) {
        $Username_err = "Please enter the username.";
    } elseif (in_array($input, $username_arr)) {
        $Username_err = "This username already exists, please enter a different username";
    } else {
        $Username = $input;
    }

    // Validate username
    $input = trim($_POST["Password"]);
    if (empty($input)) {
        $Password_err = "Please enter a password";
    } else if (strlen($input) < '8') {
        $Password_err = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $input)) {
        $Password_err = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $input)) {
        $Password_err = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $input)) {
        $Password_err = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        $Password = $input;
    }

    $input = trim($_POST["ConfirmedPassword"]);
    if (!empty($Password)) {
        if (empty($input)) {
            $ConfirmedPassword_err = "Please confirm the password";
        } else if (strcmp($Password, $input) != 0) {
            $ConfirmedPassword_err = "Password is not matching. Please confirm again!";
        } else {
            $ConfirmedPassword = $input;
        }
    }

    // Validate username
    $input = trim($_POST["Firstname"]);
    if (empty($input)) {
        $Firstname_err = "Please enter the first name.";
    } else {
        $Firstname = $input;
    }

    // Validate username
    $input = trim($_POST["Lastname"]);
    if (empty($input)) {
        $Lastname_err = "Please enter the last name.";
    } else {
        $Lastname = $input;
    }

    //Check input errors before inserting in database
    if (empty($Firstname_err) && empty($Lastname_err) && empty($Username_err) && empty($Password_err) && empty($ConfirmedPassword_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO Admins (FirstName, LastName, Username, Password) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Set parameters
            $param_firstname = $Firstname;
            $param_lastname = $Lastname;
            $param_username = $Username;
            $param_password = password_hash($Password, PASSWORD_BCRYPT);

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_firstname, $param_lastname, $param_username, $param_password);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create an Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create an Admin</h2>
                    <p>Please fill this form and submit to add admin to the
                        database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>First Name</label> <input type="text" name="Firstname" class="form-control <?php echo (!empty($Firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Firstname; ?>"> <span class="invalid-feedback"><?php echo $Firstname_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label> <input type="text" name="Lastname" class="form-control <?php echo (!empty($Lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Lastname; ?>"> <span class="invalid-feedback"><?php echo $Lastname_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Username</label> <input type="text" name="Username" class="form-control <?php echo (!empty($Username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Username; ?>"> <span class="invalid-feedback"><?php echo $Username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Password (must contain at least 8 characters and include 1 lowercase, 1 uppercase, and 1 number)</label> <input type="password" name="Password" class="form-control <?php echo (!empty($Password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Password; ?>"> <span class="invalid-feedback"><?php echo $Password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label> <input type="password" name="ConfirmedPassword" class="form-control <?php echo (!empty($ConfirmedPassword_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ConfirmedPassword; ?>"> <span class="invalid-feedback"><?php echo $ConfirmedPassword_err; ?></span>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit"> <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>