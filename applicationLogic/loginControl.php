<?php
declare(strict_types=1);
include '../storage/DatabaseInterface.php ';
	 include '../storage/professionista.php';
	 include '../storage/paziente.php';
	 include '../plugins/libArray/FunArray.php';
	if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
		header('Location: ../interface/Professionista/registrazioneProfessionista.php');
		exit;
	} else {
		$cf=$_POST['cf'];
		$password=md5($_POST['password']);
		$query=DatabaseInterface::selectQueryByAtt(['cf'=>$cf, 'passwor'=>$password], Paziente::$tableName);
		if (mysqli_num_rows($query)==1) {
			session_start();
			$_SESSION['tipo']='paziente';
			$_SESSION['codiceFiscale']=$cf;
			$esito=['esito' => true, 'tipo' => 'paziente'];
			echo json_encode($esito);
		} else {
			$query=DatabaseInterface::selectQueryByAtt(['cf_prof' => $cf, 'passwor' => $password], Professionista::$tableName);
			if (mysqli_num_rows($query)==1) {
				session_start();
				$_SESSION['tipo']='professionista';
				$_SESSION['codiceFiscale']=$cf;
				$esito=['esito' => true, 'tipo' => 'professionista'];
				echo json_encode($esito);
			} else {
				$query=DatabaseInterface::selectQueryByAtt(['cf'=>$cf], Paziente::$tableName);
				if (mysqli_num_rows($query)==1) {
					$esito=['esito' => false, 'errore' => 'Password errata'];
					echo json_encode($esito);
				} else {
					$query=DatabaseInterface::selectQueryByAtt([('cf_prof')=>$cf], Professionista::$tableName);
					if (mysqli_num_rows($query)==1) {
						$esito=['esito' => false, 'errore' => 'Password errata'];
						echo json_encode($esito);
					} else {
						$esito=['esito' => false, 'errore' => 'Codice fiscale inesistente'];
						echo json_encode($esito);
					}
				}
			}
		}
	}
