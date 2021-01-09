<?php
     include "../storage/DatabaseInterface.php ";
     include "../storage/professionista.php";
     include "../storage/paziente.php";
     include '../plugins/libArray/FunArray.php';
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/Professionista/registrazioneProfessionista.php");
        exit;
    }
    else{
        $cf=$_POST["cf"];
        $password=md5($_POST["password"]);
        $query=DatabaseInterface::selectQueryByAtt(array("cf"=>$cf, "passwor"=>$password), Paziente::$tableName);
        if(mysqli_num_rows($query)==1){
            session_start();
            $_SESSION["tipo"]="paziente";
            $_SESSION["cf"]=$cf;
            $esito=array("esito" => true, "tipo" => "paziente");
            echo json_encode($esito);
        }
        else{
            $query=DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cf, "passwor" => $password), Professionista::$tableName);
            if(mysqli_num_rows($query)==1){
                session_start();
                $_SESSION["tipo"]="professionista";
                $_SESSION["cf"]=$cf;
                $esito=array("esito" => true, "errore" => "professionista");
                echo json_encode($esito);
            }
            else{
                $query=DatabaseInterface::selectQueryByAtt(array("cf"=>$cf),Paziente::$tableName);
                if(mysqli_num_rows($query)==1){
                    $esito=array("esito" => false, "errore" => "Password errata");
                    echo json_encode($esito);
                }
                else{  
                    $query=DatabaseInterface::selectQueryByAtt(array(("cf_prof")=>$cf),Professionista::$tableName);
                    if(mysqli_num_rows($query)==1){
                        $esito=array("esito" => false, "errore" => "Password errata");
                        echo json_encode($esito);
                    }
                    else{
                        $esito=array("esito" => false, "errore" => "Codice fiscale inesistente");
                        echo json_encode($esito);
                    }
                }
            }

        }
    }

?>