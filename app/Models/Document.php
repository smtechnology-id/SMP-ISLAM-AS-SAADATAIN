<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kode_pendaftaran',
        'ijazah',
        'skhu',
        'akte_kelahiran',
        'nisn',
        'raport',
        'ktp_orang_tua',
        'surat_kematian',
        'kk',
        'pas_foto_2x3',
        'pas_foto_3x4',
        'lain_lain',
        'lain_lain2',
        'lain_lain3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
