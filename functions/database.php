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

//nav bar status check
function checkStatus($username){
  global $database;
  $sql = "select * from vaccination join user using(username) where username = '$username'";
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

function createCentre($inputCentre,$inputCentreAdd){
	global $database;
  $sql = "insert into healthcarecentre(centreName, address)
  Values('$inputCentre', '$inputCentreAdd')";
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

//Retrieve all batch
function allBatch(){
  global $database;
  $sql = "select * from batch";
  return mysqli_query($database, $sql);
}
//check if batch already exist and retrieve batch data
function checkBatch($batchNo){
  global $database;
  $sql = "select * from batch where batchNo = '$batchNo'";
  return mysqli_query($database, $sql);
}

//check if batch already exist and retrieve batch data
function checkBatch2($vaccineID){
  global $database;
  $sql = "select * from batch where batchNo = '$vaccineID'";
  return mysqli_query($database, $sql);
}

//Retrieve batches from a centre
function getBatch($centreName){
    global $database;
    $sql = "select b.batchNo, expiryDate, quantityAvailable, quantityAdministered, b.vaccineID, centreName, v.vaccineName from batch as b inner join vaccine as v on v.vaccineID = b.vaccineID where centreName = '$centreName' group by b.batchNo";
    return mysqli_query($database, $sql);
}

//Add new batch
function recordBatch($batchNo,$expiryDate,$quantityAvailable,$vaccineID,$centreName){
  global $database;
  $sql = "insert into batch(batchNo, expiryDate, quantityAvailable, quantityAdministered, vaccineID, centreName)
  Values('$batchNo','$expiryDate','$quantityAvailable',0,'$vaccineID','$centreName')";
  mysqli_query($database, $sql);
}

//check if batch already exist and retrieve batch data
function checkVaccination($batchNo){
  global $database;
  $sql = "select * from vaccination where batchNo = '$batchNo' and status = 'Pending'";
  return mysqli_query($database, $sql);
}

//Retrieve user,batch and vaccine from vaccination
function getVaccinationDetails($vaccinationID){
    global $database;
    $sql = "select vion.vaccinationID, vion.batchNo, b.expiryDate, u.fullName, v.vaccineName, v.manufacturer, v.vaccineID from vaccination as vion inner join batch as b on vion.batchNo = b.batchNo inner join user as u on vion.vaccinationID = u.vaccinationID inner join vaccine as v on vion.batchNo = v.batchNo where vion.vaccinationID= '$vaccinationID'";
    return mysqli_query($database, $sql);
}

//Update vaccination status and remarks
function updateVaccinationStatusRemarks($status, $remark, $vaccinationID){
  global $database;
  $sql = "update vaccination set status = '$status', remark = '$remark' where vaccinationID = '$vaccinationID'";
  return mysqli_query($database, $sql);
}

//Retrieve all vaccine information
function findAllVaccine(){
  global $database;
  $sql = "select * from vaccine";
  $result = mysqli_query($database, $sql);
  return $result;
}

//Retrieve all vaccine and batches information based on input vaccineID
function findAllVaccineBatch($vaccineID){
  global $database;
  $sql = "select DISTINCT centreName, address, vaccineID from vaccine join batch using (vaccineID) join healthcarecentre using (centreName) where vaccineID ='$vaccineID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

//find all batch based on input centre name
function findBatchInfo($centreName,$vaccineID){
  global $database;
  $sql = "select * from batch join healthcarecentre using (centreName) where centreName ='$centreName' and vaccineID ='$vaccineID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

//find batch info detailed versiion
function findBatchInfoDetailed($batchNo){
	global $database;
  $sql = "select * from batch where batchNo ='$batchNo'";
  $result = mysqli_query($database, $sql);
  return $result;
}
//display batch details based on selected batch no
function selectedBatchDetails($batchNo){
	global $database;
  $sql = "select * from vaccine join batch using (vaccineID) where batchNo ='$batchNo'";
	//join vaccination using(batchNo) join user using (username)
  $result = mysqli_query($database, $sql);
  return $result;
}
//submit appointment
function insertAppointment($date,$batchNo,$username){
	global $database;
	$sql = "insert into vaccination(appointmentDate, status, remark, batchNo, username)
	values('$date', 'Pending', '', '$batchNo', '$username')";
	mysqli_query($database, $sql);
}
//validate appointment
function checkAppointment($batchNo, $username){
	global $database;
  $sql = "select * from vaccination where batchNo = '$batchNo' and username = '$username' and status != 'rejected'";
  return mysqli_query($database, $sql);
}
//display patient appointment
function patientAppointmentDisplay($username){
	global $database;
	$sql = "select healthcarecentre.centreName, vaccineName, appointmentDate, status, remark
	FROM vaccine join batch using (vaccineID) join healthcarecentre using (centreName)
	join vaccination using (batchNo) join user using (username) where username ='$username'";
	return mysqli_query($database, $sql);
}

//get appointment based on status
function getAppointment($status, $centreName){
	global $database;
	$sql = "select fullName,ICPassport,batchNo,expiryDate,manufacturer,vaccineName,vaccinationID FROM user
	join vaccination using (username) join batch using (batchNo) join vaccine using (vaccineID)
	where status = '$status' and batch.centreName = '$centreName'";
	return mysqli_query($database, $sql);
}

//select vaccination join batchNo
function getBatchVaccination($vaccinationID){
	global $database;
	$sql = "select * FROM vaccination join batch using (batchNo) where vaccinationID = $vaccinationID";
	return mysqli_query($database, $sql);
}
//update quantity
function updateQuantity($numL, $numT, $numP, $batchNo){
	global $database;
	$sql = "update batch SET quantityAvailable = $numL, quantityAdministered= $numT, quantityPending= $numP WHERE batchNo = $batchNo";
	mysqli_query($database, $sql);
}
//update administered
function updateAdministered($vaccinationID){
	global $database;
	$sql = "update vaccination SET status = 'Administered' WHERE vaccinationID = $vaccinationID";
	mysqli_query($database, $sql);
}
//select vaccination info
function selectVaccination($vaccinationID){
  global $database;
  $sql = "select * from vaccination where vaccinationID = $vaccinationID";
  return mysqli_query($database, $sql);
}
?>
