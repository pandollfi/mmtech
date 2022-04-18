<?php
@ob_start();
@session_start();
require 'header.php';
require_once RAIZ . 'src/dao/setor_dao.php';
$dao = new SetorDao();
?>
<style>
    .results tr[visible='false'],
    .no-result {
        display: none;
    }

    .results tr[visible='true'] {
        display: table-row;
    }

    .counter {
        padding: 8px;
        color: #ccc;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Lista Setores</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pesquisar:</label>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-right">
                        <div class="form-group pull-left">
                            <input id="search" type="text" class="search form-control" placeholder="Digite o nome do setor...">
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo URL_ADMIN; ?>cadastro_setores.php"><button class="btn btn-primary">Cadastrar Setor</button></a>
                    </div>
                </div>
            </div>

            <?php
            echo $dao->lista_setores_tabela();
            ?>
            </table>
        </div>
    </div>
    </div>
</section>



<?php
require 'footer.php';
?>

<script>
    $(document).ready(function() {
        $("#search").keyup(function() {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                        (
                            match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                $(this).attr('visible', 'true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');

            if (jobCount == '0') {
                $('.no-result').show();
            } else {
                $('.no-result').hide();
            }
        });
    });
</script>