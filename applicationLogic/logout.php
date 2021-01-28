<?php
declare(strict_types=1);
session_start();
session_destroy();
header('Location: ../interface/Utente/Homepage.php');
exit;
