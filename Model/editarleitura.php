<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $dataleitura = $_POST['dataleitura'];
    $leituraanterior = round($_POST['leituraanterior']);
    $leituraatual = round($_POST['leituraatual']);
    $idmedidor = $_POST['idmedidor'];
   

        $update_query = "UPDATE leitura SET dataleitura='$dataleitura', leituraanterior='$leituraanterior', leituraatual='$leituraatual', idmedidor='$idmedidor' WHERE id=$id";

        if (mysqli_query($mysqli, $update_query)) {
            echo "<script> alert('Editado com sucesso.'); </script>";
            //header("Location: ../View/listarleitura.php");
            echo '<script>window.location.href = "../View/listarleitura.php";</script>';
            exit;
        } else {
            echo "Erro na atualização: " . mysqli_error($mysqli);
        }
    }


$id_to_edit = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM leitura WHERE id=$id_to_edit");
$dados_leitura = mysqli_fetch_array($result);

                
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar leitura</title>

     <!--Materialize-->
     <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<div class="box">

    <form action="editarleitura.php" method="post">
    <fieldset>
                <legend>Editar leitura</legend>
                <input type="hidden" name="id" value="<?php echo $dados_leitura['id']; ?>">
            
                <div class="input-field">
                    <input type="date" name="dataleitura" id="dataleitura" value="<?php echo $dados_leitura['dataleitura']; ?>" required>
                    <label for="dataleitura">Data leitura</label>
                </div>

             
                <div class="input-field">
                <input type="text" name="leituraanterior" id="leituraanterior" value="<?php echo round($dados_leitura['leituraanterior']); ?>" required>
                    <label for="leituraanterior">Leitura anterior</label>
                </div>

               
                <div class="input-field">
                <input type="text" name="leituraatual" id="leituraatual" value="<?php echo round($dados_leitura['leituraatual']); ?>" required>
                    <label for="leituraatual">Leitura atual</label>
                </div>

               
                <div class="input-field">
                <select id="combobox" class="browser-default" name="idmedidor">
        <option value="" disabled>Selecione</option>
        <?php
        $result_medidor = mysqli_query($mysqli, "SELECT m.id AS medidor_id, u.nome AS usuario_nome FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario");
        if ($result_medidor->num_rows > 0) {
            while ($dados_medidor = $result_medidor->fetch_assoc()) {
                $medidor_id = $dados_medidor['medidor_id'];
                $usuario_nome = $dados_medidor['usuario_nome'];
                $selected = ($medidor_id == $dados_leitura['idmedidor']) ? 'selected' : '';
                echo '<option value="' . $medidor_id . '" ' . $selected . '>' . $medidor_id . ' - ' . $usuario_nome . '</option>';
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
                <a href="../View/listarleitura.php" class="btn-flat waves-effect">Voltar</a>
            </fieldset>
    </form>
</div>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
<script src="../js/cadastro.js"></script>
</body>
</html>
