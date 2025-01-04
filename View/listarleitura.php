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
            <th>Data da leitura</th>
            <th>Leitura Anterior</th>
            <th>Leitura Atual</th>
            <th>M³ gastos</th>
            <th>Id do medidor</th>
           
        </tr>
        <?php
            

            $result = mysqli_query($mysqli, "SELECT u.nome, l.id, l.dataleitura, l.leituraanterior, l.leituraatual, l.idmedidor FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario INNER JOIN leitura l ON m.id = l.idmedidor");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_leitura = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dados_leitura['nome'] . "</td>";
                echo "<td>" . $dados_leitura['dataleitura'] . "</td>";
                echo "<td>" . round($dados_leitura['leituraanterior']) . "</td>";
                echo "<td>" . round($dados_leitura['leituraatual']) . "</td>";
                $resu = $dados_leitura['leituraatual'] - $dados_leitura['leituraanterior'];
                echo "<td>" . $resu . "</td>";
                echo "<td>" . $dados_leitura['idmedidor'] . "</td>";
                echo "<td>
                    <form action=\"../Model/editarleitura.php\" method=\"get\">
                    <input type='hidden' name='id' value='" . $dados_leitura['id'] . "'>
                    <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_leitura['id'] . "\">Editar</button>
                    </form>
                    </td>";
        
               
                // echo "<td>  <form action=\"../Model/excluirleitura.php\" method=\"post\">
                // <input type=\"hidden\" name=\"id\" value=\"" . $dados_leitura['id'] . "\">
                // <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_leitura['id'] . "\" onclick=\"return confirmDelete();\">Excluir</button>
                // </form></td>";
                // echo "</tr>";
            }
             
 ?>
  <script>
            function confirmDelete() {
                console.log("Função confirmDelete() chamada."); // Adicione esta linha para depuração
                return confirm('Tem certeza que quer deletar essa leitura? Todos os dados serão apagados.');
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