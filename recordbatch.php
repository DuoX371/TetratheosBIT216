<?php
include('functions/database.php');
include('functions/process.php');

?>
<!DOCTYPE HTML>
<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tetratheos - Administrator</title>
  </head>
<style>
.table {
  height: 50px;
  overflow: visible !important;
}
</style>
<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <?php
        $centreBatch = getBatch($_SESSION["currentUser"]["centreName"]);

        echo'
        <h1> '. $_SESSION["currentUser"]["centreName"] .' </h1>

        <div class="card-body">
          <div>
          <form action="batch.php" method="POST" id="batchForm">
          <table class="table table-striped" style="overflow: visible !important;">
            <tr>
              <th>Batch No.</th>
              <th>Expiry Date</th>
              <th>Available Quantity</th>
              <th>Administred Quantity</th>
              <th>Vaccine ID</th>
              <th>Vaccine Name</th>
            </tr>';

//                <td><a href="batch.php"> '. $record["batchNo"] .' </a></td>

          while($record = mysqli_fetch_assoc($centreBatch)){
            echo '
              <tr>
                <td><a href="batch.php"><button onclick="checkBatch(this.value)" name="btnBatch" value="'. $record["batchNo"] .'"> '. $record["batchNo"] .' </button></a></td>
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
          </form>
          </div>
        </div>';
        ?>

        <form action="functions/process.php" method="post">

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
