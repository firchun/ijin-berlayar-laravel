<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use App\Models\PermohonanBerlayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermohonanBerlayarController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Surat Permohonan Berlayar'
        ];
        return view('admin.spb.index', $data);
    }
    public function getPermohonanBerlayarDataTable()
    {
        $PermohonanBerlayar = PermohonanBerlayar::with(['kapal'])->orderByDesc('id');

        // if (auth()->user()->role == 'User') {
        //     $kapal = Kapal::where('id_user', Auth::id())->first();
        //     if ($kapal) {
        //         $PermohonanBerlayar->where('id_kapal', $kapal->id);
        //     }
        // }
        return DataTables::of($PermohonanBerlayar)

            ->addColumn('action', function ($user) {
                $delete =  '<button class="btn btn-sm btn-danger delete-button mx-1" onclick="deleteUser(' . $user->id . ')">Delete</button>';
                $update =  '<button class="btn btn-sm btn-warning mx-1" onclick="editUser(' . $user->id . ')">Edit</button>';
                $verifikasi =  '<button class="btn btn-sm btn-warning mx-1" onclick="verifikasiUser(' . $user->id . ')">Verifikasi</button>';
                $detail =  '<button class="btn btn-sm btn-success mx-1" onclick="detailUser(' . $user->id . ')">Detail</button>';
                if (Auth::user()->role == 'User') {
                    return $update . ($user->diterima == 0 ? $delete : '');
                } else {
                    return $verifikasi . $detail;
                }
            })
            ->addColumn('cetak_rekomendasi', function ($user) {
                return '<button class="btn btn-sm btn-danger  mx-1"><i class="fa fa-file-pdf"></i> PDF Rekomendasi</button>';
            })
            ->addColumn('update_jadwal', function ($user) {
                return '<button class="btn btn-sm btn-warning  mx-1"><i class="fa fa-calendar"></i> Update Jadwal</button>';
            })
            ->addColumn('verifikasi_kepulangan', function ($user) {
                return '<button class="btn btn-sm btn-warning  mx-1"><i class="fa fa-check"></i> Verifikasi</button>';
            })
            ->addColumn('status', function ($PermohonanBerlayar) {
                if ($PermohonanBerlayar->diterima == 0) {
                    return '<span class="badge badge-warning">Menunggu Verifikasi</span>';
                } else if ($PermohonanBerlayar->diterima == 1) {
                    return '<span class="badge badge-success">Diterima</span>';
                } else {
                    return '<span class="badge badge-danger">Ditolak</span>';
                }
            })
            ->rawColumns(['action', 'status', 'cetak_rekomendasi', 'update_jadwal', 'verifikasi_kepulangan'])
            ->make(true);
    }


    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_nahkoda'      => 'required|string|max:255',
            'kapasitas_kapal'   => 'required|numeric|min:0',
            'jumlah_abk'        => 'required|integer|min:1',
            'tgl_keberangkatan' => 'required|date',
            'id_kapal'          => 'required|exists:kapal,id',
        ]);
        $validatedData['berat_muatan'] = 0;

        // Jika ada ID dalam request, maka lakukan update
        if ($request->has('id')) {
            $PermohonanBerlayar = PermohonanBerlayar::find($request->id);
            if ($PermohonanBerlayar) {
                $PermohonanBerlayar->update($validatedData);
                return response()->json([
                    'message' => 'Data Permohonan Berlayar berhasil diperbarui.',
                    'data' => $PermohonanBerlayar,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Data Permohonan Berlayar tidak ditemukan.',
                ], 404);
            }
        }

        // Jika tidak ada ID, maka lakukan create
        $PermohonanBerlayar = PermohonanBerlayar::create($validatedData);

        return response()->json([
            'message' => 'Surat Permohonan Berlayar berhasil dibuat.',
            'data' => $PermohonanBerlayar,
        ], 201);
    }
    public function destroy($id)
    {
        $PermohonanBerlayar = PermohonanBerlayar::find($id);

        if (!$PermohonanBerlayar) {
            return response()->json(['message' => 'PermohonanBerlayar not found'], 404);
        }

        $PermohonanBerlayar->delete();

        return response()->json(['message' => 'PermohonanBerlayar deleted successfully']);
    }
}