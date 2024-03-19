<?php

namespace App\Controllers;
use App\Models\ArtistasModel;

class FirstAm extends BaseController
{
    public function index()
    {
        $artistasModel = new ArtistasModel();
        
        $result = $artistasModel->findAll();
        $data['result'] = $result;
        return view('/index',$data);
    }
    
    public function update()
    {
        $artistasModel = new ArtistasModel();

        $data = array(
            'nome' => $this->request->getVar('nome'),
            'bio' => $this->request->getVar('bio'),
            'gen' => $this->request->getVar('gen'),
            'pais' => $this->request->getVar('pais')
        );

        $artistasModel->insert($data);
        return redirect()->to('/');
    }

    public function insertArtist()
    {
        return view('insert_artist');
    }

    public function delete()
    {
        $artistasModel = new ArtistasModel();
        $id = $this->request->getVar('id');
        $artistasModel->delete($id);
        return redirect()->to('/');
    }
}