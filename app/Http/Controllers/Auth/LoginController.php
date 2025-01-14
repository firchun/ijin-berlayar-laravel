<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override the default username method to allow login via email, NIK, or NIP.
     *
     * @return string
     */
    public function username()
    {
        $loginField = request()->input('email');
        $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($loginField) ? 'nik' : 'nip');
        request()->merge([$fieldType => $loginField]);
        return $fieldType;
    }

    /**
     * Add a success flash message after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        session()->flash('success', 'berhasil login!');
        return $this->redirectTo;
    }
}
