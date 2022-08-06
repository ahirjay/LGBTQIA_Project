<!--Page Name: read.php
    By: Tom Cui.
    Student ID: 040981835.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Reads a resource.
 -->

<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
    header("location: ../../src/admin-login.php");
    exit;
}
?>

<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Include config file
    require_once "../shared/config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM Resources  WHERE ResourceID = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Set parameters
        $param_id = trim($_GET["id"]);

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
                $ResourceID = $row["ResourceID"];
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
                // URL doesn't contain valid id parameter. Redirect to error page
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
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Resources</title>
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
                    <h1 class="mt-5 mb-3">View Resources</h1>
                    <div class="form-group">
                        <label>ResourceID</label>
                        <p>
                            <b><?php echo $row["ResourceID"]; ?></b>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>ResourceName</label>
                        <p>
                            <b><?php echo $row["ResourceName"]; ?></b>
                        </p>
                    </div>
                    <?php //Tom: check for NULL values for fows, if NULL, don't display the rows.
                    if ($row["Phone"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Phone</label>';
                        echo ' <p><b>';
                        echo $row["Phone"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["Email"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Email</label>';
                        echo ' <p><b>';
                        echo $row["Email"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["Website"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Website</label>';
                        echo ' <p><b>';
                        echo $row["Website"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["Advocacy"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Advocacy</label>';
                        echo ' <p><b>';
                        echo $row["Advocacy"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["Outreach"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Outreach</label>';
                        echo ' <p><b>';
                        echo $row["Outreach"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["CommunityCare"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>CommunityCare</label>';
                        echo ' <p><b>';
                        echo $row["CommunityCare"];
                        echo '</b></p>';
                        echo '</div>';
                    }

                    if ($row["Text"] != null) {
                        echo '<div class="form-group">';
                        echo '<label>Text</label>';
                        echo ' <p><b>';
                        echo $row["Text"];
                        echo '</b></p>';
                        echo '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <label>Description</label>
                        <p>
                            <b><?php echo $row["Description"]; ?></b>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>SectionID</label>
                        <p>
                            <b><?php echo $row["SectionID"]; ?></b>
                        </p>
                    </div>
                    <p>
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>