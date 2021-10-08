<?php
  if(!isset($_SESSION["currentUser"])){
    jsalert("Please re-login.");
    gopage("index.php");
  }
 ?>
