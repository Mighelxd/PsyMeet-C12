<?php
include "../storage/Paziente.php";
include ("../storage/DatabaseInterface.php");
include "PazienteControl.php";
include ("../plugins/libArray/FunArray.php");


session_start();
$cfPaziente = $_SESSION["codiceFiscale"];

if($_POST["action"] == "ModificaPaziente"){
    $telefonoPaz = $_POST["telefono"];
    $indirizzoPaz = $_POST["indirizzo"];
    $emailPaz = $_POST["email"];
    $passwordPaz = md5($_POST["password"]);
    $istruzionePaz = $_POST["istruzione"];


    $arr = array("cf" => $cfPaziente,);
    $result = DatabaseInterface::selectQueryById($arr,"paziente");
    $arr = $result -> fetch_array();
    $paziente = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11]);

    if ($telefonoPaz != "") {
      $paziente->setTelefono($telefonoPaz);
    }

    if ($indirizzoPaz != "") {
      $paziente->setIndirizzo($indirizzoPaz);
    }

    if ($emailPaz != "") {
      $paziente->setEmail($emailPaz);
    }

    if ($passwordPaz != "") {
      $paziente->setPassword($passwordPaz);
    }

    if ($istruzionePaz != "") {
      $paziente->setIstruzione($istruzionePaz);
    }


    $result = DatabaseInterface::updateQueryById($paziente->getArrayNoFoto(), "paziente");

    if($result){
      header("Location: ../interface/Paziente/areaPersonalePaziente.php");
    }
    else{
      echo "non va";
    }

  }

else if($_POST["action"] == "modificaFoto"){
  if(isset($_FILES["fotoProfiloPaz"]))
      $immagine=addslashes(file_get_contents($_FILES["fotoProfiloPaz"]["tmp_name"]));
  else
      $immagine=NULL;

  if($immagine != NULL){
    $arr = array("cf" => $cfPaziente,);
    $result = DatabaseInterface::selectQueryById($arr,"paziente");
    $arr = $result -> fetch_array();
    $paziente = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $immagine);


    $result = DatabaseInterface::updateQueryById($paziente->getArray(), "paziente");
    var_dump($result);
    if($result){
      header("Location: ../interface/Paziente/areaPersonalePaziente.php");
    }
    else{
      echo "non va";
    }
  }
  else {
      echo "non va per foto = null";
  }
}


 ?>
