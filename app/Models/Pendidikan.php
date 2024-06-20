<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tahun',
        'klasifikasi',
        'jumlah_siswa_sd',
        'jumlah_siswa_smp',
        'jumlah_siswa_sma',
        'jumlah_sekolah_sd',
        'jumlah_sekolah_smp',
        'jumlah_sekolah_sma',
        'jumlah_guru_sd',
        'jumlah_guru_smp',
        'jumlah_guru_sma',
        'total_siswa',
        'total_sekolah',
        'total_guru',
    ];
    public function notification()
    {
        return $this->hasOne(Notification::class, 'admin_bidang_id');
    }
}
