<?php
session_start();

 include ('../storage/DatabaseInterface.php');
 include ('../storage/Pacchetto.php');
 include ('../storage/scelta.php');



if($_SERVER['REQUEST_METHOD']=='POST'){

  $action=$_POST['action'];

}
else {
  $action=$_GET['action'];
}
$_SESSION['eccezione']="";
if($action=='addPacchetto'){
    try{
        $id=0;
        $pacchetto=$_POST['pac'];
        $att=array('tipologia'=>$pacchetto);
        $coll=array('*');
        $recuperapacc =DatabaseInterface::selectDinamicQuery($coll,$att,Pacchetto::$tableName);
        while ($row = $recuperapacc->fetch_array()) {
            $id=$row[0];
        }

        $arrycheck=array('id_pacchetto'=>$id);
        $check = DatabaseInterface::selectDinamicQuery($coll,$arrycheck,scelta::$tableName);
        if($check->num_rows>0){
            $_SESSION['Errore']= 'Pacchetto gia esistente, seleziona un pacchetto che non appartiene al Professionista corrente';
            header('Location: ../interface/Professionista/gestionePacchettiProf.php');
        }else {
            $_SESSION['Errore']='';
            $arryid = new Scelta(null,$_SESSION['codiceFiscale'],$id);
            $ok=DatabaseInterface::insertQuery($arryid->getArray(),scelta::$tableName);
            if($ok){
                header('Location: ../interface/Professionista/gestionePacchettiProf.php');
            }
            else{
                throw new Exception("Errore: Pacchetto non inserito!");
            }
        }
    }catch(Exception $e){
        $_SESSION['eccezione']=$e->getMessage();
        header('Location: ../interface/Professionista/gestionePacchettiProf.php');
    }
}
else if($action=='delPacchetto'){
    try{
        $idProf=$_SESSION['codiceFiscale'];
        $pacchetto=$_POST['idPacchetto'];
        $key = new Scelta(null,$idProf,$pacchetto);
        $del=DatabaseInterface::deleteQuery($key->getArray(),scelta::$tableName);
        if($del){
            //  $_SESSION['codiceFiscale'] = "";
            header('Location: ../interface/Professionista/gestionePacchettiProf.php');
        }else{
            throw new Exception("Errore: pacchetto non eliminato!");
        }
    }catch(Exception $e){
        $_SESSION['eccezione']=$e->getMessage();
        header('Location: ../interface/Professionista/gestionePacchettiProf.php');
    }
}

 ?>
