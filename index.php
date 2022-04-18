<!DOCTYPE html>
<html lang="pt">
<?php
require_once('autoload.php');
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MMTech | Home</title>
  <?php
  Autoload::carrega_const();
  Autoload::carrega_js();
  Autoload::carrega_db();
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
        <h1>Bem vindo ao sistema de <span>pesquisa</span></h1>
        <h2>Aqui você consegue buscar todos os funcionarios no nosso banco de dados</h2>
      </div>
    </section>

    <section id="contact" class="contact">
      <form method="POST" data-form>
        <input type="hidden" id="referencia" name="referencia" value="busca">
        <div class="container" data-aos="fade-up">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="alert" role="alert" style="display:none;" id="modalMsg"></div>

              <div class="section-title">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Digite aqui..." aria-label="Digite aqui..." aria-describedby="button-addon2" id="busca" name="busca">
                  <input type="submit" class="btn btn-outline-primary" id="btn-acao" value="Buscar" data-btn-acao-busca>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="services" class="services">
      <div class="container">
        <div id="resposta_busca">
        </div>
      </div>
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