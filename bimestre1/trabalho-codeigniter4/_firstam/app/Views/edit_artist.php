<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/style/insert_artist.css">
        <script defer type="module" src="./src/script/script.js"></script>
        <title>Editar artista | First.am</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="./img/first-am-logo.png" width=150 /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Início</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="insert artist">Inserir artista</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            <h2 class="fire">Editar artista/banda</h2>
            <form action="/" method='post'>
                <input type='hidden' name='typeaction' value='update'>
                <input type='hidden' name='id' value='<?php echo $id ?>'>
                <div class="mb-3 mt-3">
                    <label for="nome" class="fs-6">Nome:</label>
                    <input type="text" name="nome" class="form-control form-control-sm" placeholder="Insira o nome do artista/banda:" value='<?php echo $nome ?>'>
                </div>
                <div class="mb-3">
                    <label for="bio" class="fs-6">Biografia:</label>
                    <input type="text" name="bio" class="form-control form-control-sm" placeholder="Insira mais detalhes sobre o artista/banda:" value='<?php echo $bio ?>'>
                </div>
                <div class="mb-3">
                    <label for="gen" class="fs-6">Gênero:</label>
                    <input type="text" name="gen" class="form-control form-control-sm" placeholder="Insira o gênero do artista/banda:" value='<?php echo $gen ?>'>
                </div>
                <div class="mb-3">
                    <label for="pais" class="fs-6">País:</label>
                    <input type="text" name="pais" class="form-control form-control-sm" placeholder="Insira o país de fundação do artista/banda:" value='<?php echo $pais ?>'>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>
