<?php
@ob_start();
@session_start();
require_once('header.php');
require_once('../src/dao/setor_dao.php');
$setorDao = new SetorDao();

?>
<script src="<?php echo URL; ?> . 'js/cadastro_funcionarios.js"></script>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="alert" role="alert" style="display:none;" id="modalMsg"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Funcionário</h3>
                    </div>
                    <form method="POST" role="form" data-form>
                        <input type="hidden" id="referencia" name="referencia" value="funcionarios">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titulo">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do funcionario" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" id="telefone" name="telefone" placeholder="Digite o número de telefone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Descreva o e-mail do funcionario" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="setor">Setor(s):</label>
                                        <select class="select form-control" id="setor[]" name="setor[]" multiple="multiple">
                                            <?php
                                            echo $setorDao->carrega_setores_lista();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary " id="btn-acao" value="Cadastrar" data-btn-acao>
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