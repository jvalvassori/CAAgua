<?php
session_start();
include("../Controller/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $numserie = $_POST['numserie'];
    $marca = $_POST['marca'];
    $datainicio = $_POST['datainicio'];
    $dataprevistatroca = $_POST['dataprevistatroca'];
    $idusuario = $_POST['idusuario'];

    
 
        $update_query = "UPDATE medidor SET numserie='$numserie', marca='$marca', datainicio='$datainicio', dataprevistatroca='$dataprevistatroca', idusuario='$idusuario' WHERE id=$id";

        if (mysqli_query($mysqli, $update_query)) {
            echo "<script> alert('Editado com sucesso.'); </script>";
            echo '<script>window.location.href = "../View/listarmedidor.php";</script>';
            exit;
        } else {
            echo "Erro na atualização: " . mysqli_error($mysqli);
        }
    }


$id_to_edit = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM medidor WHERE id=$id_to_edit");
$dados_medidor = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medidor</title>

     <!--Materialize-->
     <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<div class="box">

    <form action="editarmedidor.php" method="post">
    <fieldset>
                <legend>Editar medidor</legend>
                <input type="hidden" name="id" value="<?php echo $dados_medidor['id']; ?>">
            
                <div class="input-field">
                    <input type="text" name="numserie" id="numserie" value="<?php echo $dados_medidor['numserie']; ?>" required>
                    <label for="numserie">Numero serie</label>
                </div>

             
                <div class="input-field">
                <input type="text" name="marca" id="marca" value="<?php echo $dados_medidor['marca']; ?>" required>
                    <label for="marca">Marca</label>
                </div>

               
                <div class="input-field">
                <input type="date" name="datainicio" id="datainicio" value="<?php echo $dados_medidor['datainicio']; ?>" required>
                    <label for="datainicio">Data de inicio</label>
                </div>

                
                <div class="input-field">
                    <input type="date" name="dataprevistatroca" id="dataprevistatroca" value="<?php echo $dados_medidor['dataprevistatroca']; ?>" required>
                    <label for="dataprevistatroca">Data da troca medidor</label>
                </div>

               
                <div class="input-field">
                 <select id="combobox" class="browser-default" name="idusuario">
        <option value="" disabled>Selecione</option>
        <?php
        $result = mysqli_query($mysqli, "SELECT id, nome FROM usuario");

        if ($result->num_rows > 0) {
            while ($dados_usuario = $result->fetch_assoc()) {
                $selected = ($dados_usuario['id'] == $dados_medidor['idusuario']) ? 'selected' : '';
                echo '<option value="' . $dados_usuario['id'] . '" ' . $selected . '>' . $dados_usuario['nome'] . '</option>';
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
                <a href="../View/listarmedidor.php" class="btn-flat waves-effect">Voltar</a>
            </fieldset>
    </form>
</div>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
<script src="../js/cadastro.js"></script>
</body>
</html>
