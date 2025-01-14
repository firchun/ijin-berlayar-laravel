<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermohonanBerlayar extends Model
{
    use HasFactory;
    protected $table = 'permohonan_berlayar';
    protected $guarded = [];
    public function kapal(): BelongsTo
    {
        return $this->belongsTo(Kapal::class, 'id_kapal');
    }
}
