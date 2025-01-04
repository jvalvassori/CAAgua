<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
    
</head>
<body>
    <div class="box">
        <form action="cadastrausuario.php" method="post">
        <fieldset>
                <legend>Cadastro de Usuário</legend>

                <!-- Nome Completo -->
                <div class="input-field">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome">Nome Completo</label>
                </div>

                <!-- CPF -->
                <div class="input-field">
                    <input type="text" name="cpf" id="cpf" maxlength="11"  class="cpf-mask" required>
                    <label for="cpf">CPF</label>
                </div>

                <!-- Data de nascimento -->
                <div class="input-field">
                    <input type="date" name="datanasc" id="datanasc" required>
                    <label for="datanasc">Data de nascimento</label>
                </div>

                <!-- E-mail -->
                <div class="input-field">
                    <input type="email" name="email" id="email" required>
                    <label for="email">E-mail</label>
                </div>

                <!-- Telefone -->
                <div class="input-field">
                    <input type="tel" name="telefone" id="telefone" maxlength="11" required>
                    <label for="telefone">Telefone</label>
                </div>

                <!-- Senha -->
                <div class="input-field">
                    <input type="password" name="senha" id="senha" minlength="8" maxlength="20" required>
                    <label for="senha">Senha</label>
                </div>

                 <!-- Status -->
                <div class="input-field">
                    <input type="text" name="status" id="status" required oninput="this.value = this.value.toLowerCase()">
                    <label for="status">Status(Ativo = "s" Desativado = "n")</label>
                </div>

                <!-- Admin -->
                <div class="input-field">
                    <input type="text" name="admin" id="admin" required oninput="this.value = this.value.toLowerCase()">
                    <label for="admin">Administrador(Ativo = "s" Desativado = "n")</label>
                </div>

                <!-- Botão de Cadastro -->
                <button class="btn waves-effect waves-light" type="submit" name="Cadastrar">Cadastrar
                    <i class="material-icons right">send</i>
                </button>

                <!-- Link para voltar para a página inicial -->
                <a href="../View/admin.php" class="btn-flat waves-effect">Voltar</a>
            </fieldset>
        </form>

        <?php
        include_once("../Controller/config.php");
        if (isset($_POST["Cadastrar"])) {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $datanasc = date('Y-m-d', strtotime($_POST["datanasc"]));
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
            $status = $_POST["status"];
            $admin = $_POST["admin"];
            try {
                $result = mysqli_query($mysqli, "INSERT INTO usuario(nome,cpf,datanasc,email,telefone,senha,status,admin) 
                VALUES('$nome','$cpf','$datanasc','$email','$telefone','$senha','$status','$admin')");
                echo "<script> alert('Cadastrado com sucesso.');</script>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        ?>
    </div>

    <!-- Materialize JS -->
    <script src="../js/materialize.js"></script>
</body>
</html>
