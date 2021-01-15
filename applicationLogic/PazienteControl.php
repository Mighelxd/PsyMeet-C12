<?php
/*
* PazienteControl
* Questa Control fornisce tutti i metodi relativi al paziente
* Autore: Giuseppe Ferrante
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
//include "../storage/Paziente.php";
//include ("../storage/DatabaseInterface.php");
//include ("../plugins/libArray/FunArray.php");


/**
 *
 */
class PazienteControl {
  public static function getPaz($cfPaziente){
    $arr = array("cf" => $cfPaziente,);
    $result = DatabaseInterface::selectQueryById($arr,"paziente");
    $arr = $result -> fetch_array();
    $paz = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11]);

    return $paz;
  }

  public static function getListPaz(){

    $allPaz = DatabaseInterface::selectAllQuery("paziente");

    while ($row = $allPaz->fetch_array()) {
      $pazienti = new Paziente($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
      $arrayPazienti[] = $pazienti;
    }
    return $arrayPazienti;
  }

  //questo metodo prende in input un array relazionare che mette a relazione la chiave più il valore (esempio ("cf" => "afaopmemffeaf"), ("nome" => "Francesco"))
  public static function searchPaz($arrSearchKey){

      $listPaz = DatabaseInterface::selectQueryByAtt($arrSearchKey, "paziente");

      while ($row = $listPaz->fetch_array()) {
        $pazienti = new Paziente($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
        $arrayPazienti[] = $pazienti;
      }
      return $arrayPazienti;
  }


  static function getPazientiByProf($cfProf){

    $arrKey = array('cf_prof' =>  $cfProf, );
    $listTerapie = DatabaseInterface::selectQueryByAtt($arrKey,"terapia");

    while ($row = $listTerapie->fetch_array()) {
      $terapia = new Terapia($row[0], $row[1], $row[2], $row[3], $row[4]);
      $arrPaz = array("cf" => $terapia -> getCf());
      $listPazienti = DatabaseInterface::selectQueryById($arrPaz,"paziente");
      $arrPaziente = $listPazienti->fetch_array();
      $paziente = new Paziente($arrPaziente[0],$arrPaziente[1],$arrPaziente[2],$arrPaziente[3],$arrPaziente[4],$arrPaziente[5],$arrPaziente[6],$arrPaziente[7],$arrPaziente[8],$arrPaziente[9],$arrPaziente[10],$arrPaziente[11]);
      $arrayPazienti[] = $paziente;
    }
    return $arrayPazienti;
  }

}


/*
  if($action == "" && $action )
  {
    echo "cose a caso";
  }
  else if($action == "ModificaPaziente")
  {
    $telefonoControl = $indirizzoControl = $emailControl = $passwordControl = $titoloStdioControl = "";
    echo ($telefonoControl = $_POST["telefono"]) ."<br>";
    echo ($indirizzoControl = $_POST["indirizzo"])."<br>";
    echo ($emailControl = $_POST["email"])."<br>";
    echo ($passwordControl = $_POST["password"])."<br>";
    echo ($titoloStdioControl = $_POST["titoloStudio"])."<br>";
  }
*/




?>
