<?php
include_once("../Controller/config.php");
$result = mysqli_query($mysqli, 'SELECT l.id, u.nome 
FROM usuario u 
INNER JOIN medidor m ON u.id = m.idusuario 
INNER JOIN leitura l ON m.id = l.idmedidor 
LEFT JOIN fatura f ON l.id = f.idleitura 
WHERE f.idleitura IS NULL');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclua a biblioteca Inputmask -->
    <title>Cadastro de pagamento</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Materialize CSS -->
   
    <link rel="stylesheet" href="../css/materialize.css">
    
    
   
    
</head>
<body>
    <div class="box">
        <form action="cadastrapagamento.php" method="post">
        <fieldset>
                <legend>Cadastro de pagamento</legend>
                
                <div class="input-field">
                    <select id="combobox" class="browser-default" name="idleitura" onchange="preencherValor()">
                        <option value="" disabled selected>Selecione</option>
                        <?php
                        // Gera as opções do select com base nos dados do banco de dados
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $leitura_id = $row['id'];
                                $nome = $row['nome'];
                                echo '<option value="' . $leitura_id . '">' . $leitura_id .' - '.  $nome .'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                
                <!-- Campo de data -->
                <div class="input-field">
                    <input type="date" name="data" id="data" required>
                    <label for="data">Data do pagamento</label>
                </div>
                
                <!-- Campo de valor da fatura -->
                <div class="input-field">
                    <input type="text" name="valor" id="valorfat" class="validate money-mask" required>
                    <label for="valorfat">Valor da fatura</label>
                </div>

                <!-- Campo de status -->
                <div class="input-field">
                    <input type="text" name="status" id="status" required>
                    <label for="status">Status</label>
                </div>
                
                <!-- Campo de vencimento da fatura -->
                <div class="input-field">
                    <input type="date" name="vencimento" id="vencimento" required>
                    <label for="vencimento">Vencimento da fatura</label>
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
            $data = $_POST["data"];
             // Remove caracteres não numéricos, exceto ponto decimal
            $valor = preg_replace("/[^0-9,.]/", "", $_POST["valor"]);
    
            // Substitui a vírgula decimal por ponto para garantir que o formato seja aceito no MySQL
            $valor = str_replace(",", ".", $valor);
    
            // Formata o valor como uma string com duas casas decimais
            $valor = number_format((float)$valor, 2, '.', ',');
            $status = $_POST["status"];
            $vencimento = $_POST["vencimento"];
            $idleitura = $_POST["idleitura"];
            
        try {
            $result = mysqli_query($mysqli, "INSERT INTO fatura(data,valor,status,vencimento,idleitura) 
            VALUES('$data','$valor','$status','$vencimento','$idleitura')");
            echo "<script> alert('Cadastrado com sucesso.'); </script>";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        try {
            // Se o cadastro for bem-sucedido, redirecione a página para si mesma (recarregue a página)
            echo '<script>window.location.href = "cadastrapagamento.php";</script>';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
   

        ?>
    </div>

    <!-- Materialize JS -->
    <script src="../js/materialize.js"></script>
    <script src="../js/pagamento.js"></script>

</body>
</html>
