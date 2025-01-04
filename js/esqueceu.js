document.getElementById('esqueceuSenhaLink').addEventListener('click', function() {
    // Prompt the user for their name and email
    var userFullName = prompt('Por favor, insira seu nome completo:');
    var userEmail = prompt('Por favor, insira seu endereço de e-mail:');

    // Check if the user provided a name and email
    if (userFullName && userEmail) {
        // Send an email to the administrator
        var adminEmail = "email_do_administrador@example.com";
        var subject = "Solicitação de Redefinição de Senha";
        var message = "O usuário " + userFullName + " solicitou uma redefinição de senha. Email: " + userEmail;
        var mailtoLink = "mailto:" + adminEmail + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(message);

        // Open the default email client with the email information
        window.location.href = mailtoLink;
    } else {
        alert('Por favor, forneça seu nome completo e endereço de e-mail.');
    }
});

