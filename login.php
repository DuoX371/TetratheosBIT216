<?php
include('functions/database.php');
?>
<!DOCTYPE HTML>
<html>
<link rel="icon" href="https://i.imgur.com/NGC9N4k.png" type="image/icon type">
<title>Tetratheos</title>
<head>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.register{
	padding: 3%;
	margin-top: 8%
}

.register-left{
	text-align: center;
	color: #fff;
	margin-top: 4%;
}
.register-left input{
	border: none;
	border-radius: 1.5rem;
	padding: 2%;
	width: 60%;
	background: #f8f9fa;
	font-weight: bold;
	color: #383d41;
	margin-top: 30%;
	margin-bottom: 3%;
	cursor: pointer;
}
.register-right{
	background: #f8f9fa;
	border-top-left-radius: 10% 50%;
	border-bottom-left-radius: 10% 50%;
}
.register-left img{
	margin-top: 15%;
	margin-bottom: 5%;
	width: 25%;
	-webkit-animation: mover 2s infinite  alternate;
	animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
	0% { transform: translateY(0); }
	100% { transform: translateY(-20px); }
}
@keyframes mover {
	0% { transform: translateY(0); }
	100% { transform: translateY(-20px); }
}
.register-left p{
	font-weight: lighter;
	padding: 12%;
	margin-top: -9%;
}
.register .register-form{
	padding: 10%;
	margin-top: 10%;
}
.btnRegister{
	float: right;
	margin-top: 10%;
	border: none;
	border-radius: 1.5rem;
	padding: 2%;
	background: #0062cc;
	color: #fff;
	font-weight: 600;
	width: 100%;
	cursor: pointer;
}
.register .nav-tabs{
	margin-right: 3%;
	margin-top: 3%;
	border: none;
	background: #0062cc;
	border-radius: 1.5rem;
	width: 28%;
	float: right;
}
.register .nav-tabs .nav-link{
	padding: 2%;
	height: 34px;
	font-weight: 600;
	color: #fff;
	border-top-right-radius: 1.5rem;
	border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
	border: none;
}
.register .nav-tabs .nav-link.active{
	color: #0062cc;
	border: 2px solid #0062cc;
	border-top-left-radius: 1.5rem;
	border-bottom-left-radius: 1.5rem;
}
.register-heading{
	text-align: center;
	margin-top: 8%;
	margin-bottom: -15%;
	color: #495057;
}
.form-group{
	padding-bottom: 20px;
}
</style>
<body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">
	<div class="register">
		<div class ="container">
			<div class="row">
				<div class="col-md-3 register-left">
					<a href="index.php"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/></a>
					<h3>Welcome</h3>
					<p>Join us now at Tetratheos to get your vaccination done!</p>
					<a href="register.php"><input type="submit" name="" value="Register"/></a><br/>
				</div>
				<div class="col-md-9 register-right">
					<div class="tab-pane fade show active">
						<h3 class="register-heading">Login</h3>
						<form action="functions/process.php" method="POST" id="loginForm">
							<div class="row register-form">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Username *" name="username" id="username"/>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password *" name="password" id="password"/>
									</div>
									<input class="btnRegister" type="submit" name="login" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Login"/>
								</div>
								<div class="col-md-3">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login Status</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="modalContent">
				</div>
			</div>
		</div>
	</div>
	<script src="scripts/ajax.js"></script>
</body>
</html>
