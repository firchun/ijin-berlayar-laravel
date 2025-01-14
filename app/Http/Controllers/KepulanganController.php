<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepulanganController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Verifikasi Data Kepulangan Kapal'
        ];
        return view('admin.kepulangan.index', $data);
    }
}