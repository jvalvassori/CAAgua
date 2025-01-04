document.addEventListener('DOMContentLoaded', function () {
    // Selecione todos os botões com a classe 'pagar-button'
    const pagarButtons = document.querySelectorAll('.pagar-button');

    // Adicione um ouvinte de evento de clique a cada botão
    pagarButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Evite o comportamento padrão do botão (envio do formulário)

            // Obtenha o ID da fatura a partir do atributo 'id' do botão
            const idFatura = button.getAttribute('id').replace('pagar-', '');

            // Faça uma solicitação AJAX para atualizar o status para 'Pago'
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../Model/editarstatus.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Defina os dados do formulário
            const formData = new FormData();
            formData.append('id', idFatura);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Verifique se a resposta indica que a atualização foi bem-sucedida
                    if (xhr.responseText === 'success') {
                        // Atualize o botão para 'Pago' e desabilite-o
                        button.textContent = 'Pago';
                        button.disabled = true;
                    } else {
                        alert('Erro ao atualizar o status.');
                    }
                }
            };

            // Envie a solicitação AJAX com os dados do formulário
            xhr.send(formData);
        });
    });
});

// Recupere a posição da página armazenada na sessão
    var scrollPosition = sessionStorage.getItem('scrollPosition');

    // Verifique se a posição da página existe e não é nula
    if (scrollPosition !== null) {
        // Defina a posição da página para a posição armazenada
        window.scrollTo(0, parseInt(scrollPosition));
    }

    // Adicione um ouvinte de evento ao botão "Pago"
    document.getElementById('botaoPago').addEventListener('click', function () {
        // Armazene a posição atual da página na sessão
        sessionStorage.setItem('scrollPosition', window.scrollY);
    });