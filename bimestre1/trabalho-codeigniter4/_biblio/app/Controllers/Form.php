<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index(): string
    {
        return view('formulario');
    }
    public function receiveData()
    {
        $data = array(
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('pwd')
        );
        print_r($data['email']);
    }
}
