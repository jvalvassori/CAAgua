<?php
session_start();
include("../Controller/config.php");
//include("../Controller/menu.php");
// Definir uma variável para armazenar mensagens de erro
$error_message = "";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/materialize.css">
</head>
<body>
<div class="col s12 m6 offset-m3">

<h5 id="frase">Preserve a água, a fonte da vida.<br>Cada gota conta para um futuro sustentável.</h5>

<h5 id="frase">Bem-vindo(a) ao</h5>
<div class="imagem-container">
    <img class="im" src="../img/Logo_TCC.png" alt="Logo">
</div>
<div class="login">
        <form action="index.php" method="post">
            <div class="campo">Email</div>
            <input type="text" placeholder="E-mail" name="email">
            <div class="campo">Senha</div>
            <input type="password" placeholder="Senha" name="senha">
            <input id="tao" type="submit" name="submit" value="Entrar" class="waves-effect waves-light btn">
          <div class="cadas"><a href="https://api.whatsapp.com/send?phone=55996714200&text=Esqueci%20minha%20senha%2C%20por%20favor%2C%20me%20ajude%21" class="cadastro" id="esqueceuSenhaLink">Esqueceu sua senha</a></div>

        </form>
    </div>
    
    <a id="sobre-link" href="sobre.html">Sobre mim</a>
   
    <?php 
if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Verificar se os campos estão vazios
    if(empty($email) || empty($senha)){
        $error_message = "Por favor, preencha todos os campos.";
    } else {
        // Use prepared statements for both email and password
        $sql = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();
             if ($user['status'] === 's') {
            // Verificar a senha
            if(password_verify($senha, $user['senha'])){
                // Set session variables if needed
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nome'];
                $_SESSION['user_email'] = $user['email'];
            
                // Redirect using JavaScript
                echo '<script>window.location.href = "' . ($user['admin'] === "s" ? "admin.php" : "leitura.php") . '";</script>';
                exit();
            }else {
                $error_message = "Usuário ou senha incorretos";
            }
            
             } else {
        $error_message = "Usuário não está ativo. Entre em contato com o suporte.";
    }
        } else {
            $error_message = "Usuário ou senha incorretos";
        }
    }
}

if (!empty($error_message)) {
    echo " <script> alert('$error_message');</script>";
}


session_destroy();
?>



   <footer  id="rodape">
                    <p id="paragrafo">&copy;  2023 - <?php echo date("Y"); ?> CAágua. Todos os direitos reservados.</p>
                    
    </footer>


</body>
</html>