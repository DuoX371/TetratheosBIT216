<?php
include('database.php');
?>
<!DOCTYPE HTML>
<html>
<head>


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

    $vaccinationInfo = checkVaccination(1);
    echo'
    <div class="card-body">
      <div>
      <table>
        <tr>
          <th>Vaccination ID</th>
          <th>Status</th>
          <th>Appointment Date</th>
          <th>Batch No.</th>

        </tr>';

    /*function getVaccinationIDArray($vaccinationID){
      $vaccinationIDArray = $record["vaccinationID"];
      echo 'hi';
    }*/

    while($record = mysqli_fetch_assoc($vaccinationInfo)){
      //$vaccinationIDArray = "";
      //<td><button onclick="'getVaccinationIDArray($record["vaccinationID"])'"> '. $record["vaccinationID"] .' </button></td>
      echo '
        <tr>
          <td><button onclick="getVaccinationDetails(this.value)" value="'. $record["vaccinationID"] .'"> '. $record["vaccinationID"] .' </button></td>
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

    <div id="txtHint"><b>Vaccination info will be listed here...</b>
    </div>';

    //$vaccinationDetails = getVaccinationDetails($vaccinationIDArray);

    /*echo'
    <div class="card-body">
      <div>
      <table>
        <tr>
          <th>Vaccination ID</th>
          <th>Batch No.</th>
          <th>Patient Full Name</th>
          <th>Expiry Date.</th>
          <th>Vaccine Name</th>
          <th>Manufacturer</th>
          <th>Vaccine ID</th>

        </tr>

      <div id="txtHint"><b>Person info will be listed here...</b></div>';


    while($record = mysqli_fetch_assoc($vaccinationDetails)){
      echo '
        <tr>
          <td> '. $record["vaccinationID"] .' </td>
          <td> '. $record["batchNo"] .' </td>
          <td> '. $record["fullName"] .' </td>
          <td> '. $record["expiryDate"] .' </td>
          <td> '. $record["vaccineName"] .' </td>
          <td> '. $record["manufacturer"] .' </td>
          <td> '. $record["vaccineID"] .' </td>

        </tr>';

      echo '<div class="mydivider"></div>';
    }*/
      echo'
      </table>
    </div>';


   ?>
</body>
</html>
