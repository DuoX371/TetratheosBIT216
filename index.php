<!DOCTYPE HTML>
<html>
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

</form>
</body>
</html>
<?php
?>
