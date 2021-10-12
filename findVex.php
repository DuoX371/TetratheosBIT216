<?php
include "functions/database.php";
include "functions/functions.php";
?>

<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
	<table>
	  <tr>
	    <th>Vaccine Name</th>
	    <th>Manufacturer</th>
			<th>Please Choose</th>
	  </tr>
		<?php
		$findAllVaccineBatch = findAllVaccine();
		  while($record = mysqli_fetch_assoc($findAllVaccineBatch)){
		 ?>
	  <tr>
	    <td><?php echo $record["vaccineName"] ?></td>
	    <td><?php echo $record["manufacturer"] ?></td>
			<td><?php echo "<button onclick='displayVacccine(this.value)' value='" . $record["vaccineID"] . "'>Select</button>";?></td>
	  </tr>
	<?php } ?>
	</table>
<br>
	<table id="tableLocation" hidden>
		<tr>
	    <th>Healthcare Centre</th>
	    <th>Address</th>
			<th>Please Choose</th>
	  </tr>
		<tbody>
		</tbody>
	</table>
<br>
	<table id="batchInfo" hidden>
		<tr>
			<th>Batch Number available</th>
			<!-- <th>Quantity Available</th> -->
			<th>Please Choose</th>
		</tr>
		<tbody>
		</tbody>
	</table>
<br>
	<table id="batchInfoDetailer" hidden>
		<tr>
			<th>Expiry Date</th>
			<th>Quantity Available</th>
			<th>Please Choose</th>
		</tr>
		<tbody>
		</tbody>
	</table>
	<!-- Modal -->
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
	<script src="scripts/ajax.js"></script>
	<script>

	</script>
</html>
