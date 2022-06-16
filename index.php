<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <style>
    .card-img {
      transition: opacity 0.5s;
    }

    .card:hover .card-img {
      opacity: 0.3;
    }

    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.5s;
    }

    .card:hover .card-img-overlay {
      opacity: 1;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="./index.php">LGBTQIA+ Project</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./src/organization.php">Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/resource.php">Resource</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/about-us.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./src/admin-login.php">Admin Login</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

  </header>

  <main>
    <div class="jumbotron text-center">
      <h1>This is a homepage!</h1>
      <p class="lead">Welcome to our website</p>
    </div>
    <!-- <style>
      p {
        height: fit-content
      }
    </style> -->


    <div class="container" style="width: 60%">
      <h2 class="text-center">Here are our upcoming events (hover to see details)</h2>
      <br>
      <div class="row">
        <div class="col-6">

          <div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">
            <img class="card-img" src="./assets/card.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title">Light card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>


          </div>
        </div>
        <div class="col-6">

          <div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">
            <img class="card-img" src="./assets/card.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title">Light card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>


          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">

          <div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">
            <img class="card-img" src="./assets/card.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title">Light card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>


          </div>

        </div>
        <div class="col-6">

          <div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">
            <img class="card-img" src="./assets/card.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h5 class="card-title">Light card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>


          </div>

        </div>
      </div>





    </div>

  </main>


  <footer class="text-muted my-3">
    <div class="container">
      <p class="float-right">
        <i class="fa-brands fa-twitter-square"></i> &nbsp;
        <i class="fa-brands fa-instagram"></i> &nbsp;
        <i class="fa-brands fa-facebook-square"></i> &nbsp;
      </p>
      <p>Ten Oaks Link</p>
    </div>
  </footer>
</body>

</html>