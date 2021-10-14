<?php
include('functions/database.php');
include('include/header.php')
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Tetratheos - Administrator</title>
<script>
function getVaccinationDetails(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getvaccination.php?q="+str,true);
  xmlhttp.send();
}


  </script>


</head>

<style>

</style>
<body>

  <?php
  if(isset($_POST["btnBatch"])){
  	$batchNo = $_POST["btnBatch"];
    $batchInfo = checkBatch($batchNo);
  }

    echo'
    <p class="text-center fs-1 fw-bolder"> Batch ' .$batchNo. '</p>

    <div class="card-body">
    <div class="container-sm" style="overflow: auto;max-height:375px;">
    <table class="table table-striped table-light" style="text-align:center;">
        <tr>
          <th style="border:1px solid black;">Expiry Date</th>
          <th style="border:1px solid black;">Available Quantity</th>
          <th style="border:1px solid black;">Pending Quantity</th>
          <th style="border:1px solid black;">Administred Quantity</th>
        </tr>';

    while($record = mysqli_fetch_assoc($batchInfo)){
      echo '
        <tr>
          <td style="border:1px solid black;"> '. $record["expiryDate"] .' </td>
          <td style="border:1px solid black;"> '. $record["quantityAvailable"] .' </td>
          <td style="border:1px solid black;"> '. $record["quantityPending"] .' </td>
          <td style="border:1px solid black;"> '. $record["quantityAdministered"] .' </td>
        </tr>';

      echo '<div class="mydivider"></div>';
        }
      echo'
      </table>
      </div>
    </div>';

    $vaccinationInfo = checkVaccination($batchNo);
    echo'
    <div class="card-body" >
    <div class="container-sm" style="overflow: auto;max-height:375px;">
    <table class="table table-striped table-light" style="text-align:center;">
        <tr>
          <th>Vaccination ID</th>
          <th>Status</th>
          <th>Appointment Date</th>
          <th>Batch No.</th>

        </tr>';



    while($record = mysqli_fetch_assoc($vaccinationInfo)){
      echo '
        <tr>
          <td><button class="btn btn-secondary" onclick="getVaccinationDetails(this.value)" value="'. $record["vaccinationID"] .'"> '. $record["vaccinationID"] .' </button></td>
          <td> '. $record["status"] .' </td>
          <td> '. $record["appointmentDate"] .' </td>
          <td> '. $record["batchNo"] .' </td>
        </tr>';

      echo '<div class="mydivider"></div>';
        }
      echo'
      </table>
      </div>
    </div>

    <div class="text-center fs-5" id="txtHint"><b>Vaccination info will be listed here...</b>
    </div>';


      echo'
      </table>
    </div>';


   ?>
</body>
</html>
