<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/cd.ico">
        <link rel="stylesheet" type="text/css" media="all" href="css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>CDRealm</title>
    </head>
    <body>
        <header>
            <h1><a href="/">CDRealm</a></h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="insert">Insert</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1>Cadastro de CDs</h1>
            <form method="post" action="{{ url('insert')}}" id="insert">
                @csrf
                <div class="form-group">
                <label for="name">Nome do CD:</label>
                <input type="text" id="name" name="name">
                </div>
                <div class="form-group">
                <label for="desc">Descrição:</label>
                <textarea rows="5" id="desc" name="desc"></textarea>
                </div>
                <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" step="0.01" id="price" name="price">
                </div>
                <button type="submit" id="submitinsert">Enviar</button>
            </form>
        </main>
    </body>
</html>
