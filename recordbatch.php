<?php
include('functions/database.php');
include('functions/process.php');

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
  </head>
<style>
table, th, td {
  border:1px solid black;
}

.my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<body>
</div>
  <?php
        $centreBatch = getBatch($_SESSION["currentUser"]["centreName"]);

        echo'
        <h1> '. $_SESSION["currentUser"]["centreName"] .' </h1>

        <div class="card-body">
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <form action="batch.php" method="POST" id="batchForm">
          <table class="table table-bordered table-striped mb-0">
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
