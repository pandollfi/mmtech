<?php
require_once('autoload.php');
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MMTech | Login</title>
  <?php
  Autoload::carrega_sistema();
  ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>MMTech</b>Admin</a>
      </div>
      <div class="card-body">
        <div class="alert" role="alert" style="display:none;" id="modalMsg"></div>

        <p class="login-box-msg">Conecte-se para acessar o dashboard</p>

        <form method="POST" role="form" data-form>
          <input type="hidden" id="referencia" name="referencia" value="login">
          <div class="input-group mb-3">
            <input type="login" class="form-control" placeholder="Login" id="login" name="login" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" class="btn btn-primary btn-block" id="btn-login" value="Acessar" data-btn-login>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>

<script>
  verifica_erro();


  function setup() {
    document.querySelector('[data-btn-login]').addEventListener('click', enviaFormularioLogin);
  }

  setup();
</script>