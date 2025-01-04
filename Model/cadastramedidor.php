<?php
include_once("../Controller/config.php");
$result = mysqli_query($mysqli, "SELECT u.id, u.nome FROM usuario u 
                                  LEFT JOIN medidor m ON u.id = m.idusuario 
                                  WHERE m.idusuario IS NULL");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de medidor</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
    <script src="../js/cadastro.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
    
</head>
<body>
    <div class="box">
        <form action="cadastramedidor.php" method="post">
        <fieldset>
                <legend>Cadastro de medidor</legend>

                
                <div class="input-field">
                    <input type="text" name="numserie" id="numserie" maxlength="6" required>
                    <label for="numserie">Numero série</label>
                </div>

                
                <div class="input-field">
                    <input type="text" name="marca" id="marca" required>
                    <label for="marca">Marca</label>
                </div>

                
                <div class="input-field">
                <input type="date" name="datainicio" id="datainicio" required>
                <label for="datainicio">Data do início do medidor</label>
                </div>

                <div class="input-field">
                    <input type="date" name="datatroca" id="datatroca" required>
                    <label for="datatroca">Troca do medidor</label>
                </div>

                <div class="input-field">
                <select id="combobox" class="browser-default" name="usuario_id">
                <option value="" disabled selected>Selecione</option>
                <?php
                
                // Gera as opções do select com base nos dados do banco de dados
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                }
                          
                ?>
                </select>
                </div>


                <!-- Botão de Cadastro -->
                <button class="btn waves-effect waves-light" type="submit" name="Cadastrar">Cadastrar
                    <i class="material-icons right">send</i>
                </button>

                <!-- Link para voltar para a página inicial -->
                <a href="../View/admin.php" class="btn-flat waves-effect">Voltar</a>
            </fieldset>
        </form>

        <?php
        include_once("../Controller/config.php");

        

        if (isset($_POST["Cadastrar"])) {
            $numserie = $_POST["numserie"];
            $marca = $_POST["marca"];
            $datainicio = date('Y-m-d', strtotime($_POST["datainicio"]));
            $datatroca = date('Y-m-d', strtotime($_POST["datatroca"]));
            $id_usuario = $_POST["usuario_id"];
            
            $existe = "SELECT idusuario FROM medidor WHERE idusuario = '$id_usuario'";
             $existeResult = mysqli_query($mysqli, $existe);

    if (mysqli_num_rows($existeResult) > 0) {
      echo "<script> alert('Esse usuário já possui um medidor cadastrado.'); </script>";
    } else {
        try {
            $result = mysqli_query($mysqli, "INSERT INTO medidor(numserie,marca,datainicio,dataprevistatroca,idusuario) 
            VALUES('$numserie','$marca','$datainicio','$datatroca','$id_usuario')");
            echo "<script> alert('Cadastrado com sucesso.');</script>";
            echo '<script>window.location.href = "cadastramedidor.php";</script>';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
        }
        ?>
    </div>

    <!-- Materialize JS -->
    <script src="../js/materialize.js"></script>
</body>
</html>
