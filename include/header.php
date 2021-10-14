<?php
echo'
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Thetratheos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.php">Tetratheos</a></h1>';
if(isset($_SESSION["currentUser"])){
	if($_SESSION["currentUser"]["userType"] == "a"){
	echo '
	      <nav id="navbar" class="navbar">
	        <ul>
	          <li><a class="nav-link scrollto active" href="recordBatch.php">Home</a></li>
						<label class="ps-3 text text-light">Welcome, '.$_SESSION["currentUser"]["fullName"].'</label>
	          <li><a class="getstarted scrollto" href="login.php">Logout</a></li>
	        </ul>
	        <i class="bi bi-list mobile-nav-toggle"></i>
	      </nav><!-- .navbar -->

	    </div>
	  </header><!-- End Header -->';
	}
	elseif($_SESSION["currentUser"]["userType"] == "p"){
		echo '
		      <nav id="navbar" class="navbar">
					<ul>
						<li><a class="nav-link scrollto active" href="findVex.php">Home</a></li>
						<label class="ps-3 text text-light">You are logged in as '.$_SESSION["currentUser"]["fullName"].'</label>
						<li><a class="getstarted scrollto" href="login.php">Logout</a></li>
					</ul>
		        <i class="bi bi-list mobile-nav-toggle"></i>
		      </nav><!-- .navbar -->

		    </div>
		  </header><!-- End Header -->';
	}
}else{
	echo '
	      <nav id="navbar" class="navbar">
	        <ul>
	          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
	          <li><a class="nav-link scrollto" href="#about">About</a></li>
	          <li><a class="nav-link scrollto" href="#services">Services</a></li>
	          <li><a class="nav-link scrollto" href="#portfolio">Appointment</a></li>
	          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
	          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
	        </ul>
	        <i class="bi bi-list mobile-nav-toggle"></i>
	      </nav><!-- .navbar -->

	    </div>
	  </header><!-- End Header -->';
}
?>
