<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiLogistikController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Rekomendasi Logistik'
        ];
        return view('admin.logistik.index', $data);
    }
}