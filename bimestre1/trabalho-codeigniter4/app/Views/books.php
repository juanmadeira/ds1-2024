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
        <title>livros | babriogeca</title>
    </head>
    <body>
        <header>
            <a href="/user"><img src="/img/logo.png" /></a>
            <a href="/user"><p>babriogeca.</p></a>
        </header>
        <nav>
            <a href="/books">livros</a>
            <a href="/my_books">meus empréstimos</a>.
            <a href="/user"><img src="/img/user-icon.png" /> <span><?php echo $_SESSION['username'] ?></span></a>
            <a href="/">sair</a>
        </nav>
        <main>
            <div class="box">
                <h1>Livros</h1>
                <p></p>
            </div>
        </main>
    </body>
</html>