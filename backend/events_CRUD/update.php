<!--Page Name: update.php
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Updates an event.
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
// Changed iniaial variables and error
$EventName = $EventDescription = $EventImage = $EventDate = "";
$EventName_err = $EventDescription_err = $EventImage_err = $EventDate_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["EventName"]);
    if (empty($input_name)) {
        $EventName_err = "Please enter the event name.";
    } elseif (! filter_var($input_name, FILTER_VALIDATE_REGEXP, array(
        "options" => array(
            "regexp" => "/^[a-zA-Z\s]+$/"
        )
    ))) {
        $EventName_err = "Please enter a valid name.";
    } else {
        $EventName = $input_name;
    }

    // Validate EventDescription
    $input_description = trim($_POST["EventDescription"]);
    if (empty($input_description)) {
        $Description_err = "Please enter some EventDescription.";
        // $EventDescription = NULL;
    } else {
        $EventDescription = $input_description;
    }

    // Uploading variables
    $targetDir = "../../assets/images/";
    $fileName = $targetFilePath = $allowTypes = "";

    if (empty($_FILES["EventImage"]["name"])) {
        $EventImage_err = "Please select at least 1 file to upload.";
    } else {
        $fileName = basename($_FILES["EventImage"]["name"]);
        $temp = explode(".", $_FILES["EventImage"]["name"]);
        $newfilename = uniqid('img_').end($temp);
        $targetFilePath = $targetDir . $newfilename;
        $fileType = strtolower(end($temp));
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        //Huy: Handling Image Uploading
        if (!in_array($fileType, $allowTypes)) {
            $EventImage_err = "Please choose a valid file (only JPG, JPEG, PNG, GIF, & PDF files are accepted.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($EventName_err) && empty($EventDescription_err) && empty($EventImage_err) && empty($EventDate_err)) {
        // Prepare an update statement
        $sql = "UPDATE Events SET EventName=?, EventDescription=?, EventImage=?, EventDate=? WHERE EventID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Set parameters
            $param_name = $EventName;
            $param_des = $EventDescription;
            $param_img = $EventImage;
            $param_date = $EventDate;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_des, $param_img, $param_date, $id);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }   
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    $id = trim($_GET["id"]);
    if(isset($_GET["id"]) && !empty($id)){

        // Prepare a select statement
        $sql = "SELECT * FROM Events WHERE EventID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            // Set parameters
            $param_id = $id;        
            mysqli_stmt_bind_param($stmt, "i", $param_id);
                  
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    // Retrieve individual field value
                    $EventName = $row["EventName"];
                    $EventDescription = $row["EventDescription"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../shared/error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
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
    <title>Update Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
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
                    <h2 class="mt-5">Update Events</h2>
                    <p>Please edit the input values and submit to update the event record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
							<label></label> <input type="text"
								name="EventName"
								class="form-control <?php echo (!empty($EventName_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $EventName; ?>"> <span
								class="invalid-feedback"><?php echo $EventName_err;?></span>
						</div>
						
						<div class="form-group">
							<label>EventDescription</label>
							<textarea name="EventDescription"
								class="form-control <?php echo (!empty($Description_err)) ? 'is-invalid' : ''; ?>"><?php echo $EventDescription?></textarea>
							<span class="invalid-feedback"><?php echo $Description_err;?></span>
						</div>
						
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>