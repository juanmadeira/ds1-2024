<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/exerc1.css">
    <title>VALOR DE RESSARCIMENTO</title>
</head>
<body>
    <header>
        <a href="exerc1"><img src="Images/caixa.png"></a>
        <h1>RESSARCIMENTO DE VALORES</h1>
    </header>
    <main>
        <div class="form">
        <h1>Formulário de dados</h1>
        <form action="update" method="post">
            <label for="txName">Nome:</label>
            <input type="text" name="name" id="txName">
            <label for="dtDate">Data de nascimento:</label>
            <input type="date" name="dateofbirth" id="dtDate">
            <label for="nbSalario">Salário:</label>
            <input type="number" name="salario" id="nbSalario">
            <button type="submit" name="submit">Enviar</button>
        </form>
        </div>
    <main>
</body>
</html>