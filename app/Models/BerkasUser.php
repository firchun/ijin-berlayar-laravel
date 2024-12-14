<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasUser extends Model
{
    use HasFactory;
    protected $table = 'berkas_user';
    protected $guarded = [];
}