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
            <th>Numero da série</th>
            <th>Marca</th>
            <th>Data inicio do funcionamento do medidor</th>
            <th>Data da previsão de troca</th>
            <th>Id do usuario</th>
           
        </tr>
        <?php
            

            $result = mysqli_query($mysqli, "SELECT u.nome, m.id, m.numserie, m.marca, m.datainicio, m.dataprevistatroca, m.idusuario FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_medidor = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dados_medidor['nome'] . "</td>";
                echo "<td>" . $dados_medidor['numserie'] . "</td>";
                echo "<td>" . $dados_medidor['marca'] . "</td>";
                echo "<td>" . $dados_medidor['datainicio'] . "</td>";
                echo "<td>" . $dados_medidor['dataprevistatroca'] . "</td>";
                echo "<td>" . $dados_medidor['idusuario'] . "</td>";
                echo "<td>
                    <form action=\"../Model/editarmedidor.php\" method=\"get\">
                    <input type='hidden' name='id' value='" . $dados_medidor['id'] . "'>
                    <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_medidor['id'] . "\">Editar</button>
                    </form>
                    </td>";
        
               
                // echo "<td>  <form action=\"../Model/excluirmedidor.php\" method=\"post\">
                // <input type=\"hidden\" name=\"id\" value=\"" . $dados_medidor['id'] . "\">
                // <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_medidor['id'] . "\">Excluir</button>
                // </form></td>";
                // echo "</tr>";
            }
             
 ?>

    </tbody>
    </table>
    <div>
    <a href="../View/admin.php" class='waves-effect waves-light btn'>Sair</a>
    </div>
</div>


<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>