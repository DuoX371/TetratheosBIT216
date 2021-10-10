<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
echo $q;
$con = mysqli_connect("localhost","root","","tetratheos");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql = "select vion.vaccinationID, vion.batchNo, b.expiryDate, u.fullName, v.vaccineName, v.manufacturer, v.vaccineID from vaccination as vion inner join batch as b on vion.batchNo = b.batchNo inner join user as u on vion.vaccinationID = u.vaccinationID inner join vaccine as v on vion.batchNo = v.batchNo where vion.vaccinationID= '$q'";
$result = mysqli_query($con,$sql);

echo '<table>
<tr>

  <th>Vaccination ID</th>
  <th>Batch No.</th>
  <th>Patient Full Name</th>
  <th>Expiry Date.</th>
  <th>Vaccine Name</th>
  <th>Manufacturer</th>
  <th>Vaccine ID</th>

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
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
