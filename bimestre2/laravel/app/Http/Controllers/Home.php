<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuariosModel;


class Home extends Controller
{
    public function index(){

        $model = new UsuariosModel();
        return view('index');
    }

    public function recebeDados(Request $request){
        $data = array(
            'nome' => $request->nome,
            'idade' => $request->idade
        );
        $model = new UsuariosModel();
        $model->nome = $data['nome'];
        $model->idade = $data['idade'];
        $model->save();

        return redirect('/')->with('sucess','Registro de dados realizado com sucesso');
    }

}