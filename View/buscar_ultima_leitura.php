<?php
include_once("../Controller/config.php");

$medidor_id = $_GET["medidor_id"];

// Consulta SQL para buscar o último valor da "Leitura Atual"
$sql = "SELECT leituraatual FROM leitura WHERE idmedidor = $medidor_id ORDER BY leituraatual DESC LIMIT 1";
$result = mysqli_query($mysqli, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $leitura_atual = round($row["leituraatual"]);
        echo $leitura_atual;
    } 
} else {
    echo "Erro ao buscar a última leitura.";
}
?>
