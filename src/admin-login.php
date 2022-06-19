<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="admin-login.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../index.php">LGBTQIA+ Project</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./organization.php">Organization</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./resource.php">Resource</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about-us.php">About Us</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="./admin-login.php">Admin Login</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="center">
        <h1>Login</h1>
        <form method="post">
          <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input type="password" required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass">Forgot Password?</div>
          <input type="submit" value="Login">
          <div class="signup_link">
             <a href="#"> </a>
          </div>
          <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <i class="fa-brands fa-twitter-square"></i> &nbsp;
        <i class="fa-brands fa-instagram"></i> &nbsp;
        <i class="fa-brands fa-facebook-square"></i> &nbsp;
      </p>
      <p>Ten Oaks Link</p>
        </form>
      </div>
  </footer>
</body>

</html>