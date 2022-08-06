<!--Page Name: admin-login.php
	
    By: Ghaith Ali, Jay Ahir, Huy Vo.
    Student ID: 040930758
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is to show a form an admin can login to do CRUD operations event.
    Functions: A form has a username, password fields for admin to enter their credentials and login.
 -->

<?php
session_start();
if (isset($_POST['logOut']) && $_POST['logOut'] == "true") {
  unset($_SESSION['isLoggedIn']);
  unset($_SESSION['username']);
  unset($_POST['logOut']);
}

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
  header("location: ../backend/index.php");
  exit;
}

if (isset($_POST['username']) && isset($_POST['password']) && trim($_POST['username']) != "" && trim($_POST['password'] != "")) {

  require_once "../backend/shared/config.php";
  require_once "../backend/shared/password.php";

  $Message_Err = "";
  $sql = "SELECT * FROM Admins WHERE username = ?";
  if ($stmt = mysqli_prepare($link, $sql)) {
    $username = trim($_POST['username']);
    mysqli_stmt_bind_param($stmt, "s", $username);

    if (mysqli_stmt_execute($stmt)) {
      // Records created successfully. Redirect to landing page
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (password_verify($_POST['password'], $row['Password'])) {
          $_SESSION['username'] = $username;
          $_SESSION['isLoggedIn'] = true;
          header("location: ../backend/index.php");
        } else {
          $Message_Err = "Username and password are not correct!";
        }
      } else {
        $Message_Err = "Username not found in the system!";
      }
    } else {
      $Message_Err = "System is down. We are trying to fix it! Thank you";
    }
  } else {
    $Message_Err = "System is down. We are trying to fix it! Thank you";
  }

  mysqli_close($link);
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans|Ubuntu Condensed|Baloo 2">
  <link rel="stylesheet" href="./admin-login.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>


  <style>
    .active {
      background-color: #a1c3d1;
      border-radius: 5px;
      padding: 13px;
    }

    #navbarNavAltMarkup .navbar-nav a {
      font-size: 20px;
      padding-left: 30px;
      padding-right: 30px;
      color: black;
      font-family: PT Sans;
      font-style: bold;
      transition: all 0.2s ease;
      border-radius: 5px;
      padding: 13px;
    }

    #navbarNavAltMarkup .navbar-nav a:hover {
      color: white;
      background-color: #a1c3d1;
      border-radius: 5px;
    }

    .rainbow-box {
      text-align: center;
      color: white;
      font-family: Ubuntu Condensed;
      background: linear-gradient(90deg,
          #b39bc8 0%,
          #a1c3d1 200%);
      width: 100%;
      height: 200px;
      border-radius: 5px;
      font-family: Baloo 2;
    }

    body {
      background-color: #f0ebf4;
      margin: 0px;
      padding: 0px;
    }

    #footer {
      color: black;
      background-color: white;
      padding: 30px;
    }

    .navbar {}

    .logo img {
      position: absolute;
      top: 10px;
      left: 0px;
    }

    nav {
      margin-left: 160px;
    }

    .list-group-item {
      padding-left: 0;
    }
  </style>
</head>

<body>
  <header style="background-color: #f0ebf4">
    <a class="logo" href="../index.php" style="padding: 0px"><img src="../assets/images/TOPlogo.gif" alt="Logo image"></img></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-#f0ebf4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../index.php">Home</a>
          <a class="nav-item nav-link" href="./trans-health.php">Navigating Trans Health</a>
          <a class="nav-item nav-link" href="./about-us.php">About Us</a>
          <a class="nav-item nav-link active" style="color: white;" href="./admin-login.php">Login (for Admins only)</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="center">
    <h1>Login</h1>
    <?php
    if (isset($Message_Err) && $Message_Err != "") {
      echo '<p style="text-align: center; color: red">' . $Message_Err . '</p>';
    }
    ?>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="username" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <input type="submit" value="Login">
    </form>
</body>
<footer id="footer">
  <div class="container">
    <p class="float-right">
      <a href="https://twitter.com/tenoaksproject?lang=en" style="color: inherit" target=”_blank”><i class="fa-brands fa-twitter-square"></i></a> &nbsp;
      <a href="https://www.instagram.com/tenoaksproject/?hl=en" style="color: inherit" target=”_blank”> <i class="fa-brands fa-instagram"></i></a> &nbsp;
      <a href="https://www.facebook.com/TenOaks/" style="color: inherit" target=”_blank”><i class="fa-brands fa-facebook-square"></i></a> &nbsp;
    </p>
    <p>Ten Oaks Link</p>
  </div>
</footer>

</html>