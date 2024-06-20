<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notif';

    protected $fillable = [
        'admin_bidang_id', 'title', 'message', 'status', 'read'
    ];

    public $timestamps = true;

    // Relasi jika diperlukan
}
