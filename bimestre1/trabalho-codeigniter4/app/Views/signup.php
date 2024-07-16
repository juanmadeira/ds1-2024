<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <title>registrar-se | babriogeca</title>
    </head>
    <body>
        <header>
            <a href="/"><img src="img/logo.png" /></a>
            <a href="/"><p>babriogeca.</p></a>
        </header>
        <nav>
            <a href="/">início</a>
            <a href="login">entrar</a>
            <a href="signup">registrar-se</a>
        </nav>
        <main>
            <div class="box">
                <h1>Registrar-se</h1>
                <form method="POST">
                    <label for="username">Nome de usuário:</label>
                    <input type="text" name="username" placeholder="usuário">

                    <label for="email">Endereço de e-mail:</label>
                    <input type="text" name="email" placeholder="e-mail">

                    <label for="password">Senha:</label>
                    <input type="password" name="password" placeholder="senha">

                    <input type="submit" value="entrar">
                </form> 
            </div>
        </main>
    </body>
</html>