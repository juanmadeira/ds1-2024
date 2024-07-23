<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="/img/logo.png">
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/style/style.css">
        <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <title>página do administrador | babriogeca</title>
    </head>
    <body>
        <header>
            <a href="/admin"><img src="/img/logo.png" /></a>
            <a href="/admin"><p>babriogeca.</p></a>
        </header>
        <nav>
            <a href="/collection">gerenciamento de livros</a>
            <a href="/control">controle de empréstimos</a>.
            <a href="/admin"><img src="/img/user-icon.png" /> <span><?php echo $_SESSION['username'] ?></span></a>
            <a href="/">sair</a>
        </nav>
        <main>
            <div class="box">
                <h1>Bem vindo (a), <?php echo $_SESSION['username'] ?>!</h1>
                <div class="user">
                    <div class="user-picture">
                        <img src="/img/user-icon.png" />
                    </div>
                    <div class="user-info">
                        <p><span>Nome de usuário</span>: <?php echo $_SESSION['username'] ?></p>
                        <p><span>E-mail</span>: <?php echo $_SESSION['email'] ?></p>
                    </div>
                </div>
                <br>
                <div class="button">
                    <a href="/collection">Gerenciar livros</a>
                </div>
                <br>
                <div class="button">
                    <a href="/control">Gerenciar empréstimos</a>
                </div>
            </div>
        </main>
    </body>
</html>