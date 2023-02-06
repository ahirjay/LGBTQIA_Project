<!--Page Name: delete.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Deletes a section.
 -->

<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
  header("location: ../../src/admin-login.php");
  exit;
} 
?>

<?php

if (!isset($_POST["submit"]) && empty($_GET["id"])) {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../shared/error.php");
    exit();
}

if (isset($_POST["submit"]) && ! empty($_POST["submit"])) {

    // require config file
    require_once ("../shared/config.php");

    // Prepare a delete statement
    $sql = "DELETE FROM Sections WHERE SectionID = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Set parameters
        $param_id = trim($_POST["submit"]);

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records deleted successfully. Redirect to landing page
            $sql = "SET @count = 0; UPDATE Sections SET SectionID = @count:= @count + 1; ALTER TABLE Sections AUTO_INCREMENT = 1;";
			if ($result = mysqli_multi_query($link, $sql)) {
				header("location: index.php");
				exit();
			} else {
				echo mysqli_error($link);
			}
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Sections</title>
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
					<h2 class="mt-5 mb-3">Delete Sections</h2>
					<form
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
						method="post">
						<div class="alert alert-danger">
							<input type="hidden" name="ResourceID"
								value="<?php echo trim($_GET["id"]); ?>" />
							<p>Are you sure you want to delete this resource section? <?php echo trim($_GET["id"]); ?></p>
							<p>
								<input type="hidden" value="<?php echo $_GET["id"]?>"
									name="submit" id="submit"> <input type="submit" value="Yes"
									class="btn btn-danger"> <a href="index.php"
									class="btn btn-secondary">No</a>
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>