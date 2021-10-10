<?php
include('functions/database.php');
?>
<!DOCTYPE HTML>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
  <h1>Liyue Healthcare Centre</h1>

  <?php

                $centreBatch = getBatch("Liyue Healthcare Centre1");
                echo'
                <div class="card-body">
                  <div>
                  <table>
                    <tr>
                      <th>Batch No.</th>
                      <th>Expiry Date</th>
                      <th>Available Quantity</th>
                      <th>Administred Quantity</th>
                      <th>Vaccine ID</th>
                      <th>Vaccine Name</th>
                    </tr>';


                  while($record = mysqli_fetch_assoc($centreBatch)){
                    echo '
                      <tr>
                        <td><a href="batch.php"> '. $record["batchNo"] .' </a></td>
                        <td> '. $record["expiryDate"] .' </td>
                        <td> '. $record["quantityAvailable"] .' </td>
                        <td> '. $record["quantityAdministered"] .' </td>
                        <td> '. $record["vaccineID"] .' </td>
                        <td> '. $record["vaccineName"] .' </td>
                      </tr>';

                    echo '<div class="mydivider"></div>';
                  }
                    echo'
                  </table>
                  </div>
                </div>';
                ?>

                <form action="process.php" method="post">

                  <div class="container">
                    <label for="batchNo"><b>Batch No.</b></label>
                    <input type="text" placeholder="Enter Batch No." name="batchNo" required>

                    <label for="expiryDate"><b>Expiry Date</b></label>
                    <input type="date" name="expiryDate" required>

                	<label for="quantityAvailable"><b>Available Quantity</b></label>
                    <input type="int" placeholder="Enter Quantity" name="quantityAvailable" required>

                	<label for="vaccineID"><b>vaccineID</b></label>
                    <input type="text" placeholder="Enter Vaccine ID" name="vaccineID" required>

                  <label for="centreName"><b>Centre Name</b></label>
                    <input type="text" placeholder="Enter Centre Name" name="centreName" required>

                  <div class="container" style="background-color:#f1f1f1">
                    <button type="submit" name="recordBatch">Register</button>
                    <button type="submit" class="submitBtn">Cancel</button>
                  </div>

                </form>


</body>
</html>
