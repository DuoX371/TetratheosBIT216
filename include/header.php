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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.html">Tetratheos</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->';
if(isset($_SESSION["currentUser"])){
	if($_SESSION["currentUser"]["userType"] == "a"){
	echo '
	      <nav id="navbar" class="navbar">
	        <ul>
	          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
	          <li><a class="nav-link scrollto" href="#about">About</a></li>
	          <li><a class="nav-link scrollto" href="#services">Services</a></li>
	          <li><a class="nav-link   scrollto" href="#portfolio">Appoint</a></li>
	          <li><a class="nav-link scrollto" href="#team">Team</a></li>
	          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
	            <ul>
	              <li><a href="#">Drop Down 1</a></li>
	              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
	                <ul>
	                  <li><a href="#">Deep Drop Down 1</a></li>
	                  <li><a href="#">Deep Drop Down 2</a></li>
	                  <li><a href="#">Deep Drop Down 3</a></li>
	                  <li><a href="#">Deep Drop Down 4</a></li>
	                  <li><a href="#">Deep Drop Down 5</a></li>
	                </ul>
	              </li>
	              <li><a href="#">Drop Down 2</a></li>
	              <li><a href="#">Drop Down 3</a></li>
	              <li><a href="#">Drop Down 4</a></li>
	            </ul>
	          </li>
	          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
	          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
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
		          <li><a class="nav-link scrollto active" href="#hero">Patient</a></li>
		          <li><a class="nav-link scrollto" href="#about">About</a></li>
		          <li><a class="nav-link scrollto" href="#services">Services</a></li>
		          <li><a class="nav-link   scrollto" href="#portfolio">Appoint</a></li>
		          <li><a class="nav-link scrollto" href="#team">Team</a></li>
		          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
		            <ul>
		              <li><a href="#">Drop Down 1</a></li>
		              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
		                <ul>
		                  <li><a href="#">Deep Drop Down 1</a></li>
		                  <li><a href="#">Deep Drop Down 2</a></li>
		                  <li><a href="#">Deep Drop Down 3</a></li>
		                  <li><a href="#">Deep Drop Down 4</a></li>
		                  <li><a href="#">Deep Drop Down 5</a></li>
		                </ul>
		              </li>
		              <li><a href="#">Drop Down 2</a></li>
		              <li><a href="#">Drop Down 3</a></li>
		              <li><a href="#">Drop Down 4</a></li>
		            </ul>
		          </li>
		          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
		          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
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
	          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
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
