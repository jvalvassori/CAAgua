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
$sql = "SELECT u.id, u.nome, m.numserie, f.data, f.valor, f.status, f.vencimento
        FROM usuario u 
        JOIN medidor m ON u.id = m.idusuario 
        JOIN leitura l ON m.id = l.idmedidor 
        JOIN fatura f ON l.id = f.idleitura
        WHERE u.id = ? ORDER BY f.id DESC" ; // Usamos um marcador de posição '?' para o ID

// Preparar a declaração SQL
$stmt = $mysqli->prepare($sql);

// Verificar se a preparação da declaração foi bem-sucedida
if ($stmt) {
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
        $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Data do pagamento</th>";
        $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Valor</th>";
        $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Status</th>";
        $pdf_content .= "<th style='border: 1px solid #000; padding: 5px;'>Data do vencimento</th>";
        $pdf_content .= "</tr>";

        while ($dados_pagamento = mysqli_fetch_array($result)) {
            $pdf_content .= "<tr>";
            $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dados_pagamento['nome'] . "</td>";
            $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dados_pagamento['numserie'] . "</td>";
                $dataInvertida = $dados_pagamento['data'];
                $dataObj = new DateTime($dataInvertida);
                $dataFormatada = $dataObj->format('d\\\m\\\Y');
            $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dataFormatada . "</td>";
            $valor = $dados_pagamento['valor'];
            $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>R$ " . number_format($valor, 2, ',', '.') . "</td>";
            $status = $dados_pagamento['status'];
                if($status == "s"){ 
                    $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . "Pago" . "</td>";
                }else{
                    $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>". "Não pago" . "</td>";
                }
                $dataInverti = $dados_pagamento['vencimento'];
                $dataO = new DateTime($dataInverti);
                $dataFormat = $dataO->format('d\\\m\\\Y');
                $pdf_content .= "<td style='border: 1px solid #000; padding: 5px;'>" . $dataFormat . "</td>";
        
            $pdf_content .= "</tr>";
            $nomes = $dados_pagamento['nome'];
        }
        $pdf_content .= "</table>";
    } else {
        print "Nenhum dado recebido!!!";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    die("Erro na preparação da consulta: " . $mysqli->error);
}

// Gerar PDF usando Dompdf
use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($pdf_content);

$dompdf->set_option('defaultFont', 'sans');

$dompdf->set_paper('A4', 'portrait');

$dompdf->render();

// Adicione uma mensagem de copyright ao final do PDF
$dompdf->loadHtml("<div style='text-align: center; margin-top: 20px; font-size: 10px; color: #000000;'>© 2023 Caágua. Todos os direitos reservados.</div>");

// Renderizar o PDF novamente
$dompdf->render();

$dompdf->stream("Histórico_Pagamentos_de_$nomes.pdf");
?>
