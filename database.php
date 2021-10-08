<?php
$database = mysqli_connect("localhost","root","","tetratheos");

function validateUser($username, $password){
  global $database;
  $sql = "select * from user where username = '$username' and password = '$password'";
  return mysqli_query($database, $sql);
}

//check if user already exist
function checkUser($username){//check if username exist
  global $database;
  $sql = "select * from user where username = '$username'";
  return mysqli_query($database, $sql);
}

//register admin
function registerAdmin($username,$pass,$email,$fname,$staffID){
  global $database;
  $sql = "insert into user(username, password, email, fullName, userType, staffID)
  Values('$username', '$pass','$email', '$fname','a', '$staffID')";
  mysqli_query($database, $sql);
}

//register patient
function registerPatient($username,$pass,$email,$fname,$icp){
  global $database;
  $sql = "insert into user(username, password, email, fullName, userType, ICPassport)
  Values('$username', '$pass','$email', '$fname','p', '$icp')";
  mysqli_query($database, $sql);
}

function findUser(){
  global $database;
  $sql = "select * from user";
  return mysqli_query($database, $sql);
}


?>
