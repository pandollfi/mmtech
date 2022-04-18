function enviaFormulario(e) {
    e.preventDefault();
    document.getElementById('modalMsg').classList.remove('alert-success');
    document.getElementById('modalMsg').classList.remove('alert-warning');
    document.getElementById('modalMsg').innerHTML = '';
    let formulario = document.querySelector('[data-form]');
    let dados_formulario = new FormData(formulario);
    let referencia = document.getElementById('referencia').value;
    let url = '../admin/lista_' + referencia + '.php';
    $.ajax({
        type: 'POST',
        url: "../src/ajax/request.php",
        data: dados_formulario,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            $("#modalMsg").css("display", "");
            document.getElementById('modalMsg').classList.add('mensagem-piscando');
            document.getElementById('modalMsg').classList.add(data.estilo);
            document.getElementById('modalMsg').innerHTML = data.descricao;
            if (referencia == 'funcionarios_editar') {
                url = '../admin/lista_funcionarios.php';
            }
            if (data.cod == 111) {
                document.getElementById("btn-acao").disabled = true;
                setTimeout(function () {
                    $("#modalMsg").css("display", "none");
                    window.location = url;
                }, 3000);

            }
            setTimeout(function () {
                $("#modalMsg").css("display", "none");
            }, 3000);
        },
        error: function () {
        }


    });

}