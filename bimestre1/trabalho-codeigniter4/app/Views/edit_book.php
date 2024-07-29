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
        <title>registrar-se | babriogeca</title>
    </head>
    <body>
        <header>
            <a href="/admin"><img src="/img/logo.png" /></a>
            <a href="/admin"><p>babriogeca.</p></a>
        </header>
        <nav>
            <a href="/collection">gerenciamento de livros</a>
            <a href="/control">controle de usuários</a>.
            <a href="/admin"><img src="/img/user-icon.png" /> <span><?php echo $_SESSION['username'] ?></span></a>
            <a href="/">sair</a>
        </nav>
        <main>
            <div class="box">
                <h1>Adicionar livro</h1>
                <form method="POST" action="update_book">
                    <input type="hidden" name="id" value='<?php echo $id ?>'>
                    <label for="author">Autor:</label>
                    <input type="text" name="author" placeholder="autor" value='<?php echo $author ?>'>

                    <label for="title">Título do livro:</label>
                    <input type="text" name="title" placeholder="título" value='<?php echo $title ?>' required>

                    <label for="year">Ano de publicação:</label>
                    <input type="number" name="year" placeholder="ano" value='<?php echo $year ?>'>

                    <label for="publisher">Editora:</label>
                    <input type="text" name="publisher" placeholder="editora" value='<?php echo $publisher ?>'>
                    
                    <label for="available">Quantidade de unidades disponíveis:</label>
                    <input type="number" name="available" placeholder="qtd. em estoque" value='<?php echo $available ?>' required>

                    <input type="submit" value="Adicionar">
                </form> 
            </div>
        </main>
    </body>
</html>