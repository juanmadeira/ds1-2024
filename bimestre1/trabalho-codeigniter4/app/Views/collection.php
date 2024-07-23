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
        <title>gerenciamento de livros | babriogeca</title>
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
                <h1>Gerenciamento de livros</h1>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autores</th>
                        <th>Ano</th>
                        <th>Editora</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($booksArray as $row) {
                                var_dump($row);
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>