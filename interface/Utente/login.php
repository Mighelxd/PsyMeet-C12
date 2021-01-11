<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> PsyMeet | Log in</title>
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Psy</b>Meet</a>         <!-- dopo la <a ci va il link alla homepage -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Effettua il login per cominciare</p>

      <form action="" method="post" id="loginForm">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Codice Fiscale" name="cf" pattern="[A-Za-z0-9]{16}" title="16 Caratteri alfanumerici" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row" style="margin-top:1%;">
          <div class="col-12">
            <div class="alert alert-danger" style="display:none;"></div>
          </div>
      </form>


      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="registrazioneProfessionista.html" class="text-center">Non sei ancora registrato?</a> 			<!-- link alla pagina di registrazione -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $("#loginForm").submit(function(e){
      e.preventDefault()
      $.ajax({
          url: '../../applicationLogic/loginControl.php',
          data: $("#loginForm").serialize(),
          type: "post",
          success:function(data){
            data=JSON.parse(data);
            console.log(data);
            if(data.esito==true){
              if(data.tipo=="professionista")
                window.location.replace("../Professionista/indexProfessionista.html");
              else
                  window.location.replace("../Paziente/homePagePaziente.php");
            }else{
                  $('.alert-danger').show();
                  $('.alert-danger')[0].innerHTML=data.errore;
                  if(data.errore.includes("Codice"))
                    $("#cf").select();
                  if(data.errore.includes("Password"))
                    $("#email").select();
            }
          },
          error: function(err){
            console.log(err);
          }
      });
  })
</script>


</body>
</html>
