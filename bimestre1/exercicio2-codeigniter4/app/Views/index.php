<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css" type="text/css" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Artistas</title>
    </head>
    <body>
        <table class="table d-flex align-items-center justify-content-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">nome</th>
                    <th scope="col" class="text-center">biografia</th>
                    <th scope="col" class="text-center">gênero</th>
                    <th scope="col" class="text-center">país</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $row){
                        echo "<tr>";
                        foreach($row as $value){
                            echo '<td class="text-center">'.$value.'</td>';
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <p>oi</p>
    </body>
</html>