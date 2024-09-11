<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kode_pendaftaran',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'anak_ke',
        'jumlah_saudara_kandung',
        'jumlah_saudara_tiri',
        'jumlah_saudara_angkat',
        'berat_badan',
        'tinggi_badan',
        'golongan_darah',
        'penyakit_yang_pernah_diderita',
        'alamat_lengkap',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'telephone',
        'bertempat_tinggal_pada',
        'status',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }
    public function payments()
    {
        return $this->hasOne(Payment::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }
    
}
