<!DOCTYPE html>
<html lang="pt">
<?php
require_once('autoload.php');
Autoload::carrega_const();
Autoload::carrega_funcoes();
Autoload::carrega_db();

require_once 'src/dao/busca_dao.php';
$dao = new BuscaDao();
$id = base64_decode($_GET['i']);
$funcionarios = $dao->carrega_funcionario_detalhe($id)
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MMTech | Home</title>
  <?php
  Autoload::carrega_js();
  Autoload::carrega_css_site()
  ?>
</head>

<body>
  <?php
  Autoload::carrega_cabecalho_site()
  ?>
  <main id="main">

    <section id="hero" class="d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1><?php echo $funcionarios['nome']; ?></h1>
        <h2><?php echo $funcionarios['email']; ?></h2>
        <h5><b>Telefone:</b> <?php echo $funcionarios['telefone']; ?> </h5>
        <h5><b>Setor(es):</b> <?php echo $funcionarios['setores']; ?> </h5>
      </div>
    </section>
    <br><br>
    <section id="contact" class="contact">
      <form method="POST" data-form>
        <input type="hidden" id="referencia" name="referencia" value="busca">
        <div class="container" data-aos="fade-up">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="section-title">
                <div class="input-group mb-3">

                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

  </main>

  <script>
    function setup() {
      document.querySelector('[data-btn-acao-busca]').addEventListener('click', enviaFormularioBusca);
    }

    setup();
  </script>
  <?php
  Autoload::carrega_rodape_site();
  ?>
</body>

</html>