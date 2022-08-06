<!--Page Name: create.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Creates a section.
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

// Define variables and initialize with empty values
// Tom: changed iniaial variables and error
$SectionName = $SectionDescription = "";
$SectionName_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Tom: Validate name
    $input_name = trim($_POST["SectionName"]);
    if (empty($input_name)) {
        $SectionName_err = "Please enter the section name.";
    } elseif (! filter_var($input_name, FILTER_VALIDATE_REGEXP, array(
        "options" => array(
            "regexp" => "/^[a-zA-Z\s]+$/"
        )
    ))) {
        $SectionName_err = "Please enter a valid name.";
    } else {
        $SectionName = $input_name;
    }

    // Tom: Validate Description
    $input_description = trim($_POST["Description"]);
    if (empty($input_description)) {
        $Description_err = "Please enter some Description.";
    } else {
        $Description = $input_description;
    }

    // Tom: Check input errors before inserting in database
    if (empty($SectionName_err) && empty($Description_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO Sections (SectionName, SectionDescription) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Set parameters
            $param_name = $SectionName;
            $param_des = $Description;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_des);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
<title>Create Section</title>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
					<h2 class="mt-5">Create Section</h2>
					<p>Please fill this form and submit to add section to the
						database.</p>
					<form
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
						method="post">
						<div class="form-group">
							<label>SectionName</label> <input type="text"
								name="SectionName"
								class="form-control <?php echo (!empty($SectionName_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $SectionName; ?>"> <span
								class="invalid-feedback"><?php echo $SectionName_err;?></span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="Description"
								class="form-control <?php echo (!empty($Description_err)) ? 'is-invalid' : ''; ?>"></textarea>
							<span class="invalid-feedback"><?php echo $Description_err;?></span>
						</div>
						<input type="submit" class="btn btn-primary" value="Submit"> <a
							href="index.php" class="btn btn-secondary ml-2">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>