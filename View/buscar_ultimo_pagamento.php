<?php
include_once("../Controller/config.php");

$idLeitura = $_GET["leitura_id"];


// Consulta SQL para buscar o último valor da leitura atual e da anterior
// $sql = "SELECT l.leituraatual, l.leituraanterior FROM leitura l INNER JOIN pagamento p ON l.id = p.idleitura WHERE idleitura = 11 ORDER BY leituraatual DESC LIMIT 1";
$sql = "SELECT leituraanterior, leituraatual FROM leitura WHERE id = $idLeitura";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $leitura_atual = $row["leituraatual"];
        $leitura_anterior = $row["leituraanterior"];
        
        $valor = 0;
        
        $consumo = $leitura_atual - $leitura_anterior;
          if($consumo <= 45){
            $valor = $consumo * 1.50;
            echo $valor;

            
        } elseif($consumo <= 75){
            $valor = $valor + 45 * 1.50;
            $acrescimo = $consumo - 45;
            $valor = $valor + $acrescimo * 5.00;
            echo $valor;

        }
        else{
            $valor = $valor + 45 * 1.50;
            $acrescimo = $consumo - 45;
            $valor = $valor + $acrescimo * 5.00;
            $adicao = $consumo - 75;
            $valor = $valor + $adicao * 10.00;
            echo $valor;

        }
        
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    echo "Erro ao buscar a última leitura.";
}
?>
