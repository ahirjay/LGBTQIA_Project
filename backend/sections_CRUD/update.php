<!--Page Name: update.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Updates a section.
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
$SectionName = $Phone = $Email = $Website = $Advocacy = $Outreach = $CommunityCare = $Text = $Description = $SectionID = "";
$SectionName_err = $PhoneNumber_err = $Email_err = $Website_err = $Advocacy_err = $Outreach_err = $CommunityCare_err = $TextLine_err = $Description_err = $SectionID_err = "";

 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    
    // Get hidden input value
    $id = $_POST["id"];
    
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
        // $Description = NULL;
    } else {
        $Description = $input_description;
    }
    
    // Check input errors before inserting in database
    if (empty($SectionName_err) && empty($Description_err)) {
        // Prepare an update statement
        $sql = "UPDATE Sections SET SectionName=?, SectionDescription=? WHERE SectionID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Set parameters
            $param_name = $SectionName;
            $param_des = $Description;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_des, $id);
            
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
        $sql = "SELECT * FROM Sections WHERE SectionID = ?";
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
                    $SectionName = $row["SectionName"];
                    $Description = $row["SectionDescription"];

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
    <title>Update Sections</title>
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
                    <h2 class="mt-5">Update Sections</h2>
                    <p>Please edit the input values and submit to update the section record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
							<label></label> <input type="text"
								name="SectionName"
								class="form-control <?php echo (!empty($SectionName_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $SectionName; ?>"> <span
								class="invalid-feedback"><?php echo $SectionName_err;?></span>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="Description"
								class="form-control <?php echo (!empty($Description_err)) ? 'is-invalid' : ''; ?>"><?php echo $Description?></textarea>
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