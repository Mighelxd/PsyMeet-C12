<?php
include "../storage/DatabaseInterface.php ";
include "../storage/professionista.php";
include "../storage/paziente.php";
include '../plugins/libArray/FunArray.php';
    $cf="ASDASD";
    $query=DatabaseInterface::selectQueryByAtt(array("cf_prof"=>$cf), Professionista::$tableName);
    $arr=mysqli_fetch_array($query);
    $img=base64_encode($arr["foto_profilo_professionista"]);
    echo '<img src="data:image/jpeg;base64,'.$img.'"/>'
?>