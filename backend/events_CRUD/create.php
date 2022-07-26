<?php
// Include config file
require_once "../shared/config.php";

// Define variables and initialize with empty values
// Tom: changed iniaial variables and error
$EventName = $EventDescription = "";
$EventName_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Tom: Validate name
    $input_name = trim($_POST["EventName"]);
    if (empty($input_name)) {
        $EventName_err = "Please enter the section name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array(
        "options" => array(
            "regexp" => "/^[a-zA-Z\s]+$/"
        )
    ))) {
        $EventName_err = "Please enter a valid name.";
    } else {
        $EventName = $input_name;
    }

    // Tom: Validate Description
    $input_description = trim($_POST["Description"]);
    if (empty($input_description)) {
        $Description_err = "Please enter some Description.";
    } else {
        $Description = $input_description;
    }

    // Huy: Uploading variables
    $targetDir = "../../assets/images/";
    $fileName = $targetFilePath = $fileType = $allowTypes = "";

    if (empty($_FILES["EventImage"]["name"])) {
        $EventImage_err = "Please select at least 1 file to upload.";
    } else {
        $fileName = basename($_FILES["EventImage"]["name"]);
        $temp = explode(".", $_FILES["EventImage"]["name"]);
        $newfilename = uniqid('img_').end($temp);
        $targetFilePath = $targetDir . $newfilename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        //Huy: Handling Image Uploading
        if (!in_array($fileType, $allowTypes)) {
            $EventImage_err = "Please choose a valid file (only JPG, JPEG, PNG, GIF, & PDF files are accepted.";
        }
    }

    // Tom: Validate Event Date
    $input_description = trim($_POST["EventDate"]);
    if (empty($input_description)) {
        $EventDate_err = "Please enter a valid date.";
    } else {
        $EventDate = $input_description;
    }


    // Tom: Check input errors before inserting in database
    if (empty($EventName_err) && empty($Description_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO events (EventName, EventDescription, EventImage, EventDate) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Set parameters
            $param_name = $EventName;
            $param_des = $Description;
            $param_image = $newfilename;
            $param_date = $EventDate;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_des, $param_image, $param_date);

            if (move_uploaded_file($_FILES["EventImage"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Records created successfully. Redirect to landing page
                    header("location: index.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
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
    <title>Create Resource</title>
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
                    <h2 class="mt-5">Create Event</h2>
                    <p>Please fill this form and submit to add resource to the
                        database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Event Name</label> <input type="text" name="EventName" class="form-control <?php echo (!empty($EventName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $EventName; ?>"> <span class="invalid-feedback"><?php echo $EventName_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="Description" class="form-control <?php echo (!empty($Description_err)) ? 'is-invalid' : ''; ?>"></textarea>
                            <span class="invalid-feedback"><?php echo $Description_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Event Image</label> <input type="file" name="EventImage" class="form-control <?php echo (!empty($EventImage_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $EventImage; ?>"> <span class="invalid-feedback"><?php echo $EventImage_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Event Date</label> <input type="datetime-local" name="EventDate" class="form-control <?php echo (!empty($EventDate_err)) ? 'is-invalid' : ''; ?>" value="<?php date_default_timezone_set('America/Toronto'); echo isset($EventDate) ? $EventDate : date('Y-m-d h:i'); ?>" min="<?php date_default_timezone_set('America/Toronto'); echo date('Y-m-d h:i'); ?>"> <span class="invalid-feedback"><?php echo $EventImage_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit"> <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>