<!--Page Name: about-us.php
	
    By: Keshav Sandhu
    Student ID: 040994718
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is display information for users to learn more about this project.
    Functions: Shows a brief description about Ten Oaks Project as well as the momentum behind this project.
 -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>About Us</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans|Ubuntu Condensed|Baloo 2">
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
      background-color: #a1c3d1;
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
  <header>
    <a class="logo" href="../index.php" style="padding: 0px"><img src="../assets/images/TOPlogo.gif" alt="Logo image"></img></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-#f0ebf4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../index.php">Home</a>
          <a class="nav-item nav-link" href="./trans-health.php">Navigating Trans Health</a>
          <a class="nav-item nav-link active" style="color: white;" href="./about-us.php">About Us</a>
          <a class="nav-item nav-link" href="./admin-login.php">Login (for Admins only)</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="rainbow-box jumbotron">
      <h1>About Us!</h1>
    </div>
    <div class="container" style="width: 100% ;font-family: Ubuntu Condensed;">
      <p>The 2SLGBT+ is a collective term that refers to two-spirit, lesbian, gay, bisexual, transgender, or queer. As this movement gains momentum and more resources are becoming available for 2SLGBTQ+ members and ideas change. There becomes a need not only for resources but also for ways to connect people in need with these resources. In addition, over the past few decades, various 2SLGBTQ+ organizations in the world have been founded in order to provide guidance and informative resources. </p>
      <p>Similarly, There have been several organizations in the Ottawa area which are helping the community but unfortunately not many are aware of it, or they are run at a small scale. These organizations are operated independently and do not have a uniform platform to advertise their services and events. Due to several reasons such as some organizations do not have enough funds and technical expertise to support advertising their services on websites, applications, newspapers, and advertisements on the radio. The challenges are humongous and to overcome these challenges. Our client, Charlie Dazé from the TenOaks project organization, wants to create an online platform to help the 2SLGBTQ+ community. We as a team come up with a solution for hosting the website 2SLGBTQ+.</p>
      <p>An 2SLGBTQ+ website is designed and analyzed for Ten Oaks Project company on the basis of functionality, friendly user interface, and cost efficiency to help users in Ottawa to get the 2SLGBTQ+ resources in less time cost. Furthermore, users can also download the information from a large database such as addresses of events or organizations, hotlines, or specific contactors of an 2SLGBTQ+ organization. The website also contains the functionality to redirect the user to the organization's home page in case they are looking for more than contact information. The goal is to help users get better knowledge about 2SLGBTQ+ and promote the development of diverse communities. Basically, the user can download massive information about LBGTQIA+ and other resources about events and organizations. Although people from all over the Internet can access our website, the targeting group of users for this website will be people in the Ottawa area. In addition, only 2SLGBTQ+ organizations in Ottawa will be mentioned on the website. Besides, our project will not be available on mobile platforms like iOS and Android. </p>

    </div>
  </main>

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