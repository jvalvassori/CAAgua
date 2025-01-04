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
            <th>Data do pagamento</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Data de vencimento</th>
           
        </tr>
        <?php
            // Agora você pode acessar o ID do usuário da sessão
            $id = $_GET['id'];
            $result = mysqli_query($mysqli, "SELECT u.id, u.nome, m.numserie, f.data, f.valor, f.status, f.vencimento
                                             FROM usuario u 
                                             JOIN medidor m ON u.id = m.idusuario 
                                             JOIN leitura l ON m.id = l.idmedidor 
                                             JOIN fatura f ON l.id = f.idleitura
                                             WHERE u.id = $id ORDER BY f.id DESC");
            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($mysqli));
            }

            while ($dados_pagamento = mysqli_fetch_array($result)) {
                
                echo "<tr class='destacar'>";
                echo "<td>" . $dados_pagamento['nome'] . "</td>";
                echo "<td>" . $dados_pagamento['numserie'] . "</td>";
                $dataInvertida = $dados_pagamento['data'];
                $dataObj = new DateTime($dataInvertida);
                $dataFormatada = $dataObj->format('d\\\m\\\Y');
                echo "<td>" .$dataFormatada . "</td>";
                $valor = $dados_pagamento['valor'];
                echo "<td>"."R$ " . number_format($valor, 2, ',', '.') . "</td>";
                $status = $dados_pagamento['status'];
                if($status == "s"){ 
                    echo "<td>"."Pago"."</td>";
                }else{
                    echo "<td>"."Não pago"."</td>";;  
                }
                $dataInverti = $dados_pagamento['vencimento'];
                $dataO = new DateTime($dataInverti);
                $dataFormat = $dataO->format('d\\\m\\\Y');
                echo "<td>" .$dataFormat . "</td>";
                echo "</tr>";
        
            }
           
 ?>

    </tbody>
    </table>
    <div class="hist">
        <a href="gerar_pdf_pagamento.php?id=<?php echo $id; ?>" class="waves-effect waves-light btn green-button" id="butto">Gerar PDF</a>
    </div>
    <div class="sair">
    <a href="pagamento.php" class='waves-effect waves-light btn'>Voltar</a>
    </div>
</div>


<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>