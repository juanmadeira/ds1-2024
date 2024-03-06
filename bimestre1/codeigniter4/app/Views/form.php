<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Formulário</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container mt-3">
        <h2>Formulariozinho</h2>
        <form action="form_data" method='post'>
            <div class="mb-3 mt-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="Insira o nome" name="nome">
            </div>
            <div class="mb-3">
            <label for="date">Data de nascimento:</label>
            <input type="date" class="form-control" id="date" placeholder="Insira sua data de nascimento" name="date">
            </div>
            <div class="mb-3">
            <label for="sal">Salário:</label>
            <input type="money" class="form-control" id="sal" placeholder="Insira o seu salário" name="sal">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
    </body>
</html>
