<?php

namespace App\Controllers;
use App\Models\ArtistasModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    
    public function receive_data()
    {
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'bio' => $this->request->getVar('bio'),
            'gen' => $this->request->getVar('gen'),
            'pais' => $this->request->getVar('pais')
        );

        $art_model = new ArtistasModel();
        $art_model->insert($data);

        $result = $art_model->findAll();
        $data['result'] = $result;

        return view('music',$data);
    }
}