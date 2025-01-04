<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];
    $vencimento = $_POST['vencimento'];
    $idleitura = $_POST['idleitura'];
   

        $update_query = "UPDATE fatura SET data='$data', valor='$valor', status='$status', vencimento='$vencimento', idleitura='$idleitura' WHERE id=$id";

        if (mysqli_query($mysqli, $update_query)) {
            echo "<script> alert('Editado com sucesso.'); </script>";
            //header("Location: ../View/listarpagamento.php");
            echo '<script>window.location.href = "../View/listarpagamento.php";</script>';
            exit;
        } else {
            echo "Erro na atualização: " . mysqli_error($mysqli);
        }
    }


$id_to_edit = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM fatura WHERE id=$id_to_edit");
$dados_pagamento = mysqli_fetch_array($result);

                
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pagamento</title>

     <!--Materialize-->
     <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<div class="box">

    <form action="editarpagamento.php" method="post">
    <fieldset>
                <legend>Editar pagamento</legend>
                <input type="hidden" name="id" value="<?php echo $dados_pagamento['id']; ?>">
            
                <div class="input-field">
                    <input type="date" name="data" id="data" value="<?php echo $dados_pagamento['data']; ?>" required>
                    <label for="data">Data fatura</label>
                </div>

             
                <div class="input-field">
                <input type="text" name="valor" id="valor" value="<?php echo $dados_pagamento['valor']; ?>" required>
                    <label for="valor">Valor da fatura</label>
                </div>

               
                <div class="input-field">
                <input type="text" name="status" id="status" value="<?php echo $dados_pagamento['status']; ?>" required>
                    <label for="status">Status</label>
                </div>

                <div class="input-field">
                <input type="date" name="vencimento" id="vencimento" value="<?php echo $dados_pagamento['vencimento']; ?>" required>
                    <label for="vencimento">Vencimento</label>
                </div>

               
                <div class="input-field">
    <select id="combobox" class="browser-default" name="idleitura">
        <option value="" disabled>Selecione</option>
        <?php
        $result_leitura = mysqli_query($mysqli, "SELECT l.id AS leitura_id, u.nome AS usuario_nome FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario INNER JOIN leitura l ON m.id = l.idmedidor");
        
        if ($result_leitura->num_rows > 0) {
            while ($dados_leitura = mysqli_fetch_assoc($result_leitura)) {
                $leitura_id = $dados_leitura['leitura_id'];
                $usuario_nome = $dados_leitura['usuario_nome'];
                $selected = ($leitura_id == $dados_pagamento['idleitura']) ? 'selected' : '';
                echo '<option value="' . $leitura_id . '" ' . $selected . '>' . $leitura_id . ' - ' . $usuario_nome . '</option>';
            }
        }
        ?>
    </select>
</div>



                <!-- Botão de editar -->
                <button class="btn waves-effect waves-light" type="submit" value="editar" name="editar">Editar
                    <i class="material-icons right">sync_alt</i>
                </button>

                <!-- Link para voltar para a página inicial -->
                <a href="../View/listarpagamento.php" class="btn-flat waves-effect">Sair</a>
            </fieldset>
    </form>
</div>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
<script src="../js/cadastro.js"></script>
</body>
</html>
