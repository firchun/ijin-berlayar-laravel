<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KapalController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Kapal'
        ];
        return view('admin.kapal.index', $data);
    }
    public function getKapalDataTable()
    {
        $kapal = Kapal::orderByDesc('id');
        if (auth()->user()->role == 'User') {
            $kapal->where('id_user', Auth::id());
        }
        return DataTables::of($kapal)

            ->addColumn('action', function ($user) {
                $delete =  '<button class="btn btn-sm btn-danger delete-button mx-1" onclick="deleteUser(' . $user->id . ')">Delete</button>';
                $update =  '<button class="btn btn-sm btn-warning mx-1" onclick="editUser(' . $user->id . ')">Edit</button>';
                return $update . $delete;
            })
            ->addColumn('status', function ($user) {
                if ($user->diterima == 0) {
                    return '<span class="badge badge-warning">Menunggu Verifikasi</span>';
                } else if ($user->diterima == 1) {
                    return '<span class="badge badge-success">Diterima</span>';
                } else {
                    return '<span class="badge badge-danger">Ditolak</span>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_kapal'       => 'required|string|max:255',
            'jenis_kapal'      => 'required|string|max:255',
            'dimensi_kapal'    => 'nullable|string|max:255',
            'bahan_kapal'      => 'nullable|string|max:255',
            'jumlah_kru'       => 'nullable|integer|min:1',
            'penyimpanan'      => 'nullable|string|max:255',
            'alat_tangkap'     => 'nullable|string|max:255',
            'alat_keselamatan' => 'nullable|string|max:255',
        ]);
        $validatedData['id_user'] = Auth::id();

        // Jika ada ID dalam request, maka lakukan update
        if ($request->has('id')) {
            $kapal = Kapal::find($request->id);
            if ($kapal) {
                $kapal->update($validatedData);
                return response()->json([
                    'message' => 'Data kapal berhasil diperbarui.',
                    'data' => $kapal,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Data kapal tidak ditemukan.',
                ], 404);
            }
        }

        // Jika tidak ada ID, maka lakukan create
        $kapal = Kapal::create($validatedData);

        return response()->json([
            'message' => 'Data kapal berhasil dibuat.',
            'data' => $kapal,
        ], 201);
    }
    public function destroy($id)
    {
        $Kapal = Kapal::find($id);

        if (!$Kapal) {
            return response()->json(['message' => 'Kapal not found'], 404);
        }

        $Kapal->delete();

        return response()->json(['message' => 'Kapal deleted successfully']);
    }
}
