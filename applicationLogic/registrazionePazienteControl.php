<?php
    /*
    * registrazionepazienteControl.php 
    * Questo file fornisce le funzioni di control per la registrazione del paziente.
    * Autore: Michele D'Avino
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
    include "../storage/DatabaseInterface.php ";
    include "../storage/paziente.php";
    include '../plugins/libArray/FunArray.php';
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/paziente/registrazionepaziente.php");
        exit;
    }
    else{
            $nome=$_POST["nome"];
            $cognome=$_POST["cognome"];
            $dataNascita=$_POST["dataN"];
            $codiceFiscale=strtoupper($_POST["cf"]);
            $indirizzo=$_POST["indirizzo"];
            $telefono=$_POST["telefono"];
            $email=$_POST["email"];
            $diffCura=intval($_POST["diffCura"]);
            $istruzione=$_POST["istruzione"];
            $lavoro=$_POST["lavoro"];
            $password=md5($_POST["password"]);
            $confermaPassword=md5($_POST["confermaPassword"]);
            if(isset($_FILES["immagine"]))
                $immagine=addslashes(file_get_contents($_FILES["immagine"]["tmp_name"]));
            else
                $immagine=NULL;
            $paziente = new Paziente($codiceFiscale,$nome,$cognome,$dataNascita,$email,$telefono,$password,$indirizzo,$istruzione,$lavoro,$diffCura,$immagine);
            $select = DatabaseInterface::selectQueryById($paziente->getArray(),Paziente::$tableName);
            echo var_dump($select);
            if(mysqli_num_rows($select)!=0){
                $errore = array("esito" => false,"errore" => "Codice fiscale gia' presente.");
                echo json_encode($errore);
            }
            $select = DatabaseInterface::selectQueryByAtt(array("email" => $paziente->getEmail()),Paziente::$tableName);
            echo var_dump($select);
            if(mysqli_num_rows($select)!=0){
                $errore=array("esito" => "false","errore" => "Email gia' presente.");
                echo json_encode($errore);
                exit();
            }
            $result = DatabaseInterface::insertQuery($paziente->getArray(),Paziente::$tableName);
            if($result==true){
                session_start();
                $_SESSION["codiceFiscale"]=$codiceFiscale;
                $_SESSION["tipo"]="paziente";
                $esito=array("esito" => true, "errore" => "nessuno");
                echo json_encode($esito);
            }
        }
?>