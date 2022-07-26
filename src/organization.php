<!--Page Name: organization.php
	
    By: Yitao Cui
    Student ID: 040981835
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Purpose: This page will list all the Partner 2SLGBT+ Organizations in Ottawa Area
    Functions: Page has been put into differnt blocks for each organizations, Each block
        contain the logo of the organization, the name of organization as well as
        background about the organization, user can visit the organization's home 
        page by clicked on the organization name
 -->

<!DOCTYPE html>
<html>

<head>
<title>Organization</title>
<script src="https://kit.fontawesome.com/00cef6843f.js"
	crossorigin="anonymous"></script>
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<style>
#box {
	width: 380px;
	margin: 45px auto;
}

#content {
	border: 2px solid lime;
	border-radius: 25px;
	margin-left: 20px;
	margin-right: 20px;
	padding: 10px;
	display: flex;
}



#imgDiv {
	height: 200px;
	width: 200px;
	float: left;
	margin-left: 10px;
	Display: block;
}

#txtDiv {
	height: 200px;
	width: 600px;
	float: left;
	padding: 0px
}
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
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarTogglerDemo03"
			aria-controls="navbarTogglerDemo03" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="./index.php"><img src="../assets/images/TOPlogo.gif" alt="Logo image" style="float:left;padding-top:150px;"></img></a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item "><a class="nav-link" href="../index.php">Home </a>
				</li>
				<div id="active">
				<li class="nav-item active"><a class="nav-link"
					href="./organization.php">Organization</a></li></div>
				<li class="nav-item"><a class="nav-link" href="./resource.php">Resource</a>
				</li>
				<li class="nav-item"><a class="nav-link" href="./about-us.php">About
						Us</a></li>
				<li class="nav-item"><a class="nav-link" href="./admin-login.php">Admin
						Login</a></li>

			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search"
					placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<!-- -----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------- -->
	<main>
		<div class="rainbow-box jumbotron">
			<h1 class="p1">Organizations</h1>
			<p class="lead">2SLGBTQ+ Organizations in Ottawa</p>
		</div>

		<div id="box">
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search"
					placeholder="Search for orgnization" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>

		<div class="container" style="width: 100%">
			<div class="row">
				<div id="imgDiv">
					
					<img src="../assets/images/3.png" width="180" height="150">
					
				</div>
				<div id="txtDiv">
					<h3 class="p1">
						<a href="https://www.tenoaksproject.org/">Ten Oak Project</a>
					</h3>
					<p class="p3">The Ten Oaks Project engages and connects children
						and youth from 2SLGBTQ+ communities through programs and
						activities rooted in play.</p>
				</div>
			</div>
			<br /> <br /> <br />
			<div class="row">

				<div id="imgDiv">
				
					<img src="../assets/images/2.jpg" width="180" height="150">
					
				</div>
				<div id="txtDiv">
					<h3 class="p1">
						<a href="https://www.tenoaksproject.org/">Ten Oak Project</a>
					</h3>
					<p class="p3">Orgnization back ground.Orgnization back
						ground.Orgnization back ground. Orgnization back
						ground.Orgnization back ground.Orgnization back ground.
						Orgnization back ground.Orgnization back ground.Orgnization back
						ground.</p>
				</div>
			</div>
			<br /> <br /> <br />
			<div class="row">
				<div id="imgDiv">
					
					<img src="../assets/images/1.jpg" width="180" height="150">
					
				</div>
				<div id="txtDiv">
					<h3 class="p1">
						<a href="https://www.tenoaksproject.org/">Ten Oak Project</a>
					</h3>
					<p class="p3">Orgnization back ground.Orgnization back
						ground.Orgnization back ground. Orgnization back
						ground.Orgnization back ground.Orgnization back ground.
						Orgnization back ground.Orgnization back ground.Orgnization back
						ground.</p>
				</div>
			</div>
		</div>
	</main>

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