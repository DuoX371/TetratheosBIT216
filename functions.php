<?php
function jsalert($alert){
  echo "<script> alert('" . $alert . "')</script>";
}

function gopage($gopage){
  echo "<script>window.location.href='$gopage' </script>";
}

 ?>
