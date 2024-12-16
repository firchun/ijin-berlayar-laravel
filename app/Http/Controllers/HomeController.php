<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pimpinan = User::where('role', 'Pimpinan')->count();
        $staff = User::where('role', 'Staff')->count();
        $user = User::where('role', 'User')->count();

        $widget = [
            'user' => $user,
            'pimpinan' => $pimpinan,
            'staff' => $staff,
            //...
        ];

        return view('admin.dashboard', compact('widget'));
    }
}