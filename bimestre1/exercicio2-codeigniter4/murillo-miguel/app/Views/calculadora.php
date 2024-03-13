<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/calculadora.css">
    <title>Document</title>
</head>
<body>
    <header></header>
    <div class="calculadora">
        <div class="visor">
            <?php
            function writeForm(){
                return '<form id="formcalc" action="" method="post" class="prompt">
                <input style="margin-left: 20px;" type="text" name="a" minlength=1 maxlength=10>
                <input type="text" name="operator">
                <input type="text" name="b" minlength=1 maxlength=10>
                </form>
            </div>';
            }
            if(!isset($_POST['b'])){
                echo writeForm();
            }
            else if(isset($_POST['b']) && $_POST['b'] == ""){
                echo '<form id="formcalc" action="" method="post" class="prompt">
                <input style="margin-left: 20px;" type="text" name="a" '.((isset($_POST['a']) && $_POST['a'] != "")?'value="'.$_POST['a'].'"':"").' minlength=1 maxlength=10>
                <input type="text" name="operator">
                <input type="text" name="b" minlength=1 maxlength=10>
                </form>';
                echo "<div><p class='error'>tá mal hein</p></div></div>";
            }
            else
            {
                $a = floatval($_POST['a']);
                $b = floatval($_POST['b']);
                $op = $_POST['operator'];
                echo $a;
                echo "  ".$op;
                echo "  ".$b;
                switch($op){
                    case "+":
                        $result = $a + $b;
                        break;
                    case "-":
                        $result = $a - $b;
                        break;
                    case "x":
                        $result = $a * $b;
                        break;
                    case "÷":
                        $result = $a / $b;
                        break;
                    case "default":
                        null;
                        break;
                }
                if(isset($result)){
                echo " = ".$result."</div>";
                }
            }
            ?>
        <div class="control">
            <button class="one">1</button>
            <button class="two">2</button>
            <button class="three">3</button>
            <button class="four">4</button>
            <button class="five">5</button>
            <button class="six">6</button>
            <button class="seven">7</button>
            <button class="eight">8</button>
            <button class="nine">9</button>
            <button class="zero">0</button>
            <button class="add op">+</button>
            <button class="sub op">-</button>
            <button class="mult op">x</button>
            <button class="divide op">÷</button>
            <button form="formcalc" type="submit" class="equal result">=</button>
            <button class="remove">Clear</button>
            <?php 
                if(isset($result)){
                    echo "<script>
                    let control = document.querySelector('.control');
                    let btn = document.querySelector('button');
                    console.log(control);
                    let clear = document.querySelector('.remove');
                    control.removeChild(clear);
                    newClear = document.createElement('a');
                    newClear.setAttribute('href','calculadora');
                    newClear.setAttribute('class','remove');
                    newClear.style.fontSize = btn.style.fontSize;
                    newClear.innerHTML = 'Clear';
                    control.appendChild(newClear);
                </script>";
                }
            ?>
        </div>
    </div>
    <script>
        let inputa = document.querySelector("input[name='a']");
        let inputop = document.querySelector("input[name='operator']");
        let inputb = document.querySelector("input[name='b']");
        let buttons = document.querySelectorAll(".control button");
        console.log(buttons);
        buttons.forEach(button => {
            console.log(button.innerHTML);
            button.addEventListener('click', (e) => changeInput());
        });
        function changeInputValue(input){
            console.log('aqui é o cara: '+  event);
            operations = document.querySelectorAll('.op');
            if(event.target.innerHTML == "Clear"){
                operations.forEach(op => {
                    op.removeAttribute("disabled", "");
                })
                inputa.value = "";
                inputop.value = "";
                inputb.value = "";
                return false;
            }
            if(event.target.innerHTML == "="){
                return false;
            }
            if(event.target.innerHTML != '0' && event.target.innerHTML != '1' && event.target.innerHTML != '2' &&  event.target.innerHTML != '3' && event.target.innerHTML != '4' && event.target.innerHTML != '5' && event.target.innerHTML != '6' && event.target.innerHTML != '7' && event.target.innerHTML != '8' && event.target.innerHTML != '9' && input.value != ""){
                console.log('ja era, esse é o culpado:'+event.target.innerHTML);
                input.value = input.value.slice(0,input.value.length);
                inputop.value = event.target.innerHTML;
                console.log(input.value);
                return false;
            }
            else{
                input.value += event.target.innerHTML;
                input.style.width = ((input.value.length + 1) * 12) + 'px';
            }
                return true;
        };
        function changeInput(){
            if(inputop.value != null && inputop.value != ""){
                operations = document.querySelectorAll('.op');
                operations.forEach(op => {
                    op.setAttribute("disabled", "");
                })
                changeInputValue(inputb);
                console.log('cheguei no input b'+inputb.value);
                return true;
            }
            changeInputValue(inputa);
        }
        console.log(inputa);
    </script>
</body>
</html>