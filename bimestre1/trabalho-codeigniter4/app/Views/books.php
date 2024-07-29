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
                <br>
                <img src="/img/book-1.gif" id="books" />
                <form action="search" method="post">
                    <div>
                        <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar livros">
                        <button type="submit" id="pesquisabtn"><i class="bi bi-search"></i></button>
                    </div> 
                </form>
                <hr>
                <table>
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
                                // if ($key == 'available' && $value != 42 ) {}
                            }
                            echo "<td>
                                    <form action='/borrow' method='post'>
                                        <input type='hidden' value=".$row['id']." name='id'>
                                        <button type='submit'><i class='bi bi-bookmark-plus'></i></button>
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