<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Update Jadwal Keberangkatan dan Kepulangan Kapal'
        ];
        return view('admin.jadwal.index', $data);
    }
}