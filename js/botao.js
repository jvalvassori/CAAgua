
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

