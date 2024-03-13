<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/terraria.css">
    <title>Chaparral Genial</title>
</head>
<body>
    <header>
        <a href='terrariaindex'><h1>Terraria Bosses!</h1></a>
        <a href='terrariaindex' class='logoimg'><img width='250px' height='72.2px' src='Images/terrarialogo.png'></a>
        <nav>
            <a href='terrariaform'>Inserir</a>
        </nav>
    </header>
    <form id="insert" enctype="multipart/form-data" action="terrariaindex" method="post">
        <label for="txName">Nome do Chefão:</label>
        <input type="text" name="name" id="txName">
        <label for="nbHp">HP do Chefão:</label>
        <input type="number" name="hp" id="nbHp">
        <label for="txSpItem">Item de Spawn do Chefão:</label>
        <input type="text" name="spawn" id="txSpItem">
        <button type="submit"><img src="Images/enviar.png"></button>
    </form>
</body>
</html>