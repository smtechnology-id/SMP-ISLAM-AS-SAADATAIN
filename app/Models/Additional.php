<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;
    protected $table = 'additionals';
    protected $fillable = [
        'user_id',
        'kode_pendaftaran',
        'masuk_sebagai',
        'asal_sekolah',
        'lulusan_tahun',
        'no_sttb',
        'nisn',
        'no_peserta_uasbn',
        'tanggal_diterima',
    ];
}
