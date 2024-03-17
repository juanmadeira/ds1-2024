<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/insert_artist.css" type="text/css" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Inserir Artista | First.am</title>
    </head>
    <body>
        <div class="container mt-3">
            <h2 class="fire">Inserir artista/banda</h2>
            <form action="/" method='post'>
                <div class="mb-3 mt-3">
                    <label for="nome" class="fs-6">Nome:</label>
                    <input type="text" name="nome" class="form-control form-control-sm" placeholder="Insira o nome do artista/banda:">
                </div>
                <div class="mb-3">
                    <label for="bio" class="fs-6">Biografia:</label>
                    <input type="text" name="bio" class="form-control form-control-sm" placeholder="Insira mais detalhes sobre o artista/banda:">
                </div>
                <div class="mb-3">
                    <label for="gen" class="fs-6">Gênero:</label>
                    <input type="text" name="gen" class="form-control form-control-sm" placeholder="Insira o gênero do artista/banda:">
                </div>
                <div class="mb-3">
                    <label for="pais" class="fs-6">País:</label>
                    <input type="text" name="pais" class="form-control form-control-sm" placeholder="Insira o país de fundação do artista/banda:">
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>
