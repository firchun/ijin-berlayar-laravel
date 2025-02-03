<?php

namespace App\Http\Controllers;

use App\Models\PermohonanBerlayar;
use App\Models\RekomendasiBerlayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalink;
use Yajra\DataTables\Facades\DataTables;

class RekomendasiBerlayarController extends Controller
{
    public function  index()
    {
        $data = [
            'title' => 'Rekomendasi Logistik'
        ];
        return view('admin.logistik.index', $data);
    }
    public function getRekomendasiDataTable($id_permohonan)
    {
        $kapal = RekomendasiBerlayar::where('id_permohonan_berlayar', $id_permohonan)->orderByDesc('id');

        return DataTables::of($kapal)
            ->addColumn('action', function ($rekomendasi) {
                return '<button class="btn btn-sm btn-danger delete-button mx-1" onclick="deleteRekomendasi(' . $rekomendasi->id . ')">Delete</button>';
            })
            ->addColumn('jumlah', function ($rekomendasi) {
                return $rekomendasi->jumlah . ' ' . $rekomendasi->satuan;
            })
            ->rawColumns(['action', 'jumlah'])
            ->make(true);
    }
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'id_permohonan_berlayar'  => 'required|string|max:255',
            'nama_barang'  => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'satuan'       => 'required|string',
        ]);
        $validatedData['id_user'] = Auth::id();
        $rekomendasi = RekomendasiBerlayar::create($validatedData);

        return response()->json([
            'message' => 'rekomendasi berhasil dibuat.',
            'data' => $rekomendasi,
        ], 201);
    }
    public function destroy($id)
    {
        $Kapal = RekomendasiBerlayar::find($id);

        if (!$Kapal) {
            return response()->json(['message' => 'rekomendasi not found'], 404);
        }

        $Kapal->delete();

        return response()->json(['message' => 'rekomendasi deleted successfully']);
    }
    public function update($id, Request $request)
    {
        $permohonan = PermohonanBerlayar::find($id);
        $permohonan->rekomendasi = 1;
        $permohonan->no_rekomendasi = $request->input('no_rekomendasi');
        $permohonan->save();
        return response()->json([
            'message' => 'rekomendasi berhasil diajukan.',
        ], 201);
    }
    public function verifikasi($id, Request $request)
    {
        $permohonan = PermohonanBerlayar::find($id);
        $permohonan->diterima = 1;
        $permohonan->save();
        return response()->json([
            'message' => 'rekomendasi berhasil verifikasi.',
        ], 201);
    }
}