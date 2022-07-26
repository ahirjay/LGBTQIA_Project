<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Result</title>
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
    <?php
    // Include config file
    require_once "config.php";
    $param_id = trim($_POST["searchterm"]);
    $sql = "SELECT * FROM resources WHERE ResourceName LIKE '%$param_id%' OR Description LIKE '%$param_id%'";
    $stmt = mysqli_prepare($link, $sql);
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped">';
            echo "<thead>";
            echo "<tr>"; // Tom: changed field, for more check for Resources Table
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "<th>Website</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>"; // Tom: changed rows label, for more check for Resources Table
                echo "<td>" . $row['ResourceID'] . "</td>";
                echo "<td>" . $row['ResourceName'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Website'] . "</td>";
                echo "<td>";
                echo '<a href="read.php?id=' . $row['ResourceID'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="update.php?id=' . $row['ResourceID'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                echo '<a href="delete.php?id=' . $row['ResourceID'] . '" title="Delete Resources" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    

// Close connection
mysqli_close($link);
    ?>
</body>
</html>