<!--Page Name: update.php
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Updates an admin's password.
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
// Tom: changed iniaial variables and error
$CurrentPassword = $NewPassword = $NewConfirmedPassword = "";
$CurrentPassword_err = $NewPassword_err = $NewConfirmedPassword_err = "";




// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];
    $currentHashedPassword = "";

    $sql = "SELECT * FROM Admins WHERE AdminID = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Set parameters
        $param_id = $id;
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /*
                 * Fetch result row as an associative array. Since the result set
                 * contains only one row, we don't need to use while loop
                 */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                // Retrieve individual field value
                $currentHashedPassword = $row['Password'];
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    //Huy: Validate current password
    $input = trim($_POST["CurrentPassword"]);
    if (empty($input)) {
        $CurrentPassword_err = "Please enter the current password to authorize.";
    } elseif (!password_verify($input, $currentHashedPassword)) {
        $CurrentPassword_err = "Incorrect current password";
    } else {
        $CurrentPassword = $input;
    }

    // Huy: Validate new password
    $input_new_password = trim($_POST["NewPassword"]);
    if (empty($input_new_password)) {
        $NewPassword_err = "Please enter the new password";
    } elseif (password_verify($input_new_password, $currentHashedPassword)) {
        $NewPassword_err = "Please enter a password that's different from your current password";
    } elseif (strlen($input_new_password) < '8') {
        $NewPassword_err = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $input_new_password)) {
        $NewPassword_err = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $input_new_password)) {
        $NewPassword_err = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $input_new_password)) {
        $NewPassword_err = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        $NewPassword = $input_new_password;
    }

    // Huy: Validate new confirmed password
    $input_new_confirmed_password = trim($_POST["NewConfirmedPassword"]);
    if (!empty($NewPassword)) {
        if (empty($input_new_confirmed_password)) {
            $NewConfirmedPassword_err = "Please enter the new confirmed password";
        } elseif (strcmp($input_new_password, $input_new_confirmed_password) != 0) {
            $NewConfirmedPassword_err = "New password not matching";
        } else {
            $NewConfirmedPassword = $input_new_confirmed_password;
        }
    }


    // Check input errors before inserting in database
    if (empty($CurrentPassword_err) && empty($NewPassword_err) && empty($NewConfirmedPassword_err)) {
        // Prepare an update statement
        $sql = "UPDATE Admins SET Password = ? WHERE AdminID = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Set parameters
            $param_password = password_hash($input_new_password, PASSWORD_BCRYPT);
            $param_id = $id;
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM Resources  WHERE ResourceID = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            // Set parameters
            $param_id = $id;
            mysqli_stmt_bind_param($stmt, "i", $param_id);


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $ResourceName = $row["ResourceName"];
                    $Phone = $row["Phone"];
                    $Email = $row["Email"];
                    $Website = $row["Website"];
                    $Advocacy = $row["Advocacy"];
                    $Outreach = $row["Outreach"];
                    $CommunityCare = $row["CommunityCare"];
                    $Text = $row["Text"];
                    $Description = $row["Description"];
                    $SectionID = $row["SectionID"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../shared/error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../shared/error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Admin Password</title>
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
                    <h2 class="mt-5">Update Admin Password</h2>
                    <p>Please enter the following fields</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="CurrentPassword" class="form-control <?php echo (!empty($CurrentPassword_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $CurrentPassword_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>New Password</label> <input type="password" name="NewPassword" class="form-control <?php echo (!empty($NewPassword_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $NewPassword_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>New Confirmed Password</label> <input type="password" name="NewConfirmedPassword" class="form-control <?php echo (!empty($NewConfirmedPassword_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $NewConfirmedPassword_err; ?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>