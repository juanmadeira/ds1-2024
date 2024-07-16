<?php

namespace App\Controllers;

use App\Models\TerrariaModel;

class TerrariaBosses extends BaseController
{
    public function index()
    {
        $myModel = new TerrariaModel();

        $result = $myModel->findAll();
        $data['result'] = $result;
        return view('terrariaindex', $data);
    }

    public function update()
    {
        $myModel = new TerrariaModel();
        $data = array(
            'name' => $this->request->getVar('name'),
            'hp' => $this->request->getVar('hp'),
            'spawn' => $this->request->getVar('spawn'),
        );
        ($this->request->getVar('typeaction') == 'insert')?$myModel->insert($data):$myModel->update($this->request->getVar('id'),$data);
        return redirect()->to('terrariaindex');
    }

    public function edit()
    {
        $id = $this->request->getVar('id');
        var_dump($this->getDataItem($id));
        return view('terrariaedit',$this->getDataItem($id));
    }

    public function form()
    {
        return view('terrariainsert');
    }

    public function delete()
    {
        $myModel = new TerrariaModel();
        $id = $this->request->getVar('id');
        $myModel->delete($id);
        return redirect()->to('terrariaindex');
    }

    public function getDataItem($id)
    {
        $myModel = new TerrariaModel();
        $result = $myModel->find($id);
        return $result;
    }
}
