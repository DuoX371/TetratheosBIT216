<?php
include "functions/database.php";
include "functions/functions.php";
include "include/header.php";
//include('functions/session_checker_admin.php');
?>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>

</style>
</head>
<div class="container">
	<h1>Pending</h1>
	<table class="table">
		<thead class="thead-dark">
	  <tr>
	    <th>Patient Full Name</th>
	    <th>IC / Passport No.</th>
			<th>Batch Number</th>
			<th>Expiry Date</th>
			<th>Manufacturer</th>
			<th>Vaccine</th>
			<th>Select</th>
	  </tr>
	</thead>
	<?php
	$confirmedVac = getAppointment("confirmed", $_SESSION["currentUser"]["centreName"]);
	while($record = mysqli_fetch_assoc($confirmedVac)){
	 ?>
	 <tr>
		 <td><?php echo $record["fullName"] ?></td>
		 <td><?php echo $record["ICPassport"] ?></td>
		 <td><?php echo $record["batchNo"] ?></td>
		 <td><?php echo $record["expiryDate"] ?></td>
		 <td><?php echo $record["manufacturer"] ?></td>
		 <td><?php echo $record["vaccineName"] ?></td>
		 <td><button type='button' class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#confirmation"
			 <?php echo "onclick='passModal(this.value)' id='' value='".$record['vaccinationID']."'>" ?>
			 Select</button> </td>
	 </tr>
 <?php } ?>

		</table>
		<h1 style="padding-top:20px;">Administered</h1>
		<table class="table">
			<thead class="thead-dark">
		  <tr>
		    <th>Patient Full Name</th>
		    <th>IC / Passport No.</th>
				<th>Batch Number</th>
				<th>Expiry Date</th>
				<th>Manufacturer</th>
				<th>Vaccine</th>
		  </tr>
		</thead>
		<?php
		$administredVac = getAppointment("Administered", $_SESSION["currentUser"]["centreName"]);
		while($record = mysqli_fetch_assoc($administredVac)){
		 ?>
		<tr>
		 <td><?php echo $record["fullName"] ?></td>
 		 <td><?php echo $record["ICPassport"] ?></td>
 		 <td><?php echo $record["batchNo"] ?></td>
 		 <td><?php echo $record["expiryDate"] ?></td>
 		 <td><?php echo $record["manufacturer"] ?></td>
 		 <td><?php echo $record["vaccineName"] ?></td>
		</tr>
	<?php } ?>
</table>
		<!-- Modal -->
		<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="confirmationContent" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="confirmationContent">Confirmation</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
					<form action="functions/process.php" method="POST" id="confirmAdministered">
			      <div class="modal-body">
			        Are you sure you want to administer this appointment?
							<div id=vaccinationIDC></div>
							<div id="responseA" style="padding-top:20px;"></div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
			        <button type="submit" class="btn btn-primary" id="subBtn">Yes</button>
			      </div>
					</form>
		    </div>
		  </div>
		</div>
</div>
<script>
function passModal(vaccinationID){
	document.getElementById("vaccinationIDC").innerHTML = `<input name='vaccinationID' value='${vaccinationID}' hidden>`;
}
var confirmAdministeredFrm = $('#confirmAdministered');
confirmAdministeredFrm.submit(function(e){
	document.getElementById("subBtn").disabled = true;
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: confirmAdministeredFrm.serialize()+"&confirmAdministered=",
		success: function(response){
			console.log(response);
			if(response){
				document.getElementById("responseA").innerHTML = `
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Successfully Administered!</strong> Redirecting in 3...
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;
				return setTimeout(() => window.location.href='administer.php',3000)
			}
			document.getElementById("responseA").innerHTML = `
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Administered Failed!</strong> There are no available quantity left for this batch.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>`;
			document.getElementById("subBtn").disabled = false;
			return;
		},
		error: function(data) {
			console.log("fail");
		}
		})
});
</script>

</html>
