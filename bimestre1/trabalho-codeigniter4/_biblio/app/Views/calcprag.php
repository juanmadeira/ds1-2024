<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/calcprag.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Site da calculadora afuzel</h1>
    </header>
    <div class="container">
        <div class="head">
            <h1>calculadora afuzel!</h1>
            <h1><a href="calcbhask">calculadora bhaskaronica</a></h1>
        </div>
        <form action="" method="post">
            <div class="inputAB">
                <label for="inputA">Número A</label>
                <input type="text" name="a" id="inputA">
                <label for="inputB">Número B</label>
                <input type="text" name="b" id="inputB">
            <label for="operatorSelect">Operação</label>
            <select name="operator" id="operatorSelect">
                <option value="add">Adição</option>
                <option value="sub">Subtração</option>
                <option value="mult">Multiplicação</option>
                <option value="divide">Divisão</option>
                <option value="potencia">Potenciação</option>
            </select>
            <button type="submit" name="envio">Enviar</button>
            </div>
        </form>
        <?php
            if(isset($_POST['envio'])){
                function dataValidationInput($data){
                    if(!isset($data) && $data == null){
                        return false;
                    }
                    if(!is_numeric($data)){
                        return false;
                    }
                    return true;
                }
                if(dataValidationInput($_POST['a']) && dataValidationInput($_POST['b'])){
                $operator = $_POST['operator'];
                $a = $_POST['a'];
                $b = $_POST['b'];
                switch($operator){
                    case "add":
                        $op = "+";
                        $result = $a + $b;
                        break;
                    case "sub":
                        $op = "-";
                        $result = $a - $b;
                        break;
                    case "mult":
                        $op = "x";
                        $result = $a * $b;
                        break;
                    case "divide":
                        $op = "/";
                        $result = $a / $b;
                        break;
                    case "potencia":
                        $op = "^";
                        $result = $a ** $b;
                        break;
                }
                echo "
                
                <div class='resultado'>
                    <h1>O resultado de ".$a." ".$op." ".$b." é ".$result."</h1>
                </div>
                ";
            }
        }
        ?>
    </div>
</body>
</html>