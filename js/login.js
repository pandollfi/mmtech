function verifica_erro() {
    document.getElementById('modalMsg').classList.remove('alert-danger');
    document.getElementById('modalMsg').classList.remove('alert-warning');
    document.getElementById('modalMsg').innerHTML = '';
    let erro = new URLSearchParams(location.search);
    let parametro = erro.get('e');
    let parametro_decode = atob(parametro);
    if (parametro_decode == 1) {
        $("#modalMsg").css("display", "");
        document.getElementById('modalMsg').classList.add('alert-danger');
        document.getElementById('modalMsg').innerHTML = 'Você não realizou o login';
        setTimeout(function () {
            $("#modalMsg").css("display", "none");
        }, 2000);
    } else if (parametro_decode == 2) {
        $("#modalMsg").css("display", "");
        document.getElementById('modalMsg').classList.add('alert-success');
        document.getElementById('modalMsg').innerHTML = 'Você saiu do sistema';
        setTimeout(function () {
            $("#modalMsg").css("display", "none");
        }, 2000);
    }
}


function enviaFormularioLogin(e) {
    e.preventDefault();
    document.getElementById('modalMsg').classList.remove('alert-success');
    document.getElementById('modalMsg').classList.remove('alert-warning');
    document.getElementById('modalMsg').classList.remove('alert-danger');
    document.getElementById('modalMsg').innerHTML = '';
    let formulario = document.querySelector('[data-form]');
    let dados_formulario = new FormData(formulario);
    $.ajax({
        type: 'POST',
        url: "src/ajax/request.php",
        data: dados_formulario,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            $("#modalMsg").css("display", "");
            document.getElementById('modalMsg').classList.add('mensagem-piscando');
            document.getElementById('modalMsg').classList.add(data.estilo);
            document.getElementById('modalMsg').innerHTML = data.descricao;
            if (data.cod == 100) {
                let sessao_base64 = btoa(data.sessao);
                document.getElementById("btn-login").disabled = true;
                setTimeout(function () {
                    $("#modalMsg").css("display", "none");
                    window.location = 'admin/index.php?s=' + sessao_base64;
                }, 1000);
            } else {
                setTimeout(function () {
                    $("#modalMsg").css("display", "none");
                }, 3000);
            }


        },
        error: function () {
        }


    });

}
