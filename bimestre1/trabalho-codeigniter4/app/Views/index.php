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
        <title>início | babriogeca</title>
    </head>
    <body>
        <header>
            <a href="/"><img src="/img/logo.png" /></a>
            <a href="/"><p>babriogeca.</p></a>
        </header>
        <nav>
            <a href="/">início</a>
            <a href="/signin">entrar</a>
            <a href="/signup">registrar-se</a>
        </nav>
        <main>
            <div class="box">
                <?php
                    if(session()->getFlashdata('sucess')){
                        echo "<div class='sucess'>".session()->getFlashdata('sucess')."</div>";
                    }
                ?>
                <h1>Início</h1>
                <p>Seja muito bem-vindo(a) à <b>babriogeca</b>!</p>
                <p>Entre na sua conta clicando <a href="/signin">aqui</a>, ou, caso ainda não possua uma, registre-se <a href="signup">aqui</a>!</p>
                <img id="index-img" src="/img/gandalf-reading-1.webp" alt="gandalf" />
            </div>
        </main>
    </body>
</html>