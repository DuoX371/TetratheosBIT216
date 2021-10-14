<?php
//admin
	if(!isset($_SESSION["currentUser"])){
		echo "<script>window.location.href='accessdenied'</script>";
	}else{
		if($_SESSION["currentUser"]["userType"] != "a"){
			echo "<script>window.location.href='accessdenied'</script>";
		}
	}
?>
