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

	if(isset($_POST["inputCentre"])){
		$inputCentre = $_POST["inputCentre"];
		$inputCentreAdd = $_POST["inputCentreAdd"];
		if(!mysqli_num_rows(checkUser($username)) > 0){
			createCentre($inputCentre,$inputCentreAdd);
	    registerAdmin($username,$pass,$email,$fname,$staffID,$inputCentre);
	    echo true;
	    return;
	  }
	}
	else if(isset($_POST["centreName"])){
		$centreName = $_POST["centreName"];
		if(!mysqli_num_rows(checkUser($username)) > 0){
	    registerAdmin($username,$pass,$email,$fname,$staffID,$centreName);
	    echo true;
	    return;
	  }
	}
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

	if($vaccineID != "validate"){
	  recordBatch($batchNo,$expiryDate,$quantityAvailable,$vaccineID,$centreName);
	  jsalert("Success");
	  gopage("/tetratheos/recordBatch.php");
	  return;
	}
	jsalert("Please Choose Vaccine ID");
	gopage("/tetratheos/recordBatch.php");
}

//Update vacccination status and remarks
if(isset($_POST["updateVaccinationStatusRemarks"])){
  $batchNo = $_POST["batchNo"];
  $status = $_POST["status"];
  $remark = $_POST["remark"];
  $vaccinationID = $_POST["vaccinationID"];

  $selectBatch = checkBatch($batchNo);
  while($record = mysqli_fetch_assoc($selectBatch)){
    if($record['quantityAvailable'] < 0) return;
    $numL = $record['quantityAvailable'] - 0;
    $numP = $record['quantityPending'] - 1;
    $numT = $record['quantityAdministered'] + 0;
    updateQuantity($numL, $numT, $numP, $record['batchNo']);
  }

  updateVaccinationStatusRemarks($status, $remark, $vaccinationID);
  $selectVaccination = selectVaccination($vaccinationID);
  while($row = mysqli_fetch_assoc($selectVaccination)){
	  $selectUser = checkUser($row['username']);
	  while($r = mysqli_fetch_assoc($selectUser)){
		  mail($r['email'],"Vaccination Status","I am here to inform you that your vaccination status is $status", "From: tetratheos@tetra.com");
	  }
  }
  jsalert("Success");
  gopage("/tetratheos/recordbatch.php");
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
			if($record["expiryDate"] > date("Y-m-d")){
				array_push($batchInfo, $record);
			}
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

//submit appointment
if(isset($_POST["submitAppointment"])){
	$batchNo = $_POST["batchNo"];
	$expiryDate = $_POST["expiryDate"];
	$date = $_POST["date"];
	$username = $_SESSION["currentUser"]["username"];
	if($date < $expiryDate){
		if($date > date("Y-m-d")) {
			if(!mysqli_num_rows(checkAppointment($batchNo, $username)) > 0){
				insertAppointment($date,$batchNo,$username);
				$selectBatch = checkBatch($batchNo);
				while($record = mysqli_fetch_assoc($selectBatch)){
					$numL = $record['quantityAvailable'] - 0;
					$numP = $record['quantityPending'] + 1;
					$numT = $record['quantityAdministered'] + 0;
					updateQuantity($numL, $numT, $numP, $record['batchNo']);
				}
				echo "a";
				return;
		  }else{
				echo "c";
				return;
			}
		}
	}
	//if date is before expiry date
	echo "b";
	return;
}

if(isset($_POST["confirmAdministered"])){
	$vaccinationID = $_POST["vaccinationID"];
	$vaccinationBatchInfo = getBatchVaccination($vaccinationID);
	while($record = mysqli_fetch_assoc($vaccinationBatchInfo)){
		if($record['quantityAvailable'] <= 0) return;
		$numL = $record['quantityAvailable'] - 1;
    $numP = $record['quantityPending'] - 0;
		$numT = $record['quantityAdministered'] + 1;
		updateQuantity($numL, $numT, $numP, $record['batchNo']);
		updateAdministered($vaccinationID);
		echo "success";
	}
}

if(isset($_POST["logout"])){
	unset($_SESSION["currentUser"]);
	echo true;
}
?>
