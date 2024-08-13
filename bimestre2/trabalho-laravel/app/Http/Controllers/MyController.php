<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CdModel;
use Validator;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myModel = new CdModel();
        $cdList = $myModel->all();
        $data = ['cdList' => $cdList];
        return view('index', $data);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
        'name' => 'required|min:5|max:255',
        'desc' => 'required|min:5|max:255',
        'price' => 'required|numeric'
        ]);
        if ($validator->fails()){
            return back()->withError($validator)->withInput();
        }
        $myModel = new CdModel();
        $myModel->name = $request->name;
        $myModel->desc = $request->desc;
        $myModel->price = $request->price;
        $myModel->save();

        return redirect('/')->with('success', 'CD inserido com sucesso!');
    }

    public function remove(Request $request)
    {
        $id = $request->id_for_removing;
        $myModel = new CdModel();
        $myModel->find($id)->delete();
        return redirect('/')->with('success', 'O CD selecionado foi removido.');
    }
}
