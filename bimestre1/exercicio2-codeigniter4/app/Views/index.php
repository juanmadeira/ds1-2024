<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/index.css" type="text/css" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Início | First.am</title>
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
                        <a class="nav-link active" aria-current="page" href="/">Início</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="insert artist">Inserir artista</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            <table class="table table-responsive w-75 m-auto mt-3 d-block d-md-table">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">nome</th>
                        <th class="text-center">biografia</th>
                        <th class="text-center">gênero</th>
                        <th class="text-center">país</th>
                        <th class="text-center">excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $row){
                            echo "<tr>";
                            foreach($row as $value){
                                echo '<td class="text-center">'.$value.'</td>';
                            }
                            echo "<td class='text-center'>
                                    <form action='delete' method='post'>
                                        <input type='hidden' value=".$row['id']." name='id'>
                                        <button type='submit'>❌</button>
                                    </form>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </main>
    </body>
</html>