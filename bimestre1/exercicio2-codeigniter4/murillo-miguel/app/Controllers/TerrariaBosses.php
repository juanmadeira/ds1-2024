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
            'spawn' => $this->request->getVar('spawn')
        );
        $myModel->insert($data);
        // $result = $myModel->findAll();
        // $data['result'] = $result;
        // return view('terrariaindex', $data);
        return redirect()->to('terrariaindex');
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
}
