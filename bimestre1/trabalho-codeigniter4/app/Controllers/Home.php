<?php

namespace App\Controllers;
use App\Models\NerdsModel;
use App\Models\LivrosModel;

class Home extends BaseController
{
    public function index()
    {
        $nerdsModel = new nerdsModel();
        
        $result = $nerdsModel->findAll();
        $data['result'] = $result;
        return view('/index',$data);
    }
    
    public function update()
    {
        $nerdsModel = new nerdsModel();
        $id = $this->request->getVar('id');
        $typeaction = $this->request->getVar('typeaction');
        $data = array(
            'nome' => $this->request->getVar('nome'),
            'bio' => $this->request->getVar('bio'),
            'gen' => $this->request->getVar('gen'),
            'pais' => $this->request->getVar('pais')
        );
        ($typeaction == 'insert')?$artistasModel->insert($data):$artistasModel->update($id, $data);
        return redirect()->to('/');
    }

    public function insertArtist()
    {
        return view('insert_artist');
    }

    public function edit()
    {   
        $id = $this->request->getVar('id');
        return view('edit_artist',$this->getDataItem($id));
    }

    public function delete()
    {
        $artistasModel = new ArtistasModel();
        $id = $this->request->getVar('id');
        $artistasModel->delete($id);
        return redirect()->to('/');
    }

    public function getDataItem($id)
    {
        $artistasModel = new ArtistasModel();
        $result = $artistasModel->find($id);
        return $result;
    }
}