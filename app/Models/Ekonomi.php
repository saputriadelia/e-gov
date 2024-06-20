<?php

// App\Models\Ekonomi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekonomi extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'kategori',
        'nama_pangan',
        'harga',
        'tanggal_masuk',
        'status',
    ];

    public function notification()
    {
        return $this->hasOne(Notification::class, 'admin_bidang_id');
    }
}
