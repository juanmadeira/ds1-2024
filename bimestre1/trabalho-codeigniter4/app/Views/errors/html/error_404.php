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
        <style>
            .box {
                display: flex;
                flex-flow: column wrap;
                text-align: center;
            }

            h1 {
                text-align: center;
                font-weight: bold;
            }

            p {
                text-align: center;
            }

            img {
                width: 35vw;
                box-shadow: ;
                display: block;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="/" ><img src="/img/logo.png" /></a>
            <a href="/" ><p>babriogeca.</p></a>
        </header>
        <main>
            <div class="box">
                <h1>ERRO 404 !!!</h1>
                <p>
                    <?php if (ENVIRONMENT !== 'production') : ?>
                        <?= nl2br(esc($message)) ?>
                    <?php else : ?>
                        <?= lang('Errors.sorryCannotFind') ?>
                    <?php endif; ?>
                </p>
                <img src="/img/gandalf-reading-2.webp" alt="erro" />
            </div>
        </main>
    </body>
</html>