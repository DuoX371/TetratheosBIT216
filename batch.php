<?php
include('database.php');
?>
<!DOCTYPE HTML>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
  <h1>Batch 1</h1>
  <?php
    $batchInfo = checkBatch(1);
    echo'
    <div class="card-body">
      <div>
      <table>
        <tr>
          <th>Expiry Date</th>
          <th>Available Quantity</th>
          <th>Pending Quantity</th>
          <th>Administred Quantity</th>
        </tr>';

    while($record = mysqli_fetch_assoc($batchInfo)){
      echo '
        <tr>
          <td> '. $record["expiryDate"] .' </td>
          <td> '. $record["quantityAvailable"] .' </td>
          <td> '. $record["quantityPending"] .' </td>
          <td> '. $record["quantityAdministered"] .' </td>
        </tr>';

      echo '<div class="mydivider"></div>';
        }
      echo'
      </table>
      </div>
    </div>';

    $batchInfo = checkBatch(1);
    echo'
    <div class="card-body">
      <div>
      <table>
        <tr>
          <th>Vaccination ID</th>
          <th>Status</th>
          <th>Appointment Date</th>
        </tr>';

    while($record = mysqli_fetch_assoc($batchInfo)){
      echo '
        <tr>
          <td> '. $record["expiryDate"] .' </td>
          <td> '. $record["quantityAvailable"] .' </td>
          <td> '. $record["quantityPending"] .' </td>
          <td> '. $record["quantityAdministered"] .' </td>
        </tr>';

      echo '<div class="mydivider"></div>';
        }
      echo'
      </table>
      </div>
    </div>';


   ?>
</body>
</html>
