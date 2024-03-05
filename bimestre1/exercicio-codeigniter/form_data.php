<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Resultados</title>
</head>
<body>
    <?php
        $date = new DateTime($date);
        $today = new DateTime(date('Y-m-d'));

        $idade = $date->diff($today)->y;

        switch ($idade) {
            case $idade < 19:
                $faixa = 1;
                break;
            case $idade > 18 && $idade < 24:
                $faixa = 2;
                break;
            case $idade > 23 && $idade < 29:
                $faixa = 3;
                break;
            case $idade > 29 && $idade < 34:
                $faixa = 4;
                break;
            case $idade > 34 && $idade < 39:
                $faixa = 5;
                break;
            case $idade > 39 && $idade < 44:
                $faixa = 6;
                break;
            case $idade > 44 && $idade < 49:
                $faixa = 7;
                break;
            case $idade > 49 && $idade < 54:
                $faixa = 8;
                break;
            case $idade > 54 && $idade < 59:
                $faixa = 9;
                break;
            case $idade >= 59:
                $faixa = 10;
                break;
        }

        switch ($faixa) {
            case $faixa == 1:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 149.52;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 142.47;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 135.42;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 129.78;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 122.71;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 111.43;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 107.2;
                        break;
                    case $sal > 7500:
                        $ressarc = 101.56;
                        break;
                }
                break;
            case $faixa == 2:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 156.57;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 149.52;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 142.47;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 135.42;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 129.78;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 114.25;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 108.61;
                        break;
                    case $sal > 7500:
                        $ressarc = 102.97;
                        break;
                }
                break;
            case $faixa == 3:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 158.69;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 151.64;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 144.59;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 137.53;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 131.89;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 116.38;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 110.73;
                        break;
                    case $sal > 7500:
                        $ressarc = 105.08;
                        break;
                }
                break;
            case $faixa == 4:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 165.04;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 156.57;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 149.52;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 142.47;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 135.42;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 117.07;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 111.43;
                        break;
                    case $sal > 7500:
                        $ressarc = 105.79;
                        break;
                }
                break;
            case $faixa == 5:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 169.97;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 161.51;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 154.46;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 147.41;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 140.35;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 122.02;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 116.38;
                        break;
                    case $sal > 7500:
                        $ressarc = 110.73;
                        break;
                }
                break;
            case $faixa == 6:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 175.61;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 167.15;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 160.1;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 153.05;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 146;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 127.66;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 122.02;
                        break;
                    case $sal > 7500:
                        $ressarc = 116.38;
                        break;
                }
                break;
            case $faixa == 7:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 190.03;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 180.76;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 171.49;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 163.77;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 156.04;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 129.78;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 123.6;
                        break;
                    case $sal > 7500:
                        $ressarc = 117.42;
                        break;
                }
                break;
            case $faixa == 8:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 193.05;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 183.63;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 174.21;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 166.37;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 158.52;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 131.84;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 125.56;
                        break;
                    case $sal > 7500:
                        $ressarc = 119.28;
                        break;
                }
                break;
            case $faixa == 9:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 196.06;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 186.5;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 176.94;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 168.97;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 161;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 133.9;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 127.52;
                        break;
                    case $sal > 7500:
                        $ressarc = 121.14;
                        break;
                }
                break;
            case $faixa == 10:
                switch($sal){
                    case $sal <= 1499:
                        $ressarc = 205.63;
                        break;
                    case $sal > 1499 && $sal <= 1999:
                        $ressarc = 196.06;
                        break;
                    case $sal > 1999 && $sal <= 2499:
                        $ressarc = 186.5;
                        break;
                    case $sal > 2499 && $sal <= 2999:
                        $ressarc = 176.94;
                        break;
                    case $sal > 2999 && $sal <= 3999:
                        $ressarc = 168.97;
                        break;
                    case $sal > 3999 && $sal <= 5499:
                        $ressarc = 137.09;
                        break;
                    case $sal > 5499 && $sal <= 7499:
                        $ressarc = 130.71;
                        break;
                    case $sal > 7500:
                        $ressarc = 124.33;
                        break;
                }
                break;
        }
        echo "<div class='display-3'>
                O valor de ressarcimento é: R$".$ressarc.".
            </div>";
    ?>
</body>
</html>