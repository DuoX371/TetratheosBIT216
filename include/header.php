<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tetratheos</title>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.php">Tetratheos</a></h1>
<?php
//<label class="ps-3 text text-light">You are logged in as '.$_SESSION["currentUser"]["fullName"].'</label>
if(isset($_SESSION["currentUser"])){
	if($_SESSION["currentUser"]["userType"] == "a"){
	echo '
	      <nav id="navbar" class="navbar">
	        <ul>
	          <li><a class="nav-link scrollto" href="recordBatch.php">Home</a></li>
						<li class="dropdown"><a href="#"><span>'.$_SESSION["currentUser"]["fullName"].'</span></a>
	          <li><a class="getstarted" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a></li>';
	}
	elseif($_SESSION["currentUser"]["userType"] == "p"){
		echo '
		      <nav id="navbar" class="navbar">
					<ul>
						<li><a class="nav-link scrollto" href="index.php#">Home</a></li>
						<li><a class="nav-link scrollto" href="findVex.php">Appointment</a></li>
					<li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
					<li class="dropdown"><a href="#"><span>'.$_SESSION["currentUser"]["fullName"].'</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="appointments.php">My Appointments</a></li>
					</ul>
						<li><a class="getstarted" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a></li>';

	}
}else{
	echo '
	      <nav id="navbar" class="navbar">
	        <ul>
	          <li><a class="nav-link scrollto" href="index.php#">Home</a></li>
	          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
	          <li><a class="nav-link scrollto" href="findVex.php">Appointment</a></li>
	          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
	          <li><a class="getstarted" href="login.php">Login</a></li>
						<li><a class="getstarted" href="register.php">Register</a></li>';
}
?>
</ul>
<i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
</div>
</header><!-- End Header -->'

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="modalC">
				Are you sure u want to logout?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<form action="functions/process.php" action="POST" id="logout">
				<button type="submit" class="btn btn-primary">Yes</button>
			</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var logoutFrm = $('#logout');
logoutFrm.submit(function(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: "logout=",
		success: function(response){
			console.log(response);
			if(response){
				document.getElementById("modalC").innerHTML +=
				`<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:20px;">
				  <strong>Success!</strong> You have logged out.
					Redirecting...
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>`;
					setTimeout(function(){window.location.href='index.php';},1000);
			}

		},
		error: function(data) {
			console.log("fail");
		}
	});
});
</script>
