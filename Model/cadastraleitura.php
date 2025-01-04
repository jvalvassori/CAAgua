<?php
include_once("../Controller/config.php");
$result = mysqli_query($mysqli, "SELECT m.id, u.nome FROM usuario u INNER JOIN medidor m ON u.id = m.idusuario ");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de leitura</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
    <script src="../js/cadastro.js"></script>
    <script src="../js/leitura.js"></script>
</head>
<body>
    <div class="box">
        <form action="cadastraleitura.php" method="post">
        <fieldset>
                <legend>Cadastro de leitura</legend>
                
                <div class="input-field">
                <select id="combobox" class="browser-default" name="medidor_id" onchange="preencherLeituraAnterior()">
                <option value="" disabled selected>Selecione</option>
                <?php
                
                // Gera as opções do select com base nos dados do banco de dados
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $medidor_id = $row['id'];
                        $nome = $row['nome'];
                        echo '<option value="' . $medidor_id . '">' . $medidor_id . ' - ' . $nome . '</option>';
                    }
                }
                          
                ?>
                </select>
                </div>
                <div class="input-field">
                <input type="date" name="dataleitura" id="dataleitura" required>
                <label for="dataleitura">Data da leitura</label>
                </div>
                
               <div class="input-field">
                    <input type="text" name="leituraanterior" id="leituraanterior" maxlength="4" required readonly>
                    <label for="leituraanterior" id="leituraan" class="active">Leitura Anterior</label>
               </div>


                
                <div class="input-field">
                    <input type="number" name="leituraatual" id="leituraatual" maxlength="4" required>
                    <label for="leituraatual">Leitura Atual</label>
                </div>

                
                
               


                <!-- Botão de Cadastro -->
                <button class="btn waves-effect waves-light" type="submit" name="Cadastrar">Cadastrar
                    <i class="material-icons right">send</i>
                </button>

                <!-- Link para voltar para a página inicial -->
                <a href="../View/admin.php" class="btn-flat waves-effect">Voltar</a>
                </fieldset>
        </form>
    </div>

        <?php
        include_once("../Controller/config.php");

        

        if (isset($_POST["Cadastrar"])) {
            $dataleitura = $_POST["dataleitura"];
            $leituraanterior = round($_POST["leituraanterior"]);
            $leituraatual = round($_POST["leituraatual"]);
            $medidor_id = $_POST["medidor_id"];
            
        try {
            $result = mysqli_query($mysqli, "INSERT INTO leitura(dataleitura,leituraanterior,leituraatual,idmedidor) 
            VALUES('$dataleitura','$leituraanterior','$leituraatual','$medidor_id')");
             echo "<script> alert('Cadastrado com sucesso.'); </script>";
             echo '<script>window.location.href = "cadastraleitura.php";</script>';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
        
        ?>
    </div>

    <!-- Materialize JS -->
    <script src="../js/materialize.js"></script>
</body>
</html>
