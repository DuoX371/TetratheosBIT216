<?php
include('functions/database.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	  <script src="scripts/jquery.js"></script>
	  <script src="scripts/ajax.js"></script>
</head>
<body>

<h1>The onclick Event</h1>

<p>The onclick event is used to trigger a function when an element is clicked on.</p>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

<div id="loginForm">
	<label for="uname"><b>Username</b></label>
	<input type="text" placeholder="Enter Username" name="username" id="username" required>
	<br>
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="password" id="password" required>

	<button type="button" name="login" id="login" onclick="loginBtn()">Login</button>
<button onclick="myFunction()">Click me</button>
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
function selectVaccine(){
	$.ajax({
		url: 'functions/process.php',
		type: 'POST',
		data:{
			data: "data",
		},
		success:function(response){

		}
	});
}
</script>

</body>
</html>
<?php  ?>
