<?php
/*
* SchedaModelloEziologicoControl
* Questa Control fornisce tutti i metodi relativi alla scheda modello eziologico
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
    include "../storage/DatabaseInterface.php";
    include "../storage/SchedaModelloEziologico.php";
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/Professionista/SchedaModelloEziologico.html");
        exit;
    }
    else{
            $id_scheda=$_POST["id_scheda"];
            $data=$_POST["data"];
            $fattori_causativi=$_POST["fattori_causativi"];
            $fattori_mantenimento=$_POST["fattori_mantenimento"];
            $fattori_precipitanti=$_POST["fattori_precipitanti"];
            $relazione_finale=$_POST["relazione_finale"];
            $id_terapia=$_POST["id_terapia"];
            $schedamodelloeziologico = new SchedaModelloEziologico($id_scheda,$data,$fattori_causativi,$fattori_precipitanti,$fattori_mantenimento,$relazione_finale,$id_terapia);
            $result = DatabaseInterface::insertQuery($schedamodelloeziologico->getArray(),$schedamodelloeziologico->tableName);
        }
?>