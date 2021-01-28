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
  <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="Homepage.php"><b>Psy</b>Meet</a>  			<!-- dopo la <a ci va il link alla homepage -->
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Effettua la registrazione come paziente</p>

      <form enctype="multipart/form-data" method="post" id="registrazionePaz">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome" name="nome" pattern="[A-Za-z\s']{2,50}" title="Il campo nome non rispetta la lunghezza" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		    <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cognome" name="cognome" pattern="[A-Z a-z ']{2,50}" title="Il campo cognome non rispetta la lunghezza" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		        <div class="input-group mb-3">
          <input type="date" class="form-control" placeholder="Data di nascita" name="dataN" max="2003-12-12" min="1930-12-12" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
		        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Codice Fiscale" name="cf" pattern="[A-Za-z0-9]{16}" title="Il campo codice fiscale non rispetta il formato" required>
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
          <input type="text" class="form-control" placeholder="Telefono" name="telefono" pattern="[0-9]{10}" title="10 Numeri" required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" pattern="^[A-Za-z\s,àòèéùì]+$" title="Il campo indirizzo non rispetta il formato" required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Istruzione" name="istruzione" pattern="[A-Z a-z ']{2,100}" title="Da 2 a 100 lettere(Apostrofi Consentiti)" required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Lavoro" name="lavoro" pattern="[A-Z a-z ']{2,100}" title="Da 2 a 100 lettere(Apostrofi Consentiti)"required>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="diffCura">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confermaPassword" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)" placeholder="Conferma password" name="confermaPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        Immagine Paziente
		<div class="input-group mb-3">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="immagine" accept=".jpg,.jpeg,.png,.bmp" required>
                  <label class="custom-file-label" for="exampleInputFile"></label>
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
        <div class="row" style="margin-top:1 %;">
          <div class="col-12">
            <div class="alert alert-danger" style="display:none;"></div>
          </div>
        </div>
      </form>
        <?php if(isset($_SESSION['eccregpaz'])){echo $_SESSION['eccregpaz'];} ?>

      <a href="login.php" class="text-center">Sei già registrato? Effettua il Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script>
  $(document).ready(function () {
  bsCustomFileInput.init();
});
  $("#registrazionePaz").submit(function(e){
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
      var registrazione= new FormData($("#registrazionePaz")[0]);
      $.ajax({
          url: '../../applicationLogic/registrazionePazienteControl.php',
          data: registrazione,
          type: "post",
          contentType:false,
          processData:false,
          cache:false,
          success:function(data){
             data=JSON.parse(data);
             console.log(data);
              if(data.esito==true){
                window.location.replace("../Paziente/indexPaziente.php");
              }else{
                    $('.alert-danger').show();
                    $('.alert-danger')[0].innerHTML=data.errore;
                    if(data.errore.includes("Codice"))
                      $("#cf").select();
                    if(data.errore.includes("email"))
                      $("#email").select();
              }
             console.log(data);
          } ,
          error: function(err){
            console.log(err);
          }
      });
  })
</script>

</body>
</html>
