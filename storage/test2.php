<?php
include "../storage/DatabaseInterface.php ";
include "../storage/professionista.php";
include "../storage/paziente.php";
include '../plugins/libArray/FunArray.php';
    $cf="NSTFNC94M23H703G";
    $password="ciao";
    $query=DatabaseInterface::selectQueryByAtt(array("cf"=>$cf, "passwor"=>$password), Paziente::$tableName);
    var_dump($query);
?>