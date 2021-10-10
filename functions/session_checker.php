<?php
  if(!isset($_SESSION["currentUser"])){
    jsalert("Please re-login.");
    gopage("index.php");
  }

  if(!isset($_SESSION["currentBatch"])){
    jsalert("Batch unavailable.");
    //gopage("index.php");
  }
 ?>
