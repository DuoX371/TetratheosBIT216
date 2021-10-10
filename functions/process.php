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
  $centreName = $_POST["centreName"];

  if(!mysqli_num_rows(checkUser($username)) > 0){
    registerAdmin($username,$pass,$email,$fname,$staffID,$centreName);
		echo true;
    return;
  }
  //jsalert("Username already exist");
	echo false;
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
		echo true;
    return;
  }
	echo false;
}

//login
if(isset($_POST["login"])){
	$username = $_POST["username"];
    $password = $_POST["password"];

	$validateUser = validateUser($username, $password);
	if(mysqli_num_rows($validateUser) > 0){
	      $userDetails = mysqli_fetch_assoc($validateUser);
	      $_SESSION["currentUser"] = $userDetails;
	      if($userDetails["userType"] == "a"){
        echo "a";
	      }
	      elseif($userDetails["userType"] == "p"){
			  echo "p";
	      }
	    } else {
			echo "c";
	    }
	  }
//Add new batch
if(isset($_POST["recordBatch"])){
	$batchNo = $_POST["batchNo"];
	$expiryDate = $_POST["expiryDate"];
	$quantityAvailable = $_POST["quantityAvailable"];
	$vaccineID = $_POST["vaccineID"];
	$centreName = $_POST["centreName"];

	if(!mysqli_num_rows(checkBatch($batchNo)) > 0){
	  recordBatch($batchNo,$expiryDate,$quantityAvailable,$vaccineID,$centreName);
	  jsalert("Success");
	  gopage("/tetratheos/recordBatch.php");
	  return;
	}
	jsalert("Batch No. already exist");
	gopage("/tetratheos/recordBatch.php");
}

//Login batch
if(isset($_POST["btnBatch"])){
	$batchNo = $_POST["btnBatch"];
  checkBatch($batchNo);
  echo $batchNo;
}


?>
