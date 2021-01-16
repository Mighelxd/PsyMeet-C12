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

  <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

      <form enctype="multipart/form-data" method="post" id="registerProf">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" pattern="[A-Z a-z ']{2,50}" title="da 2 a 50 Lettere(Apostrofi consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cognome" id="cognome" name="cognome" pattern="[A-Z a-z ']{2,50}" title="da 2 a 50 Lettere(Apostrofi consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="date" class="form-control" placeholder="Data di nascita" id="dataN" name="dataN" max="2003-12-12" min="1930-12-12" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Codice Fiscale" name="cf" id="cf" pattern="[A-Za-z0-9]{16}" title="16 Caratteri alfanumerici" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Titolo di studio" id="titoloStudio" name="titoloStudio" pattern="[A-Z a-z ']{2,500}" title="da 2 a 500 Lettere(Apostrofi consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Pubblicazioni" id="pubblicazioni" name="pubblicazioni" pattern="[A-Z a-z 0-9']{2,500}" title="da 2 a 500 Lettere(Apostrofi consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Esperienze" id="esperienze" name="esperienze" pattern="[A-Z a-z 0-9']{2,500}" title="da 2 a 500 Lettere(Apostrofi consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Specializzazione" id="specializzazione" name="specializzazione" pattern="[A-Z a-z ']{2,500}" title="da 2 a 50 Lettere(Apostrofi consentiti)" required>
              <div class="input-group-append">
                  <div class="input-group-text">
                  </div>
              </div>
          </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Indirizzo studio" id="indirizzoStudio" name="indirizzoStudio" pattern="[A-Z a-z 0-9']{2,250}" title="Da 2 a 250 caratteri Alfanumerici(Apostrofi Consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono" pattern="[0-9]{10}" title="10 Numeri" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cellulare" id="cellulare" name="cellulare" pattern="[0-9]{10}" title="10 Numeri" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="P.IVA" id="pIva" name="pIva" pattern="[A-Za-z0-9]{11}" title="11 Caratteri alfanumerici" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Polizza RC" id="polizzaRc" name="polizzaRc" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="N° iscrizione albo" id="nIscrizioneAlbo" name="nIscrizioneAlbo" pattern="[A-Z a-z 0-9]{2,20}" title="da 2 a 20 Caratteri Alfanumerici" required>
          <div class="input-group-append">
            <div class="input-group-text">             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" id="email" required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="PEC" name="pec" id="pec" id="pec" required>
              <div class="input-group-append">
                  <div class="input-group-text">
                  </div>
              </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)" required>
          <div class="input-group-append">
            <div class="input-group-text">             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Conferma password" id="confermaPassword" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)" name="confermaPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        Immagine Professionista
		<div class="input-group mb-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="immagine" accept=".jpg,.jpeg,.png,.bmp"  title="Immagine di formato jpg png o bmp" required>
                  <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
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
        <div class="row" style="margin-top:1%;">
          <div class="col-12">
            <div class="alert alert-danger" style="display:none;"></div>
          </div>
        </div>
      </form>


      <a href="login.html" class="text-center">Sei già registrato? Effettua il Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script>
$(document).ready(function () {
    bsCustomFileInput.init();
  });
    $("#registerProf").submit(function(e){
      e.preventDefault()
      if(document.getElementById("password").value != document.getElementById("confermaPassword").value){
        $('.alert-danger').show();
        $('.alert-danger')[0].innerHTML="Password e conferma password devono essere uguali.";
        return false
      }
          var fileName = document.getElementById("exampleInputFile").value;
          var idxDot = fileName.lastIndexOf(".") + 1;
          var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
      if(extFile != "jpg" && extFile != "jpeg" && extFile != "png" && extFile != "bmp"){
        $('.alert-danger').show();
        $('.alert-danger')[0].innerHTML="L'Immagine deve essere di tipo jpg jpeg png o bmp.";
        return false
      }
        var registrazione= new FormData($("#registerProf")[0]);
        $.ajax({
            url: '../../applicationLogic/registrazioneProfessionistaControl.php',
            contentType:false,
            processData:false,
            cache:false,
            data: registrazione,
            type: "post",
            success:function(data){
              console.log(data);
              data=JSON.parse(data);
              console.log(data);
                if(data.esito==true){
                  window.location.replace("../Professionista/indexProfessionista.php");
                }else{
                   $('.alert-danger').show();
                   $('.alert-danger')[0].innerHTML=data.errore;
                  if(data.errore.includes("Codice"))
                     $("#cf").select();
                  if(data.errore.includes("email"))
                     $("#email").select();
               }
            },
            error: function(err){
              console.log(err);
            }
          })
    })
</script>

</body>
</html>
