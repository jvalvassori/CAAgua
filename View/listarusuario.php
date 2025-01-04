<?php
session_start();
include("../Controller/config.php");
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
            <th>CPF</th>
            <th>Data de nascimento</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Status</th>
            <th>Admin</th>
        </tr>
        <?php
           
            $result = mysqli_query($mysqli, "SELECT * FROM usuario");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_usuario = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dados_usuario['nome'] . "</td>";
                echo "<td>" . $dados_usuario['cpf'] . "</td>";
                echo "<td>" . $dados_usuario['datanasc'] . "</td>";
                echo "<td>" . $dados_usuario['email'] . "</td>";
                echo "<td>" . $dados_usuario['telefone'] . "</td>";
                echo "<td>" . $dados_usuario['status'] . "</td>";
                echo "<td>" . $dados_usuario['admin'] . "</td>";
                echo "<td>
                    <form action=\"../Model/editarusuario.php\" method=\"get\">
                    <input type='hidden' name='id' value='" . $dados_usuario['id'] . "'>
                    <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_usuario['id'] . "\">Editar</button>
                    </form>
                    </td>";
            
                // echo "<td>  <form action=\"../Model/excluirusuario.php\" method=\"post\">
                // <input type=\"hidden\" name=\"id\" value=\"" . $dados_usuario['id'] . "\">
                // <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\" ". $dados_usuario['id'] . "\" onclick=\"return confirmDelete();\">Excluir</button>
                // </form></td>";
                // echo "</tr>";
            }
             
 ?>
            <script>
            function confirmDelete() {
                console.log("Função confirmDelete() chamada."); // Adicione esta linha para depuração
                return confirm('Tem certeza que quer deletar esse usuário? Todos os dados serão apagados.');
            }

</script>

    </tbody>
    </table>
    <div>
    <a href="../View/admin.php" class='waves-effect waves-light btn'>Voltar</a>
    </div>
</div>


<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>