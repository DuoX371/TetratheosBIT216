<?php
include('functions/database.php');
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

  <?php
  if(isset($_POST["btnBatch"])){
  	$batchNo = $_POST["btnBatch"];
    $batchInfo = checkBatch($batchNo);
  }

  //$batchInfo = checkBatch(1);
    echo'
    <h1>Batch ' .$batchNo. '</h1>
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

    $vaccinationInfo = checkVaccination($batchNo);
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



    while($record = mysqli_fetch_assoc($vaccinationInfo)){
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


      echo'
      </table>
    </div>';


   ?>
</body>
</html>
