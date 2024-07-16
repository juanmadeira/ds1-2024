<?php

namespace App\Controllers;

class Calculadora extends BaseController
{
    public function index(): string
    {
        return view('calculadora');
    }

    public function post()
    {
        $data = array(
            'a' => $this->request->getPost('a'),
            'b' => $this->request->getPost('b'),
            'operator' => $this->request->getPost('operator')
        );
        echo Calculadora::index();
        return extract($data);
    }
}
