<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $update = $mysqli->prepare("UPDATE fatura SET status = 's' WHERE id = ?");
    $update->bind_param("i", $id);
    
    if ($update->execute()) {
        $_SESSION['success_message'] = 'A fatura foi paga com sucesso.';
    } else {
        $_SESSION['error_message'] = 'Erro na atualização: ' . $mysqli->error;
    }
    
    $update->close();
    //header("Location: ../View/listarpagamento.php");
    echo '<script>window.location.href = "../View/listarpagamento.php";</script>';
    exit;
}
?>
