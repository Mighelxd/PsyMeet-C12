<?php
     session_start();
	 session_destroy();
	 header("Location: ../Utente/Homepage.php");
	 exit;
?>
