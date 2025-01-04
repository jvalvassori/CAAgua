<?php

// Conexão com o banco de dados usando MySQLi
include("../Controller/config.php");

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

// Agora você pode acessar o ID do usuário da sessão
$id = $_GET['id'];

// Consulta SQL para obter todas as leituras para um ID específico
$sql = "SELECT u.nome, l.dataleitura, l.leituraanterior, l.leituraatual, m.numserie
        FROM usuario u
        JOIN medidor m ON u.id = m.idusuario
        JOIN leitura l ON m.id = l.idmedidor
        WHERE u.id = ? ORDER BY l.id DESC"; // Usamos um marcador de posição '?' para o ID

// Preparar a declaração SQL
$stmt = $mysqli->prepare($sql);

// Verificar se a preparação da declaração foi bem-sucedida
if (!$stmt) {
    die("Erro na preparação da consulta: " . $mysqli->error);
}

// Vincular o parâmetro
$stmt->bind_param("i", $id);

// Executar a consulta SQL
$stmt->execute();

// Obter resultados
$result = $stmt->get_result();

// Inicialize uma variável para armazenar os dados que você deseja exibir no PDF
$pdf_content = "";

if ($result->num_rows > 0) {
    $pdf_content .= "<table style='border-collapse: collapse; width: 100%;'>";
    $pdf_content .= "<tr>";
    $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Nome</th>";
    $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Número de Série</th>";
    $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Leitura Anterior</th>";
    $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Leitura Atual</th>";
    $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Gastos em 3 meses (m³)</th>";
    $pdf_content .= "</tr>";

    while ($dados_leitura = $result->fetch_assoc()) {
        $pdf_content .= "<tr>";
        $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dados_leitura['nome'] . "</td>";
        $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dados_leitura['numserie'] . "</td>";
        $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . round($dados_leitura['leituraanterior']) . "</td>";
        $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . round($dados_leitura['leituraatual']) . "</td>";
        $res = $dados_leitura['leituraatual'] - $dados_leitura['leituraanterior'];
        $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $res ." m³" . "</td>";
        $pdf_content .= "</tr>";
        $nomes = $dados_leitura['nome'];
    }
    $pdf_content .= "</table>";
} else {
    print "Nenhum dado recebido!!!";
}

// Fechar a declaração
$stmt->close();

// Gerar PDF usando Dompdf
use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($pdf_content);

$dompdf->set_option('defaultFont', 'sans');

$dompdf->set_paper('A4', 'portrait');

$dompdf->render();

// Adicione uma mensagem de copyright ao final do PDF
$dompdf->loadHtml("<div style='text-align: center; margin-top: 20px; font-size: 10px; color: #000000;'>© 2023 CAàgua. Todos os direitos reservados.</div>");

// Renderizar o PDF novamente
$dompdf->render();

$dompdf->stream("Histórico_Leituras_de_$nomes.pdf");
?>
