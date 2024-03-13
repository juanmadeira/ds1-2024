<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>First.am</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style/style.css" type="text/css" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
        <h2>First.am</h2>
        <form action="music" method='post'>
            <div class="mb-3 mt-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="Insira o nome do artista/banda:" name="nome">
            </div>
            <div class="mb-3">
            <label for="bio">Biografia:</label>
            <input type="text" class="form-control" id="bio" placeholder="Insira mais detalhes sobre o artista/banda:" name="bio">
            </div>
            <div class="mb-3">
            <label for="gen">Gênero:</label>
            <input type="text" class="form-control" id="gen" placeholder="Insira o gênero do artista/banda:" name="gen">
            </div>
            <div class="mb-3">
            <label for="pais">País:</label>
            <input type="text" class="form-control" id="pais" placeholder="Insira o país de fundação do artista/banda:" name="pais">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
    </body>
</html>
