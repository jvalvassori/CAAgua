<?php
session_start();
include("../Controller/config.php");
include("../Controller/menu.php");

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
    <title>Pagamento</title>
    <!--Materialize-->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/ppagamento.css">

</head>
<body>
    
<?php
    
       $result = mysqli_query($mysqli, "SELECT u.id, u.nome, f.vencimento, f.valor, m.numserie, f.status, l.leituraatual, l.leituraanterior
       FROM usuario u
       INNER JOIN medidor m ON u.id = m.idusuario
       INNER JOIN leitura l ON m.id = l.idmedidor
       INNER JOIN fatura f ON l.id = f.idleitura
       WHERE u.id = $id
       ORDER BY f.idleitura DESC 
       LIMIT 1");

     if (!$result) {
         die("Erro na consulta SQL: " . mysqli_error($mysqli));
     }

     if (mysqli_num_rows($result) > 0) {
         $dados_pagamento = mysqli_fetch_array($result);
         echo "<div class=\"container\"><h6>Olá " . $dados_pagamento['nome'] . "</h6></div>";
      
     
        echo "<div id=\"lei\"><h4>Seu pagamento atual</h4></div>";

        echo "<div class=\"container\" id=\"quadra\">";
        echo "<span id=\"data1\">Data do vencimento </span>";
        $dataInvertida = $dados_pagamento['vencimento'];
        $dataObj = new DateTime($dataInvertida);
        $dataFormatada = $dataObj->format('d \\\ m \\\ Y');
        echo "<span id=\"data2\">".$dataFormatada."</span>";
        echo "<span id=\"gasto\">Valor</span>";
        $numatual = $dados_pagamento['leituraatual'];
        $numanterior = $dados_pagamento['leituraanterior'];
        
        $valor = 0;
        
        $consumo = $numatual - $numanterior;
          if($consumo <= 45){
            $valor = $consumo * 1.50;
            echo "<span id=\"gasto2\">R$ " . number_format($valor, 2, ',', '.') . "</span>";
            
        } elseif($consumo <= 75){
            $valor = $valor + 45 * 1.50;
            $acrescimo = $consumo - 45;
            $valor = $valor + $acrescimo * 5.00;
            echo "<span id=\"gasto2\">R$ " . number_format($valor, 2, ',', '.') . "</span>";

        }
        else{
            $valor = $valor + 45 * 1.50;
            $acrescimo = $consumo - 45;
            $valor = $valor + $acrescimo * 5.00;
            $adicao = $consumo - 75;
            $valor = $valor + $adicao * 10.00;
            echo "<span id=\"gasto2\">R$ " . number_format($valor, 2, ',', '.') . "</span>";
        }
        
        echo "</div>"; 

        echo "<div class=\"container\" id=\"quadra2\">";
        echo "<span id=\"data1\">Número medidor</span>";
        echo "<span id=\"num\">".$dados_pagamento['numserie']."</span>";
        echo "<span id=\"fari\">Status</span>";
        $status = $dados_pagamento['status'];
        if ($status == "s") {
            echo "<span class=\"verde\" id=\"espaco\">Pago</span>";
        } else {
            echo "<span class=\"amarelo\" id=\"espaco1\">Pendente</span>";
        }
        echo "</div>";

    }   else {
        echo "<div class=\"container\"><h6>Usuário não encontrado.</h6></div>";
     }
        
     echo "<a href=\"historico_pagamento.php?id=" . $id . "\" class=\"waves-effect waves-light btn green-button\" id=\"butto\">Histórico completo</a>";



        echo "<h5 id=\"fras\">" .
        "Preservar a água é garantir um amanhã sustentável." .
        "</h5>";
        
        
        ?>
    

    </body>
</html>