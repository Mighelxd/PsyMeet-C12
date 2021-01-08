<?php
  session_start();
  if(isset($_SESSION["errore"])){
    $errore=$_SESSION["errore"];
  echo "
  <script>
      alert('$errore')
  </script>";
  unset($_SESSION["errore"]);
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsyMeet | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../Utente/Homepage.php"><b>Psy</b>Meet</a>  			<!-- ci va il link alla homepage -->
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Effettua la registrazione come professionista</p>

      <form action="../../applicationLogic/registrazioneProfesionistaControl.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nome" placeholder="nome" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cognome" name="cognome" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="data" class="form-control" placeholder="Data di nascita" name="dataN" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Codice Fiscale" name="cf" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Titolo di studio" name="titoloStudio" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Pubblicazioni" name="pubblicazioni" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Esperienze" name="esperienze" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Indirizzo studio" name="indirizzoStudio" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cellulare" name="cellulare" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="P.IVA" name="pIva" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Polizza RC" name="polizzaRc" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="N° iscrizione albo" name="nIscrizioneAlbo" required>
          <div class="input-group-append">
            <div class="input-group-text">             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Conferma password" name="confermaPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
				Video di presentazione
		<div class="input-group mb-3">
              <div class="col-sm-10">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="videoPresentazione">
                    <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div>
                </div>
              </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrati</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="login.html" class="text-center">Sei già registrato? Effettua il Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
