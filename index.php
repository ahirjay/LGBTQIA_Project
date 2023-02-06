<!--Page Name: index.php
	
    By: Huy Vo
    Student ID: 040993746
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is the home page of the project to welcome users.
    Functions: Page has been divided to show events. It also has a form for user to subscribe to upcoming events.
 -->

<!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans|Ubuntu Condensed|Baloo 2">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <style>
    .card-img {
      transition: opacity 0.5s;
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }

    .card:hover .card-img {
      opacity: 0.3;
    }

    .main-img {
      height: calc(30vw + 17px);
    }

    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.5s;
    }

    .card:hover .card-img-overlay {
      opacity: 1;
    }

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

    .logo img {
      position: absolute;
      top: 10px;
      left: 0px;
    }

    nav {
      margin-left: 160px;
    }

    .btn-outline-success {
      color: #b39bc8;
      border-color: #b39bc8;
    }

    .btn-outline-success:hover {
      color: white;
      background-color: #b39bc8;
      border-color: #b39bc8;
    }
  </style>
</head>

<body>
  <script type="text/javascript">
    const seeMore = (sectionID) => {
      console.log('helloWorld');
      const more = document.getElementById("SeeMore" + sectionID);
      const btn = document.getElementById("button" + sectionID);

      if (more.style.display === "none") {
        more.style.display = "block";
        btn.innerHTML = btn.innerHTML.replace("more", "less");
      } else {
        more.style.display = "none";
        btn.innerHTML = btn.innerHTML.replace("less", "more");
      }
    }
  </script>
  <header>
    <a class="logo" href="#" style="padding: 0px"><img src="./assets/images/TOPlogo.gif" alt="Logo image"></img></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-#f0ebf4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="./index.php" style="color: white;">Home</a>
          <a class="nav-item nav-link" href="./src/trans-health.php">Navigating Trans Health</a>
          <a class="nav-item nav-link" href="./src/about-us.php">About Us</a>
          <a class="nav-item nav-link" href="./src/admin-login.php">Login (for Admins only)</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="rainbow-box jumbotron">
      <h1>Welcome!</h1>
      <p class="lead">Our website provides information on 2SLGBTQ+ community-friendly organizations, resources, and local events in Ottawa. </p>

      <!-- <style>
      p {
        height: fit-content
      }

    </style> -->
    </div>

    <div class="container" style="width: 100% ;font-family: Ubuntu Condensed;">
      <form action="index.php" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search for resources" aria-label="Search" name="searchterm">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

      <br>
      <?php
      // Include config file
      require_once "./backend/shared/config.php";
      $sql = "";
      $attributeArray = ['Phone', 'Email', 'Website', 'Advocacy', 'Outreach', 'CommunityCare', 'Text', 'Programming'];

      if (isset($_GET['searchterm']) && trim($_GET['searchterm']) != "") {
        $param_id = trim($_GET["searchterm"]);
        $sql = $sql = "SELECT * FROM Resources  WHERE ResourceName LIKE '%$param_id%' OR Description LIKE '%$param_id%'";
        $stmt = mysqli_prepare($link, $sql);

        if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);
          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
              echo '<div class="row">';
              echo '<div class="col-12">';
              echo '<div class="card bg-light text-black" style="height: calc(100% - 16px)">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">' . $row['ResourceName'] . '</h5>';
              echo '<p class="card-text">';

              $descriptionArray = explode('- ', $row['Description']);
              foreach ($descriptionArray as $description) {
                if (empty($description)) {
                  continue;
                }
                echo '- ' . $description;
                echo '<br>';
              }
              echo '</p>';
              echo '<ul class="list-group list-group-flush ">';
              foreach ($attributeArray as $attribute) {
                if (isset($row[$attribute])) {
                  if ($attribute == 'Phone' || $attribute == 'Text') {
                    $processedPhone = str_replace(' ext. ', ';', $row[$attribute]);
                    echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="tel:' . $processedPhone . '">' . $row[$attribute] . '</a></li>';
                  } else if ($attribute == 'Email') {
                    echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="mailto:' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                  } else if ($attribute == 'Website' || $attribute == 'Advocacy' || $attribute == 'CommunityCare' || $attribute == 'Programming' || $attribute == 'Outreach') {
                    echo '<li class="list-group-item bg-light">' . $attribute . ': <a target="_blank" href="' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                  } else {
                    echo '<li class="list-group-item bg-light">' . $attribute . ': ' . $row[$attribute] . '</li>';
                  }
                }
              }
              echo '</ul>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }

            // Free result set
            mysqli_free_result($result);
          } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      } else {
        $sql = "SELECT * FROM Resources JOIN Sections ON Resources.SectionID = Sections.SectionID ORDER BY Resources.SectionID"; // Tom : changed from $sql = "SELECT * FROM employee";
        // Attempt select query execution
        $section = 0;
        $sectionName = "";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_array($result)) {
              if ($row['SectionID'] != $section) {
                if ($section != 0) {
                  echo '</div>';
                  echo '<button id="button' . ($row['SectionID'] - 1) . '"class="btn btn-outline-primary my-2 my-sm-0" onclick="seeMore(' . ($row['SectionID'] - 1)  . ')">See more ' . $sectionName . '</button>';
                  echo '<br>';
                }
                echo '<br>';

                echo '<h2>' . $row['SectionName'] . '</h2>';
                $section = $row['SectionID'];
                $sectionName = $row['SectionName'];
                echo '<br>';

                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="card bg-light text-black" style="height: calc(100% - 16px)">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['ResourceName'] . '</h5>';
                echo '<p class="card-text">';

                $descriptionArray = explode('- ', $row['Description']);
                foreach ($descriptionArray as $description) {
                  if (empty($description)) {
                    continue;
                  }
                  echo '- ' . $description;
                  echo '<br>';
                }
                echo '</p>';
                echo '<ul class="list-group list-group-flush ">';
                foreach ($attributeArray as $attribute) {
                  if (isset($row[$attribute])) {
                    if ($attribute == 'Phone' || $attribute == 'Text') {
                      $processedPhone = str_replace(' ext. ', ';', $row[$attribute]);
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="tel:' . $processedPhone . '">' . $row[$attribute] . '</a></li>';
                    } else if ($attribute == 'Email') {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="mailto:' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                    } else if ($attribute == 'Website' || $attribute == 'Advocacy' || $attribute == 'CommunityCare' || $attribute == 'Programming' || $attribute == 'Outreach') {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a target="_blank" href="' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                    } else {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': ' . $row[$attribute] . '</li>';
                    }
                  }
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div id="SeeMore' . $row['SectionID'] . '" style="display: none;">';
              } else {

                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="card bg-light text-black" style="height: calc(100% - 16px)">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['ResourceName'] . '</h5>';
                echo '<p class="card-text">';

                $descriptionArray = explode('- ', $row['Description']);
                foreach ($descriptionArray as $description) {
                  if (empty($description)) {
                    continue;
                  }
                  echo '- ' . $description;
                  echo '<br>';
                }
                echo '</p>';
                echo '<ul class="list-group list-group-flush ">';
                foreach ($attributeArray as $attribute) {
                  if (isset($row[$attribute])) {
                    if ($attribute == 'Phone' || $attribute == 'Text') {
                      $processedPhone = str_replace(' ext. ', ';', $row[$attribute]);
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="tel:' . $processedPhone . '">' . $row[$attribute] . '</a></li>';
                    } else if ($attribute == 'Email') {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a href="mailto:' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                    } else if ($attribute == 'Website' || $attribute == 'Advocacy' || $attribute == 'CommunityCare' || $attribute == 'Programming' || $attribute == 'Outreach') {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': <a target="_blank" href="' . $row[$attribute] . '">' . $row[$attribute] . '</a></li>';
                    } else {
                      echo '<li class="list-group-item bg-light">' . $attribute . ': ' . $row[$attribute] . '</li>';
                    }
                  }
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
            echo '</div>';
            echo '<button id="button' . ($section) . '"class="btn btn-outline-primary my-2 my-sm-0" onclick="seeMore(' . $section  . ')">See more ' . $sectionName . '</button>';
            echo '<br>';


            // Free result set
            mysqli_free_result($result);
          } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }


      ?>
      <br><br>
      <h2 class="text-center">Here are our upcoming events (hover to see details)</h2>
      <br>
      <?php


      // Attempt select query execution
      $sql = "SELECT * FROM Events ORDER BY EventDate LIMIT 3";
      if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {

          echo '<div class="row">';
          $row = mysqli_fetch_array($result);
          echo '<div class="col-7">';

          echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)">';
          echo '<img class="card-img main-img" src="./assets/images/' . $row['EventImage'] . '"alt="Event Image">';
          echo '<div class="card-img-overlay">';
          echo '<h5 class="card-title">' . $row['EventName'] . '</h5>';
          echo '<p class="card-text">' . $row['EventDescription'] . '</p>';
          echo '<p class="card-text">Event Date: ' . $row['EventDate'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';



          $row = mysqli_fetch_array($result);
          echo '<div class="col-5">';

          echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)/2">';
          echo '<img class="card-img" src="./assets/images/' . $row['EventImage'] . '"alt="Event Image">';
          echo '<div class="card-img-overlay">';
          echo '<h5 class="card-title">' . $row['EventName'] . '</h5>';
          echo '<p class="card-text">' . $row['EventDescription'] . '</p>';
          echo '<p class="card-text">Event Date: ' . $row['EventDate'] . '</p>';
          echo '</div>';
          echo '</div>';

          $row = mysqli_fetch_array($result);
          echo '<div class="card bg-light text-black mb-3" style="height: calc(100% - 16px)/2">';
          echo '<img class="card-img" src="./assets/images/' . $row['EventImage'] . '"alt="Event Image">';
          echo '<div class="card-img-overlay">';
          echo '<h5 class="card-title">' . $row['EventName'] . '</h5>';
          echo '<p class="card-text">' . $row['EventDescription'] . '</p>';
          echo '<p class="card-text">Event Date: ' . $row['EventDate'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo "</div>";



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