<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCard extends Model
{
    use HasFactory;

    protected $table = 'exam_card';
    protected $fillable = [
        'user_id',
        'file',
        'kode_pendaftaran',
        'tanggal_ujian',
        'waktu_ujian',
        'lokasi_ujian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function registration()
    {
        return $this->belongsTo(Registration::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
