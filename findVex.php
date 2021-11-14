<?php
//include "functions/database.php";
include "functions/functions.php";
include "include/header.php";
?>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	<script src="scripts/ajax.js"></script>
</html>
