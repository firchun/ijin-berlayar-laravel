<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiBerlayar extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi_berlayar';
    protected $guarded = [];

    public function permohonan_berlayar()
    {
        return $this->belongsTo(PermohonanBerlayar::class, 'id_permohonan_berlayar');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}