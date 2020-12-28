<?php
    include("DatabaseInterface.php"); 
    include "CartellaClinica.php";
    $arr = array("id_cartella_clinica" => 1,);
    $result = DatabaseInterface::selectQueryById($arr,"cartellaclinica");
    $arr = $result -> fetch_array();
    $cc = new CartellaClinica($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6]);
    $cc -> setFarmaci("test");
    $result = DatabaseInterface::updateQueryById($cc->getArray(),CartellaClinica::$table_name);
    var_dump($result);
?>