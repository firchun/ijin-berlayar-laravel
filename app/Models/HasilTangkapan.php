<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilTangkapan extends Model
{
    use HasFactory;
    protected $table = 'hasil_tangkapan';
    protected $guarded = [];

    public function permohonan_berlayar(): BelongsTo
    {
        return $this->belongsTo(PermohonanBerlayar::class, 'id_permohonan_berlayar');
    }
}