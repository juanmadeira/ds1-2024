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
        <h1>Site da calculadora bhaskaronica</h1>
    </header>
    <div class="container">
        <div class="head">
            <h1>calculadora bhaskaronica</h1>
            <h1><a href="calcprag">calculadora afuzel!</a></h1>
        </div>
        <form action="" method="post">
            <div class="inputAB">
                <div class="show2">
                <label for="inputA">Variável A</label>
                </div>
                <div class="show">
                <input type="text" name="a" id="inputA">
                </div>
                <label for="inputB">Variável B</label>
                <input type="text" name="b" id="inputB">
                <label for="inputC">Variável C</label>
                <input type="text" name="c" id="inputC">
                <script>
                    equation = document.createElement('div');
                    equation.setAttribute('class','equation');
                    equation.setAttribute('id','equation');
                    eqlabel = document.createElement('label');
                    eqlabel.setAttribute('for','equation');
                    eqlabel.innerHTML = "Equação";
                    show = document.querySelector('.show');
                    show2 = document.querySelector('.show2');
                    show.appendChild(equation);
                    show2.appendChild(eqlabel);
                    aElement = document.createElement('span');
                    bElement = document.createElement('span');
                    cElement = document.createElement('span');
                    equation.appendChild(aElement);
                    equation.appendChild(bElement);
                    equation.appendChild(cElement);
                    a = document.getElementById('inputA');
                    b = document.getElementById('inputB');
                    c = document.getElementById('inputC');
                    a.addEventListener('change', (event) =>{
                        aElement.innerHTML = (!isNaN(Number(a.value)))?(Number(a.value)+'x²'):"";
                    })
                    b.addEventListener('change', (event) =>{
                        bElement.innerHTML = ((Number(b.value) > 0)?' + ':' ')+Number(b.value)+'x';
                    })
                    c.addEventListener('change', (event) =>{
                        cElement.innerHTML = ((Number(c.value) > 0)?' + ':' ')+Number(c.value);
                    })
                </script>
            <!-- <label for="operatorSelect">Operação</label>
            <select name="operator" id="operatorSelect">
                <option value="add">Adição</option>
                <option value="sub">Subtração</option>
                <option value="mult">Multiplicação</option>
                <option value="divide">Divisão</option>
                <option value="potencia">Potenciação</option>
            </select> -->
            <button type="submit" name="envio">Enviar</button>
            </div>
        </form>
        <?php
            if(isset($_POST['envio']) && isset($_POST['a'])){
                $a = $_POST['a'];
                $b = $_POST['b'];
                $c = $_POST['c'];
                if($b == ''){
                    $b = 0;
                }
                if($c == ''){
                    $c = 0;
                }
                
                $delta = $b**2 - (4*$a*$c);
                if($delta >= 0){
                echo "Equação<br>".$a."x² ".$b."x ".$c."<br>";
                echo "<br>Delta: ".$delta."<br><br>";
                $x1 = ((-$b) + sqrt($delta))/(2*$a);
                $x2 = ((-$b) - sqrt($delta))/(2*$a);
                echo "
                <div class='resultado'>
                    <h1>x' = ".$x1."</h1>
                    <br>
                    <h1>x'' = ".$x2."</h1>
                </div>
                ";
                }
                else{
                    echo "Delta é menor que zero.";
                }
            }
        ?>
    </div>
</body>
</html>