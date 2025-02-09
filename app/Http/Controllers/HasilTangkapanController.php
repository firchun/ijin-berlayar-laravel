<?php

namespace App\Http\Controllers;

use App\Models\HasilTangkapan;
use App\Models\PermohonanBerlayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class HasilTangkapanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'id_permohonan_berlayar'  => 'required|string|max:255',
            'nama_tangkapan'  => 'required|string|max:255',
            'jumlah_tangkapan' => 'required|string|max:255',
            'satuan'       => 'required|string',
            'jenis_ikan'       => 'required|string',
        ]);
        $hasil = HasilTangkapan::create($validatedData);

        return response()->json([
            'message' => 'hasil tangkapan berhasil dibuat.',
            'data' => $hasil,
        ], 201);
    }
    public function destroy($id)
    {
        $hasil = HasilTangkapan::find($id);

        if (!$hasil) {
            return response()->json(['message' => 'hasil not found'], 404);
        }

        $hasil->delete();

        return response()->json(['message' => 'hasil tangkapan dihapus']);
    }
    public function getTangkapanDataTable($id_permohonan)
    {
        $hasil = HasilTangkapan::where('id_permohonan_berlayar', $id_permohonan)->orderByDesc('id');

        return DataTables::of($hasil)
            ->addColumn('action', function ($hasil) {
                return '<button class="btn btn-sm btn-danger delete-button mx-1" onclick="deleteTangkapan(' . $hasil->id . ')">Delete</button>';
            })
            ->addColumn('jumlah', function ($hasil) {
                return $hasil->jumlah_tangkapan . ' ' . $hasil->satuan;
            })
            ->rawColumns(['action', 'jumlah'])
            ->make(true);
    }
    public function update($id, Request $request)
    {
        $permohonan = PermohonanBerlayar::find($id);
        $permohonan->tgl_kedatangan = $request->input('tgl_kedatangan');
        $permohonan->save();
        return response()->json([
            'message' => 'berhasil update kepulangan.',
        ], 201);
    }
    public function keberangkatan($id, Request $request)
    {
        $permohonan = PermohonanBerlayar::find($id);
        $permohonan->tgl_keberangkatan = $request->input('tgl_keberangkatan');
        $permohonan->save();
        return response()->json([
            'message' => 'berhasil update keberangkatan.',
        ], 201);
    }
}