<?php
/*
* SchedaPrimoColloquioControl
* Questa Control fornisce tutti i metodi relativi alla scheda relativa al primo colloquio
* Autore: Francesco Capone
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
    include "../plugins/libArray/FunArray.php";
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
        
            $recIdScheda = DatabaseInterface::selectQueryByAtt($schedaprimocolloquio,"schedaPrimoColloquio");
            while($row = $recIdScheda->fetch_array()){
            $idSchedaCorr = $row[0];
        }
        $ris = array("result"=>$result,"idScheda"=>$idSchedaCorr);
        echo json_encode($ris);
    }
    if($_POST["action"] == "modificaPrimoColloquio"){
        $id_scheda=$_POST["id_scheda"];
        $data=$_POST["data"];
        $problema=$_POST["problema"];
        $aspettative=$_POST["aspettative"];
        $motivazione=$_POST["motivazione"];
        $obiettivi=$_POST["obiettivi"];
        $cambiamento=$_POST["cambiamento"];
        $id_terapia=$_POST["id_terapia"];
    
        $mod = array("id_scheda" => $id_scheda);
        $result = DatabaseInterface::selectQueryById($mod,"schedaPrimoColloquio");
        $mod = $result -> fetch_array();
        $schedaprimocolloquio= new schedaPrimoColloquio ($mod[0], $mod[1], $mod[2], $mod[3], $mod[4],$mod[5],$mod[6],$mod[7]);
    
        if ($id_scheda != "") {
          $schedaprimocolloquio->setIdScheda($id_scheda);
        }
    
        if ($data != "") {
          $schedaprimocolloquio->setData($data);
        }
    
        if ($problema != "") {
          $schedaprimocolloquio->setProblema($problema);
        }
    
        if ($aspettative!= "") {
          $schedaprimocolloquio->setAspettative($aspettative);
        }

        if ($motivazione!= "") {
          $schedaprimocolloquio->setMotivazione($motivazione);
        }

        if ($obiettivi!= "") {
            $schedaprimocolloquio->setObiettivi($obiettivi);
        }

        if ($cambiamento!= "") {
            $schedaprimocolloquio->setCambiamento($cambiamento);
        }

        if ($id_terapia != "") {
          $schedaprimocolloquio->setIdTerapia($id_terapia);
        }
        $result = DatabaseInterface::updateQueryById($schedaprimocolloquio->getArray(), "schedaPrimoColloquio");
      }
      if($result){
        header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
      }
      else{
        echo "la scheda non è stata aggiunta";
      } 
?>