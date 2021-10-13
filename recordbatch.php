<?php
include('functions/database.php');
include('functions/process.php');
include('include/header.php')

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

</style>
<body>

  <?php
        $centreBatch = getBatch($_SESSION["currentUser"]["centreName"]);

        echo'
        <p class="text-center fs-1 fw-bolder"> '. $_SESSION["currentUser"]["centreName"] .' </p>

        <div class="card-body" style="">
          <div class="container-sm" style="text-align:center;overflow: auto !important;max-height:375px;">
          <form action="batch.php" method="POST" id="batchForm">
          <table class="table table-striped table-light">
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
                <td><a href="batch.php"><button class="btn btn-outline-primary" onclick="checkBatch(this.value)" name="btnBatch" value="'. $record["batchNo"] .'"> '. $record["batchNo"] .' </button></a></td>
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
        <div class="container-sm border border-secondary">
        <form class="row g-4" action="functions/process.php" method="post">
            <h3 style="text-align:center;">New Batch</h3>
            <div class="col-12" style="width:60%;">
            <label for="batchNo"><b>Batch No.</b></label>
            <?php
            $allBatch = allBatch();
            $rowcount=mysqli_num_rows($allBatch)+1;
            echo' "'.$rowcount.'"
            <input type="hidden" placeholder="Enter Batch No." name="batchNo" required>';?>
            </div>

            <div class="col-md-5">
            <label for="expiryDate"><b>Expiry Date</b></label>
            <input type="date" name="expiryDate" required>
            </div>

            <div class="col-md-6">
        	  <label for="quantityAvailable"><b>Available Quantity</b></label>
            <input type="int" placeholder="Enter Quantity" name="quantityAvailable" required>
            </div>

            <div class="col-md-12">
        	  <label for="vaccineID"><b>Vaccine ID</b> <i class="border tooltip" style="color:black;">?</i><span class="tooltiptext">Tooltip text</span></label>

            <select class="form-select" onchange="validateOptions(this.value)" name="vaccineID" id="vaccineID">
            <option value="'. $record["vaccineID"] .'" selected>Choose Vaccine ID</option>
            <?php
            $allVaccine = findAllVaccine();
            while($record = mysqli_fetch_assoc($allVaccine)){
              echo '<option value= "'.$record["vaccineID"].'">'.$record["vaccineID"].'</option>';
            }
            ?>

            </select>
            </div>

          <?php
            echo'
            <input type="hidden"  value ="'. $_SESSION["currentUser"]["centreName"] .'" name="centreName" required>'
            ?>

          <div class="" style="text-align:center;">
            <button class="btn btn-primary" type="submit" name="recordBatch" style="margin-bottom:1%;">Add</button>
          </div>

        </form>

      </div>


</body>
</html>
