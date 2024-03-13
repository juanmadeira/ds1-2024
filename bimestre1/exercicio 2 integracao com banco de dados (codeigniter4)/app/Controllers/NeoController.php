<?php

namespace App\Controllers;

class Neo extends BaseController
{
    public function tela1(): string
    {
        return view('tela1');
    }

        public function tela2(): string
    {
        return view('tela2');
    }

        public function tela3(): string
    {
        return view('tela3');
    }
}
