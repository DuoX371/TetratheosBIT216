<?php
include "functions/database.php";
include "functions/functions.php";
include "include/header.php";
?>
<head>
	<style>
.fade-in {
	opacity: 1;
	animation-name: fadeInOpacity;
	animation-iteration-count: 1;
	animation-timing-function: ease-in;
	animation-duration: 0.5s;
}

@keyframes fadeInOpacity {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}
</style>
</head>
<div class="container">
	<table class="table">
		<thead class="thead-dark">
	  <tr>
	    <th>Vaccine Name</th>
	    <th>Manufacturer</th>
			<th>Please Choose</th>
	  </tr>
	</thead>
		<?php
		$findAllVaccineBatch = findAllVaccine();
		  while($record = mysqli_fetch_assoc($findAllVaccineBatch)){
		 ?>
	  <tr>
	    <td><?php echo $record["vaccineName"] ?></td>
	    <td><?php echo $record["manufacturer"] ?></td>
			<td><?php echo "<button type='button' class='btn btn-primary' onclick='displayVacccine(this.value)' value='" . $record["vaccineID"] . "'>Select</button>";?></td>
	  </tr>
	<?php } ?>
	</table>
<br>
	<table id="tableLocation" class="fade-in table" hidden>
		<tr>
	    <th>Healthcare Centre</th>
	    <th>Address</th>
			<th>Please Choose</th>
	  </tr>
		<tbody>
		</tbody>
	</table>
<br>
	<table id="batchInfo" class="fade-in table" hidden>
		<tr>
			<th>Batch Number available</th>
			<!-- <th>Quantity Available</th> -->
			<th>Please Choose</th>
		</tr>
		<tbody>
		</tbody>
	</table>
<br>
	<table id="batchInfoDetailer" class="fade-in table" hidden>
		<tr>
			<th>Expiry Date</th>
			<th>Quantity Available</th>
			<th>Please Choose</th>
		</tr>
		<tbody>
		</tbody>
	</table>
</div>

	<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="confirmModalLabel">Confirm</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
				<form action="functions/process.php" method="POST" id="submitAppointment">
	      <div class="modal-body">
					<h4>Vaccine Name</h4>
					<div id="selectedVaccine">
					</div>
					<br>
					<h4>Healthcare Centre</h4>
					<div id="selectedCentre">
					</div>
					<br>
					<h4>Expiry Date</h4>
					<div id="selectedExpiryDate">
					</div>
					<br>
					Please select a date for your appointment
					<input type="date" id="date" name="date" required>
					<br>
					<div id="responseI" style="padding-top: 20px;">
					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" id="btnSub" class="btn btn-primary">Save changes</button>
	      </div>
			</form>
	    </div>
	  </div>
	</div>


	<div class="position-fixed top-0 end-0 p-3" style="z-index:1000">
	  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-header">
				<i class="bi bi-exclamation-triangle-fill pe-1" style="color:#FFC170;"></i>
	      <strong class="me-auto text-warning">  Error</strong>
	      <small>Just Now</small>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	      Please login <a href='login.php'>here<a> to continue.
	    </div>
	  </div>
	</div>

	<form action="functions/process.php" method="POST">
		<button type="Submit" name="logout" class="btn btn-success">Logout</button>
	</form>
	<script src="scripts/ajax.js"></script>
</html>
