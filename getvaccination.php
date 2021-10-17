<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>

<?php
$q = $_GET['q'];
$con = mysqli_connect("localhost","root","","tetratheos");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql = "select vaccinationID, status, remark, batchNo, expiryDate, fullName, vaccineName, manufacturer, vaccineID from user join vaccination using (username) join batch using (batchNo) join vaccine using (vaccineID) where vaccinationID ='$q'";
$result = mysqli_query($con,$sql);

echo '
<form action="functions/process.php" method="POST" id="updateVaccinationStatusRemarks">

<table class="table table-striped table-light" style="text-align:center;">
<tr>
  <th>Vaccination ID</th>
  <th>Batch No.</th>
  <th>Patient Full Name</th>
  <th>Expiry Date.</th>
  <th>Vaccine Name</th>
  <th>Manufacturer</th>
  <th>Vaccine ID</th>
  <th>Status</th>
  <th>chgStatus</th>
  <th>Remark</th>


</tr>';
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row["vaccinationID"] . "</td>";
  echo "<td>" . $row["batchNo"] . "</td>";
  echo "<td>" . $row["fullName"] . "</td>";
  echo "<td>" . $row["expiryDate"] . "</td>";
  echo "<td>" . $row["vaccineName"] . "</td>";
  echo "<td>" . $row["manufacturer"] . "</td>";
  echo "<td>" . $row["vaccineID"] . "</td>";
  echo "<td>" . $row["status"] . "</td>";

  echo'
    <td>
      <select name="status" id="status">
        <option value="pending">Pending</option>
        <option value="confirmed">Confirmed</option>
        <option value="rejected">Rejected</option>
        <option value="administered">Administered</option>
      </select>

    </td>
  <td><input type="text" id="remark" name="remark" placeholder="'. $row["remark"] .'"></td>
  <input type="hidden" id="vaccinationID" name="vaccinationID" value ="'. $row["vaccinationID"] .'" placeholder="'. $row["vaccinationID"] .'">
  <td><input type="submit" value="Submit" name="updateVaccinationStatusRemarks"></td>
  ';

  echo "</tr>";
}
echo "</table></form>";
mysqli_close($con);
?>


</body>


</html>
