<?php

namespace App\Controllers;

use App\Models\FormModel;

class Exerc1Controller extends BaseController
{
    public function index(): string
    {
        return view('indexexerc');
    }

    public function update()
    {   
        date_default_timezone_set('America/Fortaleza');

        $dateofbirth=$this->request->getVar('dateofbirth');

        $dateofbirth = date_create($dateofbirth);
        $datetoday = date_create('now');
        
        $idade = date_diff($datetoday,$dateofbirth);
        $idade = intval($idade->format('%Y'));

        $name = $this->request->getVar('name');
        $salario = $this->request->getVar('salario');
        $userfaixa = "";

        $faixa = array(
            array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18),
            array(19,20,21,22,23),
            array(24,25,26,27,28),
            array(29,30,31,32,33),
            array(34,35,36,37,38),
            array(39,40,41,42,43),
            array(44,45,46,47,48),
            array(49,50,51,52,53),
            array(54,55,56,57,58),
            array(59)
        );

        $renda = array(
            array(1499, array(149.52,156.57,158.69,169.97,175.61,190.03,193.05,196.06,205.63)),
            array(1500, 1999, array(142.47,149.52,151.64,156.57,161.51,167.15,180.76,183.63,186.5,196.06)),
            array(2000, 2499, array(135.42,142.47,144.59,149.52,154.46,160.1,171.49,174.21,176.94,186.5)),
            array(2500, 2999, array(129.78,135.42,137.53,142.47,147.41,153.05,163.77,166.37,168.97,176.94)),
            array(3000, 3999, array(122.71,129.78,131.89,135.42,140.35,146,156.04,158.52,161,168.97)),
            array(4000, 5499, array(111.43,114.25,116.38,117.07,122.02,127.66,129.78,131.84,133.9,137.09)),
            array(5500, 7499, array(107.2,108.61,110,73,111.43,116.38,122.02,123.6,125.56,127.52,130.71)),
            array(7500, array(101.56,102.97,105.08,105.79,110.73,116.38,117.42,119.28,121.14,124.33))
        );

        //pega a faixa etaria

        foreach($faixa as $key => $value){
            if(in_array($idade,$value)){
                $userfaixa = $key;
            }
            if($idade > 59){
                $userfaixa = 9;
            }
        }

        //busca valor respectivo da faixa na renda

        foreach($renda as $key => $value){
            if($key == 0){
                if($salario <= $value[0]){
                    $valor = $value[1][$userfaixa];
                }
            }
            else if($key == count($renda)-1){
                if($salario >= $value[0]){
                    $valor = $value[1][$userfaixa];
                }
            }
            else if($salario >= $value[0] && $salario <= $value[1]){
                $valor = $value[2][$userfaixa];
            }
        }

        $bodycontent = "
        <table>
        <thead>
            <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Renda</th>
            <th>Ressarcimento</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>".$name."</td>
            <td>".$idade."</td>
            <td>".$salario."</td>
            <td>".$valor."</td>
        </tr>
        </tbody>
        </table>
        <div class='imgContainer'>
        <img width='650px' height='441px' src='Images/tablevalues.png'>
        </div>";

        $data = array(
            'name' => $name = $this->request->getVar('name'),
            'dateofbirth' => $dateofbirth,
            'salario' => $salario = $this->request->getVar('salario'),
            'idade' => $idade,
            'userfaixa' => $userfaixa,
            'valor' => $valor,
            'bodycontent' => $bodycontent
        );

        $database = array(
            'name' => $data['name'],
            'idade' => $data['idade'],
            'renda' => $data['salario'],
            'ressarcimento' => $data['valor']
        );

        $myModel = new FormModel();
        $myModel->insert($database);
        return view('templateexerc',$data);
    }
}
