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

</style>
</head>
<div class="container">
	<table class="table">
		<thead class="thead-dark">
	  <tr>
	    <th>Centre Name</th>
	    <th>Vacine</th>
			<th>Appointment</th>
			<th>Status</th>
			<th>Remarks</th>
	  </tr>
	</thead>
	<?php
	$pAppInfo = patientAppointmentDisplay($_SESSION["currentUser"]["username"]);
	while($record = mysqli_fetch_assoc($pAppInfo)){
	 ?>
	 <tr>
		 <td><?php echo $record["centreName"] ?></td>
		 <td><?php echo $record["vaccineName"] ?></td>
		 <td><?php echo $record["appointmentDate"] ?></td>
		 <td><?php echo $record["status"] ?></td>
		 <td><?php echo $record["remark"] ?></td>
	 </tr>
 <?php } ?>

		</table>
</div>

</html>
