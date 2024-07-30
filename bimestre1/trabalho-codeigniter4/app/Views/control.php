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
        <title>controle de usuários | babriogeca</title>
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
                <h1>Controle de usuários</h1>
                <br>
                <img src="/img/compman.gif" id="control" />
                <hr>
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nome de usuário</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Administrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($nerdsArray as $row){
                            echo "<tr>";
                            foreach($row as $key => $value){
                                if ($key != 'password' && $key != 'available') echo '<td>'.$value.'</td>';
                            }
                            echo "<td>
                                    <form action='delete_user' method='post'>
                                        <input type='hidden' value=".$row['id']." name='id'>
                                        <button type='submit'><i class='bi bi-trash3-fill'></i></i></button>
                                    </form>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </main>
    </body>
</html>