<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $status = $_POST['status'];
    $admin = $_POST['admin'];

    $update_query = "UPDATE usuario SET nome='$nome', cpf='$cpf', datanasc='$datanasc', email='$email', telefone='$telefone', senha='$senha', status='$status', admin='$admin' WHERE id=$id";

    if (mysqli_query($mysqli, $update_query)) {
    header("Location: ../View/listarusuario.php?success=1"); // Redireciona com parâmetro de sucesso
    exit;
} else {
    header("Location: ../View/listarusuario.php?error=" . mysqli_error($mysqli)); // Redireciona com erro
    exit;
}

}

$id_to_edit = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE id=$id_to_edit");
$dados_usuario = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

     <!--Materialize-->
     <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<div class="box">

    <form action="../Model/editarusuario.php" method="post">
    <fieldset>
                <legend>Editar Usuário</legend>
        <input type="hidden" name="id" value="<?php echo $dados_usuario['id']; ?>">
                <!-- Nome Completo -->
                <div class="input-field">
                    <input type="text" name="nome" id="nome" value="<?php echo $dados_usuario['nome']; ?>"  required>
                    <label for="nome">Nome Completo</label>
                </div>

                <!-- CPF -->
                <div class="input-field">
                    <input type="text" name="cpf" id="cpf" maxlength="11" value="<?php echo $dados_usuario['cpf']; ?>" required>
                    <label for="cpf">CPF</label>
                </div>

                <!-- Data de nascimento -->
                <div class="input-field">
                    <input type="date" name="datanasc" id="datanasc" value="<?php echo $dados_usuario['datanasc']; ?>" required>
                    <label for="datanasc">Data de nascimento</label>
                </div>

                <!-- E-mail -->
                <div class="input-field">
                    <input type="email" name="email" id="email" value="<?php echo $dados_usuario['email']; ?>" required>
                    <label for="email">E-mail</label>
                </div>

                <!-- Telefone -->
                <div class="input-field">
                    <input type="text" name="telefone" id="telefone" maxlength="11" value="<?php echo $dados_usuario['telefone']; ?>" required>
                    <label for="telefone">Telefone</label>
                </div>

                <!-- Senha -->
                <div class="input-field">
                    <input type="password" name="senha" id="senha" minlength="1" maxlength="20" required>
                    <label for="senha">Senha</label>
                </div>

                <!-- Status -->
                <div class="input-field">
                    <input type="text" name="status" id="status" value="<?php echo $dados_usuario['status']; ?>" required>
                    <label for="status">Status</label>
                </div>

                <!-- Admin -->
                <div class="input-field">
                    <input type="text" name="admin" id="admin" value="<?php echo $dados_usuario['admin']; ?>" required>
                    <label for="admin">Administrador</label>
                </div>

                <!-- Botão de editar -->
                <button class="btn waves-effect waves-light" type="submit" value="editar" name="editar">Editar
                    <i class="material-icons right">sync_alt</i>
                </button>

                <!-- Link para voltar para a página inicial -->
                <a href="../View/listarusuario.php" class="btn-flat waves-effect">Voltar</a>
            </fieldset>
    </form>
</div>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>
