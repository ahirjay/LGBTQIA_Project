<!--Page Name: index.php
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Shows all events.
 -->

<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
    header("location: ../../src/admin-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 1000px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">2SLGBTQ+ Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="../index.php">Admins</a>
                    <a class="nav-item nav-link" href="../resources_CRUD/index.php">Resources</a>
                    <a class="nav-item nav-link active" href="./index.php">Events</a>
                    <a class="nav-item nav-link" href="../sections_CRUD/index.php">Sections</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Events Details</h2>
                        <!--Tom : changed label name-->
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Events</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../shared/config.php";


                    // Attempt select query execution
                    $sql = "SELECT * FROM Events ORDER BY EventID"; // Tom : changed from $sql = "SELECT * FROM employee"
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>"; // changed field, for more check for Resources Table
                            echo "<th>ID</th>";
                            echo "<th>Name</th>";
                            echo "<th>Description</th>";
                            echo "<th>Image</th>";
                            echo "<th>Date</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>"; // changed rows label, for more check for Resources Table
                                echo "<td>" . $row['EventID'] . "</td>";
                                echo "<td>" . $row['EventName'] . "</td>";
                                echo "<td>" . $row['EventDescription'] . "</td>";
                                echo "<td><img src=\"../../assets/images/" . $row['EventImage'] . "\" alt=\"\" height=\"150\" ></td>";
                                echo "<td>" . $row['EventDate'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['EventID'] . '" class="mr-3" title="View Event" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['EventID'] . '" class="mr-3" title="Update Event" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['EventID'] . '" title="Delete Event" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>