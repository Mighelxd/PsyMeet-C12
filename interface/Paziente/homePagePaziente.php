<?php
/*
* GUI Paziente
* Questa View fornisce tutti gli elementi grafici della home page relativa al paziente
* Autore: Giuseppe Ferrante
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
include "../../storage/Paziente.php";
include ("../../storage/DatabaseInterface.php");
include ("../../plugins/libArray/FunArray.php");

$arr = array("cf" => '"NSTFNC94M23H703G"',);
$result = DatabaseInterface::selectQueryById($arr,"paziente");
$arr = $result -> fetch_array();
$paz = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>cose a casp</h1>

    <p><?php  echo $paz->getCf(); ?></p>

  </body>
</html>
