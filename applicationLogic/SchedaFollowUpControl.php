<?php
/*
* SchedaFollowUpControl
* Questa Control fornisce tutti i metodi relativi alla scheda follow up
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
    include "../storage/DatabaseInterface.php";
    include "../storage/SchedaFollowUp.php";
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/Professionista/SchedaFollowUp.html");
        exit;
    }
    else{
            $id_scheda=$_POST["id_scheda"];
            $data=$_POST["data"];
            $ricadute=$_POST["ricadute"];
            $esiti_positivi=$_POST["esiti_positivi"];
            $id_terapia=$_POST["id_terapia"];
            $schedafollowup = new SchedaFollowUp($id_scheda,$data,$ricadute,$esiti_positivi,$id_terapia);
            $result = DatabaseInterface::insertQuery($schedafollowup->getArray(),$schedafollowup->tableName);
        }
?>