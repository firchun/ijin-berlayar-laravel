<?php

namespace App\Http\Controllers;

use App\Models\PermohonanBerlayar;
use App\Models\RekomendasiBerlayar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public function logistik($id)
    {
        $data = RekomendasiBerlayar::with(['permohonan_berlayar'])->where('id_permohonan_berlayar', $id)->get();
        $pdf =  \PDF::loadView('admin.pdf.rekomendasi', [
            'data' => $data,

        ])->setPaper('a4', 'portrait');

        return $pdf->stream('Rekomendasi Logistik Pelayaran' . date('Y-m-d H:i') . '.pdf');
    }

    public function spb()
    {
        $surat = (object) [
            'nomor_surat' => '18-0003-001-X-SPB-KP-2017',
            'nama_kapal' => 'MITRA JAYA',
            'bendera' => 'Indonesia',
            'tonase' => '29',
            'nakhoda' => 'NUR KHADIS',
            'jumlah_awak' => '13 Orang',
            'alat_penangkap' => 'Rawai Tuna',
            'pelabuhan_keberangkatan' => 'PP. Cilacap',
            'tujuan' => 'S. Hindia (Selatan Jawa)',
            'tanggal_berangkat' => '18-10-2017 / 21:45 WIB',
            'tempat_terbit' => 'PP. Cilacap',
            'tanggal_terbit' => '18-10-2017',
            'syahbandar' => 'Wahyu Winarno, S.St.PI',
        ];

        $pdf = \PDF::loadView('admin.pdf.spb', compact('surat'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('Surat_Persetujuan_Berlayar_' . date('Y-m-d_H-i') . '.pdf');
    }
}