<?php
include('functions/database.php');
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	width: 50%;
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
					<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
					<h3>Welcome</h3>
					<p>Join us now at Tetratheos to get your vaccination done!</p>
					<input type="submit" name="" value="Login"/><br/>
				</div>
				<div class="col-md-9 register-right">
					<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Admin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Patient</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<h3 class="register-heading">Register as a Healtcare Administrater</h3>
							<form action="functions/process.php" method="post">
								<div class="row register-form">
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="vaccineCenter" id="vaccineCenter" required>
												<option value="validate" disabled selected hidden>Choose a Healthcare Centre</option>
												<?php
												$allHealthcareCentre = allHealthcareCentre();
												while($record = mysqli_fetch_assoc($allHealthcareCentre)){
													echo '<option value= "'.$record["centreName"].'">'.$record["centreName"].'</option>';
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Username *" name="username" required/>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password *" name="pass" required/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control"  placeholder="Your Email *" name="email" required/>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Full Name *" name="fname" required/>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Staff Id *" name="staffid" required/>
										</div>
										<input type="submit" class="btnRegister"  name="registerAdmin" value="Register"/>
									</div>

								</div>
							</form>
						</div>
						<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<h3  class="register-heading">Register as a Patient</h3>
							<form action="functions/process.php" method="post">
								<div class="row register-form">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Username *" name="username" required/>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password *" name="pass" required/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control"  placeholder="Your Email *" name="email" required/>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Full Name *" name="fname" required/>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your IC/Passport *" name="staffid" required/>
										</div>
										<input type="submit" class="btnRegister" name="registerPatient" value="Register"/>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
