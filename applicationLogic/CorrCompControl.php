<?php

include ('../storage/Compito.php');
include ('../storage/DatabaseInterface.php');
include '../plugins/libArray/FunArray.php';



define("TABLE_NAME", "compito");


if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if($action)


    $action = $_POST['correzione'];
}

$idComp = $_POST['id'];
echo $idComp;
$arrKey = array("id_compito"=>$idComp);
$comp = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
$temp=$comp->fetch_array();
$compitoComp= new Compito($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5],$temp[6],$temp[7],$temp[8]);


$correzione = $_POST["correzione"];
echo $correzione;

$compitoComp->setCorrezione($correzione);
var_dump($compitoComp);
echo "<br>";

$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(),TABLE_NAME);
var_dump($isUpdate);

if($isUpdate){
    header('Location: ../interface/Professionista/gestioneCompiti.php');
}
else{
    echo "non corretto correttamente";
}



$data = $_POST['data'];
$titolo = $_POST['titolo'];
$descrizione = $_POST['descrizione'];
$svolgimento = $_POST['svolgimento'];
$correzione = $_POST['correzione'];
$effettuato = $_POST['effettuato'];
$cfPaz = "NSTFNC94M23H703G";
$cfProf = "RSSMRC80R12H703U";

$arrComp = array("data"=>$data, "titolo"=>$titolo,"descrizione"=>$descrizione,"svolgimento"=>$svolgimento,"correzione"=>$correzione, "effettuato"=>$effettuato, $cfPaz, $cfProf);
$comp = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
$temp=$comp->fetch_array();
$compitoComp= new Compito($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5],$temp[6],$temp[7],$temp[8]);


$correzione = $_POST["correzione"];
echo $correzione;

$compitoComp->setCorrezione($correzione);
var_dump($compitoComp);
echo "<br>";

$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(),TABLE_NAME);
var_dump($isUpdate);

if($isUpdate){
    header('Location: ../interface/Professionista/gestioneCompiti.php');
}
else{
    echo "non corretto correttamente";
}




 ?>
