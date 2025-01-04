<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <!-- Materialize -->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="container">
    <table class="responsive-table striped" id="tabela">
      <tbody>
        <tr>
          <th>Usuário</th>
          <th>Medidor</th>
          <th>Leitura</th>
          <th>Pagamento</th>
        </tr>
        <tr>
          <td class="s3">
            <div><a href="../Model/cadastrausuario.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">person</i>Cadastro</a></div>
          </td>
          <td class="s3">
            <div><a href="../Model/cadastramedidor.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">speed</i>Cadastro</a></div>
          </td>
          <td class="s3">
            <div><a href="../Model/cadastraleitura.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">bookmark</i>Registrar</a></div>
          </td>
          <td class="s3">
            <div><a href="../Model/cadastrapagamento.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">payments</i>Registrar</a></div>
          </td>
        </tr>
        <tr>
          <td class="s3"><a href="listarusuario.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">person</i>Listar</a></td>
          <td class="s3"><a href="listarmedidor.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">speed</i>Listar</a></td>
          <td class="s3"><a href="listarleitura.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">bookmark</i>Listar</a></td>
          <td class="s3"><a href="listarpagamento.php" id="tradu" class="waves-effect waves-light btn"><i class="material-icons right">payments</i>Listar</a></td>
        </tr>
      </tbody>
    </table>
</div>
<div class="container"><a id="botsair" href="index.php" class="waves-effect waves-light btn">Sair</a></div>

<!-- Materialize JS -->
<script src="../js/materialize.js"></script>
</body>
</html>
