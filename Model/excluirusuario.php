<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Inicie uma transação
    $mysqli->begin_transaction();

    try {
        // Exclua faturas relacionadas às leituras
        $deleteFaturas = $mysqli->prepare("DELETE FROM fatura WHERE idleitura IN (SELECT id FROM leitura WHERE idmedidor IN (SELECT id FROM medidor WHERE idusuario = ?))");
        $deleteFaturas->bind_param("i", $id);
        $deleteFaturas->execute();
        $deleteFaturas->close();

        // Exclua leituras relacionadas aos medidores
        $deleteLeituras = $mysqli->prepare("DELETE FROM leitura WHERE idmedidor IN (SELECT id FROM medidor WHERE idusuario = ?)");
        $deleteLeituras->bind_param("i", $id);
        $deleteLeituras->execute();
        $deleteLeituras->close();

        // Exclua medidores relacionados ao usuário
        $deleteMedidores = $mysqli->prepare("DELETE FROM medidor WHERE idusuario = ?");
        $deleteMedidores->bind_param("i", $id);
        $deleteMedidores->execute();
        $deleteMedidores->close();

        // Exclua o usuário
        $deleteUsuario = $mysqli->prepare("DELETE FROM usuario WHERE id = ?");
        $deleteUsuario->bind_param("i", $id);

        if ($deleteUsuario->execute()) {
            // Confirme a transação
            $mysqli->commit();
            $_SESSION['success_message'] = 'Usuário excluído com sucesso.';
        } else {
            // Reverta a transação em caso de erro
            $mysqli->rollback();
            $_SESSION['error_message'] = 'Erro na exclusão do usuário: ' . $mysqli->error;
        }

        $deleteUsuario->close();
    } catch (Exception $e) {
        // Em caso de exceção, reverta a transação
        $mysqli->rollback();
        $_SESSION['error_message'] = 'Erro na exclusão: ' . $e->getMessage();
    }

    // Redirecione para a página de listagem de usuários
    //header("Location: ../View/listarusuario.php");
    echo '<script>window.location.href = "../View/listarusuario.php";</script>';
    exit;
}
?>
