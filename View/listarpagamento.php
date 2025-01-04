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
    <link rel="stylesheet" href="../js/status.js">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="container">
<table class="striped bordered">
    <tbody>
        <tr>
            <th>Nome</th>
            <th>Data da fatura</th>
            <th>Valor da fatura</th>
            <th>Status</th>
            <th>Vencimento da fatura</th>
            <th>Id da leitura</th>
        </tr>
        <?php
            
            $result = mysqli_query($mysqli, "SELECT f.id, f.data, f.valor, f.status, f.vencimento , f.status, f.idleitura, u.nome FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario INNER JOIN leitura l ON m.id = l.idmedidor INNER JOIN fatura f ON l.id = f.idleitura");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_fatura = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dados_fatura['nome'] . "</td>";
                echo "<td>" . $dados_fatura['data'] . "</td>";
                $valor = $dados_fatura['valor'];
                echo "<td>" . number_format($valor, 2, ',', '.') . "</td>";
                echo "<td>" . $dados_fatura['status'] . "</td>";
                echo "<td>" . $dados_fatura['vencimento'] . "</td>";
                echo "<td>" . $dados_fatura['idleitura'] . "</td>";
                echo "<td>
                    <form action=\"../Model/editarpagamento.php\" method=\"get\">
                    <input type='hidden' name='id' value='" . $dados_fatura['id'] . "'>
                    <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_fatura['id'] . "\">Editar</button>
                    </form>
                    </td>";
        
               
                    // echo "<td>  <form action=\"../Model/excluirpagamento.php\" method=\"post\">
                    // <input type=\"hidden\" name=\"id\" value=\"" . $dados_fatura['id'] . "\">
                    // <button type=\"submit\" class=\"waves-effect waves-light btn\" title=\"" . $dados_fatura['id'] . "\" onclick=\"return confirmDelete();\">Excluir</button>
                    // </form></td>";

                    echo "<td>  <form action=\"../Model/editarstatus.php\" method=\"post\">
                    <input type=\"hidden\" name=\"id\" value=\"" . $dados_fatura['id'] . "\">
                    <button type=\"submit\" class=\"waves-effect waves-light btn pagar-button\"  title=\"" . $dados_fatura['id'] . "\  id=\"botaoPago\">Pago</button>
                    </form></td>";
                echo "</tr>";
            }
             
 ?>

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