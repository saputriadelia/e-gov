<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class AdminEGovController extends Controller
{
    public function index()
    {
        $notificationCount = Notification::count(); // Misalnya, menghitung jumlah notifikasi
        return view('admin.egov.index', compact('notificationCount'));
    }
}
