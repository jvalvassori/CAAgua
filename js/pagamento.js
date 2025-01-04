function preencherValor() {
    // Obtenha o valor selecionado no campo de seleção (ID do pagamento)
    var Leitura_id = document.getElementById("combobox").value;

    // Faça uma solicitação AJAX para buscar o valor da fatura calculado do banco de dados
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../View/buscar_ultimo_pagamento.php?leitura_id=" + Leitura_id, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Atualize o campo "Valor da Fatura" com o valor obtido
            document.getElementById("valorfat").value = xhr.responseText;
            document.getElementById("valorfat").select();
            document.getElementById("data").select();
        }
    };

    xhr.send();
}

    // Selecione os campos de data
    const dataPagamento = document.getElementById('data');
    const dataVencimento = document.getElementById('vencimento');

    // Adicione um ouvinte de evento ao campo "Data do Pagamento"
    dataPagamento.addEventListener('change', function () {
        // Obtenha a data de pagamento selecionada
        const dataPagamentoValue = new Date(dataPagamento.value);

        // Adicione 7 dias à data de pagamento
        dataPagamentoValue.setDate(dataPagamentoValue.getDate() + 7);

        // Formate a data de vencimento no formato "yyyy-mm-dd" para preenchimento do campo
        const vencimentoFormatado = dataPagamentoValue.toISOString().split('T')[0];

        // Preencha automaticamente o campo "Data de Vencimento"
        dataVencimento.value = vencimentoFormatado;
    });
