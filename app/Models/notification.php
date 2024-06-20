<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_bidang_id', 
        'title', 
        'message', 
        'status', 
        'read',
    ];

    public function markAsRead()
    {
        $this->read = true;
        $this->save();
    }

    public function budaya()
    {
        return $this->belongsTo(Budaya::class, 'admin_bidang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_bidang_id');
    }
}