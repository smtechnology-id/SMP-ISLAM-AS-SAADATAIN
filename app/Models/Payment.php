<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'jenis_pembayaran',
        'bukti_pembayaran',
        'status',
        'kode_pendaftaran',
    ];
}
