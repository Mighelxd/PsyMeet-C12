<?php
    include("DatabaseInterface.php");
    include "CartellaClinica.php";
    include "Appuntamento.php";
    include "Paziente.php";

    //session_start();
   // $_SESSION["codFiscalePaz"]="NSTFNC94M23H703G";
    /*$arr = array("id_cartella_clinica" => 1,);
    $result = DatabaseInterface::selectQueryById($arr,"cartellaclinica");
    $arr = $result -> fetch_array();
    $cc = new CartellaClinica($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6]);
    $cc -> setFarmaci("test");
    $result = DatabaseInterface::updateQueryById($cc->getArray(),CartellaClinica::$table_name);
    echo FunArray::array_key_first($cc->getArray());
    echo $arr[FunArray::array_key_first($cc->getArray())];
    var_dump($result);
  */
/*  $app = array("id_appuntamento" => 1,);
    $res = DatabaseInterface::selectQueryById($arr,"appuntamento");
    $app = $res->fetch_array();
*/


// test classe Paziente.php Ferrante Giuseppe (lo scrivo giusto per ricordarmi che questo è il mio test)
/*
$arr = array("cf" => '"NSTFNC94M23H703G"',);
echo FunArray::array_key_first($arr);
echo $arr[FunArray::array_key_first($arr)];
$result = DatabaseInterface::selectQueryById($arr,"paziente");
if($result == false)
  echo "non va";
$arr = $result -> fetch_array();
  $paz = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10]);
  $paz -> setNome("provaNome");
  $result = DatabaseInterface::updateQueryById($paz->getArray(),"paziente");
  echo FunArray::array_key_first($paz->getArray());
  echo $arr[FunArray::array_key_first($paz->getArray())];
  var_dump($result);
*/
?>
