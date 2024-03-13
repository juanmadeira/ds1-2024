<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= 'stylesheet' type='text/css' href="styles/terraria.css">
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
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>HP</th>
                <th>Spawner</th>
                <th class='deleteColumn'></th>
            </tr>
        </thead>
        <tbody>

            <?php
                if(isset($result)){
                    foreach($result as $row){
                        echo "<tr>";
                        foreach($row as $value){
                            echo '<td>'.$value.'</td>';
                        }                   
                        echo "<td>
                        <form action='delete' method='post'>
                        <input type='hidden' value=".$row['id']." name='id'>
                        <button type='submit'><img width='20px' height='20px' src='Images/x.svg'></button>
                        </form>
                        </td>
                        </tr>
                        ";
                    }
                }
            ?>
            
        </tbody>
        
    </table>

</body>
</html>