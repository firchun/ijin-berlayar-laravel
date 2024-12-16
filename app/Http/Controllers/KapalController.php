<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KapalController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Kapal'
        ];
        return view('admin.kapal.index', $data);
    }
}