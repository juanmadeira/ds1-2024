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

    public function signin() {
        return view('signin');
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

        $this->session->setFlashdata('sucess', 'Usuário registrado com sucesso!');
        return redirect()->to('/');
    }

    public function verifyEmail($email) {
        $nerdsModel = new NerdsModel();
        $username = $nerdsModel->getWhere(['email' => $email])->getRowArray();
        if(empty($username)) return false;
        return true;
    }

    public function verifyPassword($password, $email) {
        $nerdsModel = new NerdsModel();
        $token = $nerdsModel->getWhere(['email'=>$email])->getRowArray()['password'];
        var_dump($password);
        if(password_verify($password, $token)) return true;
        return false;
    }


    public function login() {
        $nerdsModel = new NerdsModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if(!$this->verifyEmail($email)) {
            $this->session->setFlashdata('error', 'O endereço de e-mail não confere!');
            return redirect()->to('signin');
        }
        if(!$this->verifyPassword($password, $email)) {
            $this->session->setFlashdata('error', 'A senha não confere!');
            return redirect()->to('signin');
        }
        $user = $nerdsModel->getWhere(['email'=>$email])->getRowArray();
        $sessiondata = [
        'id' => $user['id'],
        'email' => $user['email'],
        'username' => $user['username'],
        // 'booksRelated' => $myModel->query('SELECT livros.* from livros join relations on relations.id_liv = livros.id join usuarios on usuarios.id = relations.id_user')->getResultArray()
        ];
        $this->session->set($sessiondata);
        if($user['adm'] == 1) return redirect()->to('admin');
        return redirect()->to('usuario');
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