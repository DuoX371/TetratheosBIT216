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

echo $centreName;
  if(!mysqli_num_rows(checkUser($username)) > 0){
    registerAdmin($username,$pass,$email,$fname,$staffID,$centreName);
    jsalert("Success");
    gopage("/tetratheos/index.php");
    return;
  }
  jsalert("Username already exist");
  gopage("/tetratheos/register.php");
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
    gopage("/tethratheos/index.php");
    return;
  }
  jsalert("Username already exist");
  gopage("/tethratheos/index.php");
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

//Update vacccination status and remarks
if(isset($_POST["updateVaccinationStatusRemarks"])){
  $status = $_POST["status"];
  $remark = $_POST["remark"];
  $vaccinationID = $_POST["vaccinationID"];

  updateVaccinationStatusRemarks($status,$remark,$vaccinationID);
  jsalert("Success");
    //gopage("/tetratheos/index.php");
}

//display vaccine information
if(isset($_POST["selectVaccine"])){
	$vaccineID = $_POST["vaccineID"];
	$allVaccineBatch = findAllVaccineBatch($vaccineID);
	$vaccineBtchInfo = array();
	while($record = mysqli_fetch_assoc($allVaccineBatch)){
		array_push($vaccineBtchInfo, $record);
	}
	echo json_encode($vaccineBtchInfo);
}


//display batch information base on centre name
if(isset($_POST["selectCentre"])){
	$centreName = $_POST["centreName"];
	$vaccineID = $_POST["vaccineID"];
	if(isset($_SESSION["currentUser"])){
		$findBatchInfo = findBatchInfo($centreName,$vaccineID);
		$batchInfo = array();
		while($record = mysqli_fetch_assoc($findBatchInfo)){
			array_push($batchInfo, $record);
		}
		echo json_encode($batchInfo);
		return;
	}
	else{
		echo false;
		return;
	}
}

//display batchInfo based on selected batch
if(isset($_POST["batchInfoDetailed"])){
	$batchNo = $_POST["batchNo"];
	$findBatchInfoDetailed = findBatchInfoDetailed($batchNo);
	$batchInfoDetailed = array();
	while($record = mysqli_fetch_assoc($findBatchInfoDetailed)){
		array_push($batchInfoDetailed, $record);
	}
	echo json_encode($batchInfoDetailed);
}

//patient request appointment
if(isset($_POST["displayAppointmentDetails"])){
	$batchNo = $_POST["batchNo"];
	$selectedBatchDetails = selectedBatchDetails($batchNo);
	$selectedDetails = array();
	while($record = mysqli_fetch_assoc($selectedBatchDetails)){
		array_push($selectedDetails, $record);
	}
	echo json_encode($selectedDetails);
}

if(isset($_POST["submitAppointment"])){
	$batchNo = $_POST["batchNo"];
	$expiryDate = $_POST["expiryDate"];
	$date = $_POST["date"];
	$username = $_SESSION["currentUser"]["username"];

	if($date < $expiryDate){
		insertAppointment($date,$batchNo,$username);
		echo "a";
		return;
	}
	echo "b";
	echo "Appointment date cannot be after expiry date";
	return;
}
?>
