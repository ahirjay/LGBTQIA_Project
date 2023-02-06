<!--Page Name: read.php
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Shows information of just 1 event.
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

$id = trim($_GET["id"]);
if (isset($_GET["id"]) && !empty($id)) {
    // Include config file
    require_once "../shared/config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM Events WHERE EventID = ?";

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
                $EventID = $row["EventID"];
                $EventName = $row["EventName"];
                $EventDescription = $row["EventDescription"];
                $EventImage = $row["EventImage"];
                $EventDate = $row["EventDate"];
            } else {
                //URL doesn't contain valid id parameter. Redirect to error page
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
    <title>View Events</title>
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
                    <h1 class="mt-5 mb-3">View Events</h1>
                    <div class="form-group">

                        <div class="form-group">
                            <label>EventID</label>
                            <p>
                                <b><?php echo $row["EventID"]; ?></b>
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Event Name</label>
                            <p>
                                <b><?php echo $row["EventName"]; ?></b>
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <p>
                                <b><?php echo $row["EventDescription"]; ?></b>
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Event Image</label>
                            <br>
                            <?php echo "<img src=\"../../assets/images/" . $row['EventImage'] . "\" alt=\"\" height=\"150\" >" ?>
                        </div>

                        <div class="form-group">
                            <label>Event Date</label>
                            <p>
                                <b><?php echo $row["EventDate"]; ?></b>
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