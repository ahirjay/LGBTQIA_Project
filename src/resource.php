<!--Page Name: resource.php
	
    By: Jay Ahir
    Student ID: 040833312
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is to show different resources a user can access from different organizations.
    Functions: Page has been divided to show resources. A resource consists of title, author name and description. A user can
		learn more about resources if they click on it.
 -->

<!DOCTYPE html>
<html>

<head>
	<title>Resource</title>
	<script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./resource.css" />

<style>
      #navbarTogglerDemo03 ul #active li a{
      color: white;
      background:linear-gradient(
        90deg,
        rgba(255, 0, 0, 1) 0%,
        rgba(255, 154, 0, 1) 10%,
        rgba(208, 222, 33, 1) 20%,
        rgba(79, 220, 74, 1) 30%,
        rgba(63, 218, 216, 1) 40%,
        rgba(47, 201, 226, 1) 50%,
        rgba(28, 127, 238, 1) 60%,
        rgba(95, 21, 242, 1) 70%,
        rgba(186, 12, 248, 1) 80%,
        rgba(251, 7, 217, 1) 90%,
        rgba(255, 0, 0, 1) 100%
    );
    }
    #navbarTogglerDemo03  ul li a{
      font: normal 20px "Open Sans";
      padding: 16px;
      padding-left:30px;
      padding-right:30px;
      color:#B01CCA;
      font-style:open sans;
      transition: all 0.2s ease;
    }
    #navbarTogglerDemo03  ul li a:hover{
      color:white;
      background:linear-gradient(
        90deg,
        rgba(255, 0, 0, 1) 0%,
        rgba(255, 154, 0, 1) 10%,
        rgba(208, 222, 33, 1) 20%,
        rgba(79, 220, 74, 1) 30%,
        rgba(63, 218, 216, 1) 40%,
        rgba(47, 201, 226, 1) 50%,
        rgba(28, 127, 238, 1) 60%,
        rgba(95, 21, 242, 1) 70%,
        rgba(186, 12, 248, 1) 80%,
        rgba(251, 7, 217, 1) 90%,
        rgba(255, 0, 0, 1) 100%
    );
    }
      #footer {
        color: white;
        background: linear-gradient(
        90deg,
        #A51D95 20%,
	#FE0C0C 80%
);
        padding: 30px;
    }
      .rainbow-box{
	border-top:3px;
	border-bottom:0px;
	border-left:0px;
	border-right:0px;
	border-style: solid;
	border-color:#DFDFDF
;
	text-shadow: 2px 2px black;
	text-align:center;
	color:white;
    	width: 100%;
    	height: 200px;
    	border-radius: 5px;
    	background: linear-gradient(
        90deg,
        #A51D95 20%,
	#FE0C0C 80%
    );
}
</style>

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:56px;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="./index.php"><img src="../assets/images/TOPlogo.gif" alt="Logo image" style="float:left;padding-top:150px;"></img></a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./organization.php">Organization</a>
				</li>
				<div id="active">
				<li class="nav-item active">
					<a class="nav-link" href="./resource.php">Resource</a>
				</li>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="./about-us.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./admin-login.php">Admin Login</a>
				</li>

			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<main>
		<div class="rainbow-box jumbotron">
			<h1>Resources</h1>
			<p class="lead">Where you can find our resources</p>
		</div>

		</br>
		<div class = "container">
			</br>
			<div class=ResourceCard>
				<div class=OrganizationImage>
					<div class=OrganizationTitle>
						<a>Resource 1</a>
					</div>
					<div class=OrganizationBy>
						<a> by xyz</a>
					</div>
					<div class=ServiceDetails>
						<a>we provide this and that services<br>
							please contact by on 123-456-789</a>
					</div>
				</div>
			</div>

			</br>


			<div class="ResourceCard">
				<div class="OrganizationImage">
					
					<div class="OrganizationTitle">
						<a>Resource 2</a>
					</div>
					<div class="OrganizationBy">
						<a> by abc</a>
					</div>
					<div class="ServiceDetails">
						<a>we provide this and that services<br>
							please contact by on 123-456-789</a>
					</div>
				</div>
			</div>

			</br>


			<div class="ResourceCard">
				<div class="OrganizationImage">
					<div class="OrganizationTitle">
						<a>Resource 3</a>
					</div>
					<div class="OrganizationBy">
						<a> by jay</a>
					</div>
					<div class="ServiceDetails">
						<a>we provide this and that services<br>
							please contact by on 123-456-789</a>
					</div>
				</div>
			</div>
		</div>
		</br>
	</main>

	<!--
	</br>
	<div>
	<div class = "LeftArrange">
	<div class = "SubscriptionText">
	<a>&nbsp&nbsp&nbsp Subscribe for upcoming events         &nbsp</a>
	</div>
	</div>
	<div class = "RightArrange">
	<div class = "Email-Input">	
	</div>
	</div>
	<div class = "SubscribeButton">
	<a>Subcribe</a>
	</div>
	</div>
	-->


</body>
 <footer id="footer" class="my-3">
    <div class="container">
      <p class="float-right">
        <i class="fa-brands fa-twitter-square"></i> &nbsp;
        <i class="fa-brands fa-instagram"></i> &nbsp;
        <i class="fa-brands fa-facebook-square"></i> &nbsp;
      </p>
      <p>Ten Oaks Link</p>
    </div>
  </footer>

</html>