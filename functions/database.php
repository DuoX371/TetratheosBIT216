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

//find all healthcare centre name
function allHealthcareCentre(){
	global $database;
	$sql = "select * from healthcarecentre";
	return mysqli_query($database, $sql);
}
//register admin
function registerAdmin($username,$pass,$email,$fname,$staffID,$centreName){
  global $database;
  $sql = "insert into user(username, password, email, fullName, userType, staffID, centreName)
  Values('$username', '$pass','$email', '$fname','a', '$staffID', '$centreName')";
  mysqli_query($database, $sql);
}

//register patient
function registerPatient($username,$pass,$email,$fname,$icp){
  global $database;
  $sql = "insert into user(username, password, email, fullName, userType, ICPassport)
  Values('$username', '$pass','$email', '$fname','p', '$icp')";
  mysqli_query($database, $sql);
}

//find the current user
function findUser(){
  global $database;
  $sql = "select * from user";
  return mysqli_query($database, $sql);
}

//check if batch already exist and retrieve batch data
function checkBatch($batchNo){
  global $database;
  $sql = "select * from batch where batchNo = '$batchNo'";
  return mysqli_query($database, $sql);
}

//Retrieve batches from a centre
function getBatch($centreName){
    global $database;
    $sql = "select b.batchNo, expiryDate, quantityAvailable, quantityAdministered, b.vaccineID, vaccinationID, centreName, v.vaccineName from batch as b inner join vaccine as v on v.vaccineID = b.vaccineID where centreName = '$centreName' group by b.batchNo";
    return mysqli_query($database, $sql);
}

//Add new batch
function recordBatch($batchNo,$expiryDate,$quantityAvailable,$vaccineID,$centreName){
  global $database;
  $sql = "insert into batch(batchNo, expiryDate, quantityAvailable, quantityAdministered, vaccineID, vaccinationID, centreName)
  Values('$batchNo','$expiryDate','$quantityAvailable',0,'$vaccineID',0,'$centreName')";
  mysqli_query($database, $sql);
}

//check if batch already exist and retrieve batch data
function checkVaccination($batchNo){
  global $database;
  $sql = "select * from vaccination where batchNo = '$batchNo'";
  return mysqli_query($database, $sql);
}

//Retrieve vaccination from batch
function getVaccination($batchNo){
    global $database;
    $sql = "select b.batchNo, expiryDate, quantityAvailable, quantityAdministered, b.vaccineID, vaccinationID, centreName, v.vaccineName from vaccination as v inner join batch as b on b.batchNo = v.batchNo where vaccinationID = '$vaccinationID'";
    return mysqli_query($database, $sql);
}

//Retrieve user,batch and vaccine from vaccination
function getVaccinationDetails($vaccinationID){
    global $database;
    $sql = "select vion.vaccinationID, vion.batchNo, b.expiryDate, u.fullName, v.vaccineName, v.manufacturer, v.vaccineID from vaccination as vion inner join batch as b on vion.batchNo = b.batchNo inner join user as u on vion.vaccinationID = u.vaccinationID inner join vaccine as v on vion.batchNo = v.batchNo where vion.vaccinationID= '$vaccinationID'";
    return mysqli_query($database, $sql);
}

//Retrieve centreName of administator account
function findCentreName($userName){
  global $database;
  $sql = "select * from user where centreName = '$centreName'";
  return mysqli_query($database, $sql);  return $result;
}

//Update vaccination status and remarks
function updateVaccinationStatusRemarks($status, $remark, $vaccinationID){
  global $database;
  $sql = "update vaccination set status = '$status', remark = '$remark' where vaccinationID = '$vaccinationID'";
  return mysqli_query($database, $sql);
}
?>
