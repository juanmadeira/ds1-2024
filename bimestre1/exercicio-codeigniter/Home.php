<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('form');
    }

    public function receive_data()
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'date' => $this->request->getVar('date'),
            'sal' => $this->request->getVar('sal')
        );

        return view('form_data',$data);
    }
}
