<?php
/*
* SchedaModelloEziologicoControl
* Questa Control fornisce tutti i metodi relativi alla scheda modello eziologico
* Autore: Francesco Capone
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
    include "../plugins/libArray/FunArray.php";
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
        
            $recIdScheda = DatabaseInterface::selectQueryByAtt($schedamodelloeziologico,"schedaModelloEziologico");
            while($row = $recIdScheda->fetch_array()){
            $idSchedaCorr = $row[0];
        }
        $ris = array("result"=>$result,"idScheda"=>$idSchedaCorr);
        echo json_encode($ris);
    }
    
    if($_POST["action"] == "modificaModelloEziologico"){
            $id_scheda=$_POST['id_scheda'];
            $data=$_POST['data'];
            $fattori_causativi=$_POST['fattori causativi'];
            $fattori_mantenimento=$_POST['fattori mantenimento'];
            $fattori_precipitanti=$_POST['fattori precipitanti'];
            $relazione_finale=$_POST['relazione finale'];
            $id_terapia=$_POST['id_terapia'];
        
            $mod = array("id_scheda" => $id_scheda);
            $result = DatabaseInterface::selectQueryById($mod,"schedaModelloEziologico");
            $mod = $result -> fetch_array();
            $schedamodelloeziologico= new schedaModelloEziologico ($mod[0], $mod[1], $mod[2], $mod[3], $mod[4],$mod[5],$mod[6]);
        
            if ($id_scheda != "") {
              $schedamodelloeziologico->setIdScheda($id_scheda);
            }
        
            if ($data != "") {
              $schedamodelloeziologico->setData($data);
            }
        
            if ($fattori_causativi != "") {
              $schedamodelloeziologico->setFattoriCausativi($fattori_causativi);
            }
        
            if ($fattori_mantenimento!= "") {
              $schedamodelloeziologico->setFattoriMantenimento($fattori_mantenimento);
            }

            if ($fattori_precipitanti!= "") {
                $schedamodelloeziologico->setFattoriPrecipitanti($fattori_precipitanti);
            }

            if ($relazione_finale!= "") {
                $schedamodelloeziologico->setRelazioneFinale($relazione_finale);
            }
            if ($id_terapia != "") {
              $schedamodelloeziologico->setIdTerapia($id_terapia);
            }
            $result = DatabaseInterface::updateQueryById($schedamodelloeziologico->getArray(), "schedaModelloEziologico");
          }
          if($result){
            header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
          }
          else{
            echo "la scheda non è stata aggiunta";
          }    
?>