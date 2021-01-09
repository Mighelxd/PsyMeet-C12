<?php
include "../storage/DatabaseInterface.php ";
include "../storage/professionista.php";
include "../storage/paziente.php";
include '../plugins/libArray/FunArray.php';
    $cf="ASDASD";
    $query=DatabaseInterface::selectQueryByAtt(array("cf"=>$cf), Paziente::$tableName);
    $arr=mysqli_fetch_array($query);
    $img=base64_encode($arr["foto_profilo_paz"]);
    echo '<img src="data:image/jpeg;base64,'.$img.'"/>'
?>