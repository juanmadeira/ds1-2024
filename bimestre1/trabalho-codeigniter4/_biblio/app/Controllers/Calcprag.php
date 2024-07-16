<?php

namespace App\Controllers;

class Calcprag extends BaseController
{
    public function index(): string
    {
        return view('calcprag');
    }

    public function bhaskara(): string
    {
        return view('calcbhask');
    }
}