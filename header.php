<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Happy Faces|Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="icofont/css/icofont.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/style.css" rel="stylesheet">
</head>
  <body>
    <!-- Navigation -->
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
			<div class="container-fluid">
		    <img src="images/logo.png" ALT="" WIDTH=80 HEIGHT=80>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">SURF AS A GUEST</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"></a>
							<div class="dropdown">
		    				<a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
		    			<div class="dropdown-menu">
		        		<a href="login_gur.php" class="dropdown-item">Login_gurdian</a>
		        		<a href="login_cen.php" class="dropdown-item">Login_center</a>
		    			</div>
						</div>

						</li>
						<li class="nav-item">
							<a class="nav-link"></a>
							<div class="dropdown">
		    				<a href="#" class="dropdown-toggle" data-toggle="dropdown">SIGNUP</a>
		    			<div class="dropdown-menu">
		        		<a href="signup_gur.html" class="dropdown-item">Signup_gurdian</a>
		        		<a href="signup_cen.html" class="dropdown-item">Signup_center</a>
		    			</div>
						</div>
						</li>
						<li class="nav-item">
							<button class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
						</li>
						<li class="nav-item">
							<div class="search-container">
								<form>
									<input type="text" placeholder="Search.." name="search">
									<button type="submit" value="search">Search<i class="fa fa-search"></i></button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

  </body>
</html>
