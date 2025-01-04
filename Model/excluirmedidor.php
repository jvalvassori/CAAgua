<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $delete = $mysqli->prepare("DELETE FROM medidor WHERE id = ?");
    $delete->bind_param("i", $id);
    
    if ($delete->execute()) {
        $_SESSION['success_message'] = 'Medidor excluído com sucesso.';
    } else {
        $_SESSION['error_message'] = 'Erro na exclusão: ' . $mysqli->error;
    }
    
    $delete->close();
    echo '<script>window.location.href = "../View/listarmedidor.php";</script>';
    exit;
}
?>

  


    