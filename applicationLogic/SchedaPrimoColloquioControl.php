<?php
/*
* SchedaPrimoColloquioControl
* Questa Control fornisce tutti i metodi relativi alla scheda relativa al primo colloquio
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
    include "../storage/DatabaseInterface.php";
    include "../storage/SchedaPrimoColloquio.php";
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/Professionista/SchedaPrimoColloquio.html");
        exit;
    }
    else{
            $id_scheda=$_POST["id_scheda"];
            $data=$_POST["data"];
            $problema=$_POST["problema"];
            $aspettative=$_POST["aspettative"];
            $motivazione=$_POST["motivazione"];
            $obiettivi=$_POST["obiettivi"];
            $cambiamento=$_POST["cambiamento"];
            $id_terapia=$_POST["id_terapia"];
            $schedaprimocolloquio = new SchedaPrimoColloquio($id_scheda,$data,$problema,$aspettative,$motivazione,$obiettivi,$cambiamento,$id_terapia);
            $result = DatabaseInterface::insertQuery($schedaprimocolloquio->getArray(),$schedaprimocolloquio->tableName);
        }
?>