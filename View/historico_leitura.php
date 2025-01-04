<?php
session_start();
include("../Controller/config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem histórico</title>

     <!--Materialize-->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="container">
<table class="striped bordered" id="tab">
    <tbody>
        <tr>
            <th>Nome</th>
            <th>Número do relógio</th>
            <th>Data da leitura</th>
            <th>Leitura anterior</th>
            <th>Leitura atual</th>
            <th>Gastos em 3 meses</th>
           
        </tr>
        <?php
            // Agora você pode acessar o ID do usuário da sessão
            $id = $_GET['id'];
            $result = mysqli_query($mysqli, "SELECT u.id, u.nome, l.dataleitura, l.leituraanterior, l.leituraatual, m.numserie
            FROM usuario u JOIN medidor m ON u.id = m.idusuario JOIN leitura l ON m.id = l.idmedidor 
            WHERE u.id = $id ORDER BY l.id DESC");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_leitura = mysqli_fetch_array($result)) {
                
                echo "<tr>";
                echo "<td>" . $dados_leitura['nome'] . "</td>";
                echo "<td>" . $dados_leitura['numserie'] . "</td>";
                $dataInvertida = $dados_leitura['dataleitura'];
                $dataObj = new DateTime($dataInvertida);
                $dataFormatada = $dataObj->format('d\\\m\\\Y');
                echo "<td>" . $dataFormatada . "</td>";
                echo "<td>" . round ($dados_leitura['leituraanterior']) . "</td>";
                echo "<td>" . round($dados_leitura['leituraatual']) . "</td>";
                $res = $dados_leitura['leituraatual']  - $dados_leitura['leituraanterior'];
                echo "<td>" . $res . " m³". "</td>";
                echo "</tr>";
        
            }
           
 ?>

    </tbody>
    </table>
    <div class="hist">
        <a href="gerar_pdf.php?id=<?php echo $id; ?>" class="waves-effect waves-light btn green-button" id="butto">Gerar PDF</a>
    </div>
    <div class="sair">
    <a href="leitura.php" class='waves-effect waves-light btn'>Voltar</a>
    </div>
</div>


<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>