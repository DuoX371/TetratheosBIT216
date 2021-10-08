<!DOCTYPE html>
<html>
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

<script>
function loginBtn(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	$.ajax({
		url: 'process.php',
		type: 'POST',
		data:{
			username: username,
			password: password,
			login:'',
		},
		success:function(response){
			console.log(response);
			if(response == 'a'){
				window.location.href='index.php';
			}else if(response == 'p'){
				window.location.href='index.php';
			}else alert("Incorrect login details");
		},
		error: function(data) {
			console.log("fail");
		}
	});
}


</script>
  <script src="jquery.js"></script>
</body>
</html>
<?php  ?>
