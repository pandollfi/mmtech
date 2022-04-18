<?php
@ob_start();
@session_start();
require "header.php";
?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Olá <?php echo $_SESSION['usuario_nome']; ?>, seja bem vindo!</h3>
      </div>
      <div class="card-body">
        <p>Neste sistema, você poderá realizar cadastros de funcionarios. </p>
        <p>Para que o cadastro possa ser feito, siga os passos abaixo: <br>
          - Cadastre o setor (Setores/Cadastrar Setor), já que todo funcionario tem a obrigatoriedade de pertencer a um setor. <br>
          - Cadastre o funcionario (Funcionários/Cadastrar Funcionário)</p>
        <p>Após a realização dos cadastros, você poderá visualizar e realizar as buscas no sistema de pesquisa, <a href='../index.php' target="_blank">clicando aqui!</a></p>
      </div>
    </div>
  </div>
</div>
<?php require "footer.php"; ?>