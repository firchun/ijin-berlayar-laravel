<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => User::all()
        ];
        return view('admin.users.index', $data);
    }
    public function user()
    {
        $data = [
            'title' => 'Akun User',
            'users' => 'User'
        ];
        return view('admin.users.user', $data);
    }
    public function admin()
    {
        $data = [
            'title' => 'Akun Pimpinan',
            'users' => 'Pimpinan'
        ];
        return view('admin.users.pimpinan', $data);
    }
    public function staff()
    {
        $data = [
            'title' => 'Akun Staff',
            'users' => 'Staff'
        ];
        return view('admin.users.staff', $data);
    }

    public function getUsersDataTable($role)
    {
        $users = User::where('role', $role)->orderByDesc('id');

        return Datatables::of($users)
            ->addColumn('avatar', function ($user) {
                return view('admin.users.components.avatar', compact('user'));
            })
            ->addColumn('action', function ($user) {
                return view('admin.users.components.actions', compact('user'));
            })
            ->addColumn('role', function ($user) {
                return '<span class="badge bg-label-primary">' . $user->role . '</span>';
            })

            ->rawColumns(['action', 'role', 'avatar'])
            ->make(true);
    }
    public function store(Request $request)
    {
        if ($request->filled('id')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }


        if ($request->filled('id')) {
            $usersData = [
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name') ?? '-',
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ];
            $user = User::find($request->input('id'));
            if (!$user) {
                return response()->json(['message' => 'user not found'], 404);
            }

            $user->update($usersData);
            $message = 'user updated successfully';
        } else {
            $usersData = [
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name') ?? '-',
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ];

            User::create($usersData);
            $message = 'user created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function edit($id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($User);
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}