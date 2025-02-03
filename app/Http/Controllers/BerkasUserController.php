<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\Kapal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BerkasUserController extends Controller
{
    public function update()
    {
        $berkas = BerkasUser::where('id_user', Auth::id())->first();
        $data = [
            'title' => 'Update Berkas',
            'berkas' => $berkas,
        ];
        return view('admin.berkas_user.update', $data);
    }
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'file_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_pkl' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_bpjs' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_sertif_kapal' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_kesehatan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Simpan file ke storage
        $data = [
            'id_user' => auth()->id(), // Mengambil ID user yang sedang login
            'file_ktp' => $request->file('file_ktp')->store('public/berkas_user'),
            'file_pkl' => $request->file('file_pkl')->store('public/berkas_user'),
            'file_bpjs' => $request->file('file_bpjs')->store('public/berkas_user'),
            'file_sertif_kapal' => $request->file('file_sertif_kapal')->store('public/berkas_user'),
            'file_kesehatan' => $request->file('file_kesehatan')->store('public/berkas_user'),
            'keterangan' => $request->keterangan,
        ];

        BerkasUser::create($data);

        return back()->with('success', 'Berkas berhasil diunggah!');
    }
    public function updateBerkas(Request $request)
    {
        // Cari data berkas user berdasarkan ID user yang sedang login
        $berkas = BerkasUser::where('id_user', Auth::id())->first();

        if (!$berkas) {
            return back()->with('error', 'Data berkas tidak ditemukan.');
        }

        // Validasi data
        $validated = $request->validate([
            'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_pkl' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_bpjs' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_sertif_kapal' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'file_kesehatan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Update file jika ada yang baru
        if ($request->hasFile('file_ktp')) {
            // Hapus file lama
            if ($berkas->file_ktp && Storage::exists($berkas->file_ktp)) {
                Storage::delete($berkas->file_ktp);
            }
            // Simpan file baru
            $berkas->file_ktp = $request->file('file_ktp')->store('public/berkas_user');
        }

        if ($request->hasFile('file_pkl')) {
            if ($berkas->file_pkl && Storage::exists($berkas->file_pkl)) {
                Storage::delete($berkas->file_pkl);
            }
            $berkas->file_pkl = $request->file('file_pkl')->store('public/berkas_user');
        }

        if ($request->hasFile('file_bpjs')) {
            if ($berkas->file_bpjs && Storage::exists($berkas->file_bpjs)) {
                Storage::delete($berkas->file_bpjs);
            }
            $berkas->file_bpjs = $request->file('file_bpjs')->store('public/berkas_user');
        }

        if ($request->hasFile('file_sertif_kapal')) {
            if ($berkas->file_sertif_kapal && Storage::exists($berkas->file_sertif_kapal)) {
                Storage::delete($berkas->file_sertif_kapal);
            }
            $berkas->file_sertif_kapal = $request->file('file_sertif_kapal')->store('public/berkas_user');
        }

        if ($request->hasFile('file_kesehatan')) {
            if ($berkas->file_kesehatan && Storage::exists($berkas->file_kesehatan)) {
                Storage::delete($berkas->file_kesehatan);
            }
            $berkas->file_kesehatan = $request->file('file_kesehatan')->store('public/berkas_user');
        }

        // Update keterangan jika ada
        if ($request->filled('keterangan')) {
            $berkas->keterangan = $request->keterangan;
        }

        // Simpan perubahan ke database
        $berkas->save();

        return back()->with('success', 'Berkas berhasil diperbarui!');
    }
    public function show($id_kapal)
    {
        $kapal = Kapal::findorFail($id_kapal);
        $detailUser = BerkasUser::where('id_user', $kapal->id_user)->first();

        return response()->json([
            'file_ktp' => Storage::url($detailUser->file_ktp),
            'file_pkl' => Storage::url($detailUser->file_pkl),
            'file_bpjs' => Storage::url($detailUser->file_bpjs),
            'file_sertif_kapal' => Storage::url($detailUser->file_sertif_kapal),
            'file_kesehatan' => Storage::url($detailUser->file_kesehatan),
        ]);
    }
}