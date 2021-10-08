<?php
include('database.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js">
document.getElementById("login").addEventListener("click","loginBtn");
var frm = $('#loginForm');
function loginBtn(){
	$.ajax({
		url: 'process.php',
		type: 'POST',
		data: frm.serialize(),
		success:function(response){
			console.log(response);
			console.log("success");
			// Whatever you want to do after the form is successfully submitted
		}
		error: function(data) {
			console.log("fail");
		}
	});
}

function test(){
	console.log("a");
}

function test1(){
	console.log("a");
}

// frm.submit(function(e){
// 	e.preventDefault();
// 	$.ajax({
// 		url: 'process.php',
// 		type: 'POST',
// 		data: frm.serialize(),
// 		success:function(response){
// 			console.log(response);
// 			console.log("success");
// 			// Whatever you want to do after the form is successfully submitted
// 		}
// 		error: function(data) {
// 			console.log("fail");
// 		}
// 	});
// 	return false;
// });


</script>
</head>
<body>
<form action="process.php" method="post">
  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

	<label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

	<label for="fname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fname" required>

  <label for="fname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Staff ID" name="staffid" required>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="submit" name="registerAdmin">Register</button>
    <button type="submit" class="submitBtn">Cancel</button>
  </div>

</form>

<form action="process.php" method="post">
  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

	<label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

	<label for="fname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fname" required>
  </div>
  <label for="icp"><b>IC/Passport</b></label>
    <input type="text" placeholder="Enter IC/Passport" name="icp" required>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="submit" name="registerPatient">Register</button>
    <button type="submit" class="submitBtn">Cancel</button>
  </div>

<table>
<?php
  $findUser = findUser();
  if(mysqli_num_rows($findUser)>0){
  while($record = mysqli_fetch_assoc($findUser)) {
  ?>
    <tr>
      <td><?php echo $record['fullName'];?></td>
      <td><?php echo $record['email'];?></td>
      <td><?php echo $record['username'];?></td>
    </tr>
<?php
  }
}else {echo "No Data";}
 ?>
  </table>

</form>

<div>
	<form action="process.php" method="post" name="loginForm" id="loginForm">
	    <label for="uname"><b>Username</b></label>
	    <input type="text" placeholder="Enter Username" name="username" required>
		<br>
	    <label for="psw"><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="password" required>

	    <button type="button" name="login" id="login">Login</button>
	</form>
	<button type="button" name="lodsadasgin" onclick="test1()">Login</button>
</div>

</body>
</html>
