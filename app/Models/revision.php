<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = ['notification_id', 'revision_message'];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
