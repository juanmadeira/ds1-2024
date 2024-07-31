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
            <a href="/control">controle de usuários</a>.
            <a href="/admin"><img src="/img/user-icon.png" /> <span><?php echo $_SESSION['username'] ?></span></a>
            <a href="/">sair</a>
        </nav>
        <main>
            <div class="box">
                <h1>Gerenciamento de livros</h1>
                <br>
                <div class="button" id="add-book">
                    <a href="/add_book">Adicionar livro</a>
                </div>
                <br>
                <img src="/img/book-3.gif" id="collection-book" />
                <div class="search">
                    <input type="text" name="search" id="searchInput" placeholder="Pesquisar livros">
                    <button type="submit" id="searchButton" onclick="search()"><i class="bi bi-search"></i></button>
                    <script>
                        let input = document.querySelector("#searchInput");
                        let button = document.querySelector("searchButton");
                        function search() {
                            window.location = "collection?search=" + input.value + "#booksTable";
                        }
                        input.addEventListener('keypress', function(e) {if(e.key === 'Enter') search()}) 
                    </script>
                </div>
                <hr>
                <table id="booksTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Autores</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Ano</th>
                            <th class="text-center">Editora</th>
                            <th class="text-center">Qtd.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($booksArray as $row){
                            echo "<tr>";
                            foreach($row as $key => $value){
                                echo '<td>'.$value.'</td>';
                            }
                            echo "<td>
                                    <form action='/edit_book' method='post'>
                                        <input type='hidden' value=".$row['id']." name='id'>
                                        <button type='submit'><i class='bi bi-pencil-fill'></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action='delete_book' method='post'>
                                        <input type='hidden' value=".$row['id']." name='id'>
                                        <button type='submit'><i class='bi bi-trash3-fill'></i></i></button>
                                    </form>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </main>
    </body>
</html>