<?php

session_start();
session_destroy();
header('Location: ../interface/Utente/Homepage.php');
exit;
