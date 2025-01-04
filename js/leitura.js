function preencherLeituraAnterior() {
    // Obtenha o valor selecionado no campo de seleção (ID do medidor)
    var medidor_id = document.getElementById("combobox").value;

    // Faça uma solicitação AJAX para buscar o último valor da "Leitura Atual" do banco de dados
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../View/buscar_ultima_leitura.php?medidor_id=" + medidor_id, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Atualize o campo "Leitura Anterior" com o valor obtido
            document.getElementById("leituraanterior").value = xhr.responseText;
            document.getElementById("leituraanterior").select();
            document.getElementById("dataleitura").select();
        }
    };

    xhr.send();
}

