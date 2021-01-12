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
if($action=='addPacchetto'){
  $id=0;
  $pacchetto=$_POST['pac'];
  echo $pacchetto;
  $att=array('tipologia'=>$pacchetto);
  $coll=array('*');
  $recuperapacc =DatabaseInterface::selectDinamicQuery($coll,$att,Pacchetto::$tableName);
  var_dump($recuperapacc);
  while ($row = $recuperapacc->fetch_array()) {
     $id=$row[0];
  }
  $arryid=array('cf_prof'=>$_SESSION['codiceFiscale'],'id_pacchetto'=>$id);
  $ok=DatabaseInterface::insertQuery($arryid,Scelta::$tableName);
  if($ok){
    header('Location: ../interface/Professionista/gestionePacchettiProf.php');
  }
}
 ?>
