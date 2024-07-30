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
        <title>meus empréstimos | babriogeca</title>
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
                <h1>Meus empréstimos</h1>
                <br>
                <img src="/img/globe.gif" id="my-books" />
                <hr>
                <table>
                    <?php
                    if (count($_SESSION['emprestimos']) > 0) {
                        echo('<thead><tr>
                        <td class="text-center" style="font-weight: bold;">Autores</td>
                        <td class="text-center" style="font-weight: bold;">Título</td>
                        <td class="text-center" style="font-weight: bold;">Ano</td>
                        <td class="text-center" style="font-weight: bold;">Editora</td>
                        </tr></thead>');
                        foreach ($_SESSION['emprestimos'] as $key => $value) {
                        echo "<tr>";
                        foreach ($_SESSION['emprestimos'][$key] as $key => $value) {
                            if ($key != 'id' && $key != 'available') echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                        }
                    }else {
                        echo'<p style="text-align: center">Você ainda não pegou nenhum livro de <a href="/books">nossa biblioteca</a>, '.$_SESSION['username'].'</p>';
                    }
                    ?>
                </table>
                <hr>
            </div>
        </main>
    </body>
</html>