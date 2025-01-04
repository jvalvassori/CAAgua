<?php
session_start();
include("../Controller/config.php");
include("../Controller/menu.php");

// Verifique se o usuário está logado (tem uma sessão)
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redirecione para a página de login ou exiba uma mensagem de erro.
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
    <title>Leitura</title>
    <!--Materialize-->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/pleitura.css">

</head>
<body>
    
<?php
    
       $result = mysqli_query($mysqli, "SELECT u.id, u.nome, l.dataleitura, l.leituraanterior, l.leituraatual, m.numserie
                                        FROM usuario u
                                        INNER JOIN medidor m ON u.id = m.idusuario
                                        INNER JOIN leitura l ON m.id = l.idmedidor
                                        WHERE u.id = $id
                                        ORDER BY l.leituraatual DESC 
                                        LIMIT 1");

     if (!$result) {
         die("Erro na consulta SQL: " . mysqli_error($mysqli));
     }

     if (mysqli_num_rows($result) > 0) {
         $dados_leitura = mysqli_fetch_array($result);
         echo "<div class=\"container\"><h6>Olá " . $dados_leitura['nome'] . "</h6></div>";
      
     
        echo "<div id=\"lei\"><h4>Sua leitura atual</h4></div>";

        echo "<div class=\"container\" id=\"quadra\">";
        echo "<span id=\"data1\">Data da leitura </span>";
        $dataInvertida = $dados_leitura['dataleitura'];
        $dataObj = new DateTime($dataInvertida);
        $dataFormatada = $dataObj->format('d \\\ m \\\ Y');
        echo "<span id=\"data2\">".$dataFormatada."</span>";
        echo "<span id=\"gasto\">Gastos nos últimos 3 meses</span>";
        $numatual = $dados_leitura['leituraatual'];
        $numanterior = $dados_leitura['leituraanterior'];
        $resultado = $numatual - $numanterior;
        echo "<span id=\"gasto2\">".$resultado." m³</span>";
        
       
        echo "</div>"; 

        echo "<div class=\"container\" id=\"quadra2\">";
        echo "<span id=\"data1\">Número medidor</span>";
        echo "<span id=\"num\">".$dados_leitura['numserie']."</span>";
        echo "<span id=\"ga\">Leitura anterior</span>";
        echo "<span id=\"gast\">".round($dados_leitura['leituraanterior'])."</span>";
        echo "<span id=\"fari\">Leitura atual</span>";
        echo "<span id=\"espaco\">".round($dados_leitura['leituraatual'])."</span>";
        echo "</div>"; 

    }   else {
        echo "<div class=\"container\"><h6>Usuário não encontrado.</h6></div>";
     }
        
     echo "<a href=\"historico_leitura.php?id=" . $id . "\" class=\"waves-effect waves-light btn green-button\" id=\"butto\">Histórico completo</a>";



        echo "<h5 id=\"fras\">" .
        "Cuide da água, cuide do planeta, água é vida!" .
        "</h5>";
        
        
        
        ?>
    

    </body>
</html>