<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'poster', 'nama_festival', 'tanggal_waktu', 'lokasi', 'semua_usia', 'harga_tiket'
    ];

    public function notification()
    {
        return $this->hasOne(Notification::class, 'admin_bidang_id');
    }
}
