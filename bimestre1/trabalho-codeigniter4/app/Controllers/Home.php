<?php

namespace App\Controllers;
use App\Models\NerdsModel;
use App\Models\LivrosModel;

class Home extends BaseController {
    public function index() {
        // $nerdsModel = new nerdsModel();
        
        // $result = $nerdsModel->findAll();
        // $data['result'] = $result;
        return view('index');
    }
    
    // public function update() {
    //     $nerdsModel = new nerdsModel();
    //     $id = $this->request->getVar('id');
    //     $typeaction = $this->request->getVar('typeaction');
    //     $data = array(
    //         'autor' => $this->request->getVar('autor'),
    //         'titulo' => $this->request->getVar('titulo'),
    //         'ano' => $this->request->getVar('ano'),
    //         'editora' => $this->request->getVar('editora'),
    //         'adquiridor' => $this->request->getVar('adquiridor'),
    //         'disponiveis' => $this->request->getVar('disponiveis')
    //     );
    //     ($typeaction == 'insert')?$livrosModel->insert($data):$livrosModel->update($id, $data);
    //     return redirect()->to('/');
    // }

    public function login() {
        return view('login');
    }

    public function signup() {
        return view('signup');
    }

    public function register(){
        $nerdsModel = new NerdsModel();
        $data = array (
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        );

        $nerdsModel -> insert($data);

        $this->session->setFlashdata('item', 'Usuário Registrado com Sucesso!');
        print_r($_SESSION['item']);
        return redirect()->to('/');
    }

    // public function edit() {
    //     $id = $this->request->getVar('id');
    //     return view('edit_book',$this->getDataItem($id));
    // }

    // public function delete() {
    //     $livrosModel = new LivrosModel();
    //     $id = $this->request->getVar('id');
    //     $livrosModel->delete($id);
    //     return redirect()->to('/');
    // }

    // public function getDataItem($id) {
    //     $livrosModel = new LivrosModel();
    //     $result = $livrosModel->find($id);
    //     return $result;
    // }
}