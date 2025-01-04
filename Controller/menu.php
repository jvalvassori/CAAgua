<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <nav class="cyan">

        <!-- Menu Hamburguer -->
        <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>

        <div class="nav-wrapper container">
            <!-- Alterar nome do site -->
            
           
            <img id="logo" src="../img/Logo_TCC.png" alt="Logo">
          
            <!-- Menu Desktop -->
            <ul class="right hide-on-med-and-down">
                <!-- Colocar no href a referencia para a pagina que vai ir quando clicar -->
                <li><a href="leitura.php">Leitura</a></li>
                <li><a href="pagamento.php">Pagamento</a></li>
                <li><a href="listarmeusdados.php">Meus dados</a></li>
                <li><a href="index.php">Sair</a></li>
            </ul>
           
            <!-- Menu Mobile -->
            <ul id="slide-out" class="sidenav">
                <!-- Colocar no href a referencia para a pagina que vai ir quando clicar -->
                <li><a href="leitura.php"><i class="material-icons left grey-text">bookmarks</i>Leitura</a></li>
                <li><a href="pagamento.php"><i class="material-icons left grey-text">credit_card</i>Pagamento</a></li>
                <li><a href="listarmeusdados.php"><i class="material-icons left grey-text">description</i>Meus dados</a></li>
                <li><a href="index.php"><i class="material-icons left grey-text">keyboard_backspace</i>Sair</a></li>
            </ul>
        </div>
    </nav>

    <!-- JQuery para o menu hamburguer funcionar -->
    <script src="../jquery/jq.js"></script>
    <script src="../js/menu.js"></script>

    <!-- Materialize JS -->
    <script src="../js/materialize.js"></script>

</body>

</html>