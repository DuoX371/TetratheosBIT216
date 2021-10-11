<?php
include('functions/database.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<h1>The onclick Event</h1>

<p>The onclick event is used to trigger a function when an element is clicked on.</p>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

<form action="functions/process.php" method="POST" id="loginForm">
	<label for="uname"><b>Username</b></label>
	<input type="text" placeholder="Enter Username" name="username" id="username">
	<br>
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="password" id="password">

	<button type="submit" name="login" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
</form>

<div class="alert alert-warning alert-dismissible fade show" style="display:none;" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<!-- Modal -->
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

<label for="vaccine">Select Vaccine:</lebel>
	<select name="vaccine" id="vaccine">
		<option value="test">Test</option>
		<?php
		//while ($record = )
		?>
		<option value="test1">test1</option>
		<option value="test2">Test2</option>
		<option value="test3">Test3</option>
	</select>

<script>
// function selectVaccine(){
// 	$.ajax({
// 		url: 'functions/process.php',
// 		type: 'POST',
// 		data:{
// 			data: "data",
// 		},
// 		success:function(response){
//
// 		}
// 	});
// }

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
  keyboard: false
})
</script>
<script src="scripts/ajax.js"></script>
</body>
</html>
<?php  ?>
