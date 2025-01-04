<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $delete = $mysqli->prepare("DELETE FROM fatura WHERE id = ?");
    $delete->bind_param("i", $id);

    if ($delete->execute()) {
        $_SESSION['success_message'] = 'A fatura foi excluída com sucesso.';
    } else {
        $_SESSION['error_message'] = 'Erro na exclusão: ' . $mysqli->error;
    }

    $delete->close();
    header('Location: ../View/listarpagamento.php');
    exit;
}
?>
