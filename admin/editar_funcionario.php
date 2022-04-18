<?php
@ob_start();
@session_start();
require_once('header.php');
require_once('../src/dao/setor_dao.php');
require_once('../src/dao/busca_dao.php');
$checked_ativo = null;
$checked_inativo = null;
$setorDao = new SetorDao();
$dao = new BuscaDao();
$id = base64_decode($_GET['i']);
$funcionario = $dao->carrega_funcionario_detalhe($id);
$funcionario['ativo'] == 1 ? $checked_ativo = "selected = 'selected'" : $checked_inativo = "selected='selected'";


// if ($funcionario['ativo'] == 1) {
//     $checked_ativo = 'checked';
// } else {
//     $checked_inativo = 'checked';
// }

?>
<script src="<?php echo URL; ?> . 'js/cadastro_funcionarios.js"></script>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="alert" role="alert" style="display:none;" id="modalMsg"></div>
                    <div class="card-header">
                        <h3 class="card-title">Editar Funcionário</h3>
                    </div>
                    <form method="POST" role="form" data-form>
                        <input type="hidden" id="referencia" name="referencia" value="funcionarios_editar">
                        <input type="hidden" id="id" name="id" value="<?php echo $funcionario['id']; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titulo">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do funcionario" value="<?php echo $funcionario['nome']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" id="telefone" name="telefone" placeholder="Digite o número de telefone" value="<?php echo $funcionario['telefone']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Descreva o e-mail do funcionario" value="<?php echo $funcionario['email']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="setor">Situação</label>
                                        <select class="form-control" id="ativo" name="ativo">
                                            <option value="1" <?php echo $checked_ativo; ?>>Usuário Ativo</option>
                                            <option value="9" <?php echo $checked_inativo; ?>>Usuário Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="setor">Setor(es):</label>
                                        <input type="text" class="form-control" value="<?php echo $funcionario['setores']; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary " id="btn-acao" value="Alterar" data-btn-acao>
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