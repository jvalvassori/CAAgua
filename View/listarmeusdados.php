<?php
session_start();
include("../Controller/config.php");

// Verifique se o usuário está logado (tem uma sessão)
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redirecione para a página de login ou exiba uma mensagem de erro.
    // Por exemplo, redirecione para a página de login:
   echo '<script>window.location.href = "index.php";</script>';
    exit();
}
// Agora você pode acessar o ID do usuário da sessão
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>

     <!--Materialize-->
     <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="container">
<table class="striped bordered">
    <tbody>
        <tr>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Data de nascimento</th>
            <th>E-mail</th>
            <th>Telefone</th>
           
        </tr>
        <?php
            

            $result = mysqli_query($mysqli, "SELECT u.nome, u.cpf, u.datanasc, u.email, u.telefone FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario INNER JOIN leitura l ON m.id = l.idmedidor WHERE u.id = $id");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            $dados_leitura = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $dados_leitura['nome'] . "</td>";
                $cpf = $dados_leitura['cpf'];
                $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                echo "<td>" . $cpf_formatado . "</td>";

                echo "<td>" . date('d/m/Y', strtotime($dados_leitura['datanasc'])) . "</td>";
                echo "<td>" . $dados_leitura['email'] . "</td>";
                $telefone = $dados_leitura['telefone'];
                $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
                echo "<td>" . $telefone_formatado . "</td>";

                echo "</tr>";
            
             
 ?>

    </tbody>
    </table>
    <div>
    <a href="../View/leitura.php" class='waves-effect waves-light btn'>Voltar</a>
    </div>
</div>


<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>