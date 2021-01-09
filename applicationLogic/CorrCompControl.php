<?php

include ('../storage/Compito.php');
include ('../storage/DatabaseInterface.php');
include '../plugins/libArray/FunArray.php';



define("TABLE_NAME", "compito");

session_start();
$cfProf=$_SESSION['cf'];





if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $action=$_POST['action'];

}

// questa action permette di correggere un compito
  if($action=="correzione"){

$idComp = $_POST['id'];
//echo $idComp;
$arrKey = array("id_compito"=>$idComp);
$comp = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
$temp=$comp->fetch_array();
$compitoComp= new Compito($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5],$temp[6],$temp[7],$temp[8]);


$correzione = $_POST["correzione"];

//echo $correzione;

$compitoComp->setCorrezione($correzione);

//var_dump($compitoComp);
//echo "<br>";

$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(),TABLE_NAME);
//var_dump($isUpdate);

if($isUpdate){
    header('Location: ../interface/Professionista/gestioneCompiti.php');
}
else{
    echo "non corretto correttamente";
  }

}

else

//questa action permette di aggiungere un nuovo compito
  if($action=="addComp"){


$data = $_POST['data'];
$titolo = $_POST['titolo'];
$descrizione = $_POST['descrizione'];
$cfPaz = "NSTFNC94M23H703G";
$svolgimento="";
$correzione="";


$compitoComp=array("data"=>$data,"effettuato"=>"1", "titolo"=>$titolo, "descrizione"=>$descrizione,"svolgimento"=>$svolgimento, "correzione"=>$correzione,"cf_prof"=>$cfProf, "cf"=>$cfPaz);


$compt = DatabaseInterface::insertQuery($compitoComp,TABLE_NAME);
var_dump($compt);



if($compt){
    header('Location: ../interface/Professionista/gestioneCompiti.php');
}

else{
    echo "non aggiunto correttamente";
  }


} else

//questa action permette al paziente di svolgere un compito
    if($action="doComp") {

      $idComp = $_POST['id'];
      echo $idComp;
      $arrKey = array("id_compito"=>$idComp);
      $comp = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
      $temp=$comp->fetch_array();
      $compitoComp= new Compito($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5],$temp[6],$temp[7],$temp[8]);


      $svolgimento = $_POST["svolgimento"];

      echo $svolgimento;

    //  $compitoComp->setSvolgimento($svolgimento);
      $compitoComp ->  setSvolgimento($svolgimento);
      var_dump($compitoComp);
      echo "<br>";

      $isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(),TABLE_NAME);
      var_dump($isUpdate);

      if($isUpdate){
          header('Location: ../interface/Paziente/gestioneCompitiPaziente.php');
      }
      else{
          echo "non svolto correttamente";
        }



    }



 ?>
