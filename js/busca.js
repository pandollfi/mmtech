function enviaFormularioBusca(e) {
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
            if (data.cod) {
                $("#modalMsg").css("display", "");
                document.getElementById('modalMsg').classList.add('mensagem-piscando');
                document.getElementById('modalMsg').classList.add(data.estilo);
                document.getElementById('modalMsg').innerHTML = data.desc;
                document.getElementById('resposta_busca').innerHTML = '';
                setTimeout(function () {
                    $("#modalMsg").css("display", "none");

                }, 3000);
            } else {
                let resultado = '';
                let elemento;
                data.forEach(function (elemento) {
                    resultado += elemento;
                });
                document.getElementById('resposta_busca').innerHTML = resultado;

            }

        },
        error: function () {
        }


    });

}