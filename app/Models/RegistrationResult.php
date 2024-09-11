<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationResult extends Model
{
    use HasFactory;

    protected $table = 'registration_results';
    protected $fillable = [
        'user_id',
        'registration_id',
        'kode_pendaftaran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
