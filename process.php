<?php
include_once "database.php";
require "functions.php";

//register admin
if(isset($_POST["registerAdmin"])){
  $username = $_POST["username"];
  $pass = $_POST["pass"];
  $email = $_POST["email"];
  $fname = $_POST["fname"];
  $staffID = $_POST["staffid"];

  if(!mysqli_num_rows(checkUser($username)) > 0){
    registerAdmin($username,$pass,$email,$fname,$staffID);
    jsalert("Success");
    gopage("index.php");
    return;
  }
  jsalert("Username already exist");
  gopage("index.php");
}

//register patient
if(isset($_POST["registerPatient"])){
  $username = $_POST["username"];
  $pass = $_POST["pass"];
  $email = $_POST["email"];
  $fname = $_POST["fname"];
  $icp = $_POST["icp"];

  if(!mysqli_num_rows(checkUser($username)) > 0){
    registerPatient($username,$pass,$email,$fname,$icp);
    jsalert("Success");
    gopage("index.php");
    return;
  }
  jsalert("Username already exist");
  gopage("index.php");
}
?>