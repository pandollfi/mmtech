<?php
@ob_start();
@session_start();
require_once('header.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="alert" role="alert" style="display:none;" id="modalMsg"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Setores</h3>
                    </div>

                    <form method="POST" id="xmlForm" role="form" data-form>
                        <input type="hidden" id="referencia" name="referencia" value="setores">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição do setor" required>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary" id="btn-acao" value="Cadastrar" readonly data-btn-acao>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function setup() {
        document.querySelector('[data-btn-acao]').addEventListener('click', enviaFormulario);
    }

    setup();
</script>
<?php
require 'footer.php';
?>