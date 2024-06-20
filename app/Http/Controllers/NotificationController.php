<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Revision;
use Illuminate\Support\Facades\Auth;
use App\Models\Budaya;
use App\Models\Ekonomi;
use App\Models\Pendidikan;

class NotificationController extends Controller
{
    public function index(Request $request, $title = null)
{
    // Mencari query pencarian jika ada
    $search = $request->input('search');

    // Mengambil data dengan paginasi dan pencarian
    $query = Notification::query();
    if ($search) {
        $query->where('message', 'like', '%' . $search . '%');
    }
    if ($title) {
        // Filter berdasarkan kategori (judul)
        $query->where('title', $title);
    }
    $notifications = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.egov.notifications.index', compact('notifications', 'search', 'title'));
}
    


    public function accept(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->status = 'accepted';
        $notification->save();

        $this->insertToNotifications($notification);

        // Perbarui status di tabel Budaya
        $budaya = Budaya::where('id', $notification->admin_bidang_id)->first();
        if ($budaya) {
            $budaya->status = 'accepted';
            $budaya->save();
        }

        // Perbarui status di tabel Budaya
        $pendidikan = Pendidikan::where('id', $notification->admin_bidang_id)->first();
        if ($pendidikan) {
            $pendidikan->status = 'accepted';
            $pendidikan->save();
        }

        // Perbarui status di tabel Budaya
        $ekonomi = Ekonomi::where('id', $notification->admin_bidang_id)->first();
        if ($ekonomi) {
            $ekonomi->status = 'accepted';
            $ekonomi->save();
        }

        return redirect()->back()->with('success', 'Informasi sudah di-ACC');
    }

    public function showDeclineForm($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin.egov.notifications.decline', compact('notification'));
    }

    public function decline(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $notification = Notification::findOrFail($id);
        $notification->status = 'declined';
        $notification->save();

        // Simpan pesan revisi
        Revision::create([
            'notification_id' => $id,
            'revision_message' => $request->message
        ]);

        $this->insertToNotifications($notification);

        // Perbarui status di tabel Budaya
        $budaya = Budaya::where('id', $notification->admin_bidang_id)->first();
        if ($budaya) {
            $budaya->status = 'declined';
            $budaya->save();
        }

        $pendidikan = Pendidikan::where('id', $notification->admin_bidang_id)->first();
        if ($pendidikan) {
            $pendidikan->status = 'declined';
            $pendidikan->save();
        }

        $ekonomi = Ekonomi::where('id', $notification->admin_bidang_id)->first();
        if ($ekonomi) {
            $ekonomi->status = 'declined';
            $ekonomi->save();
        }
        

        return redirect()->back()->with('success', 'Informasi sudah ditolak');
    }
// NotificationController.php

public function markAsRead($id)
{
    $notification = Notification::find($id);
    if ($notification) {
        $notification->read = true;
        $notification->save();
    }

    return redirect()->back();
}

private function insertToNotifications($notification)
    {
        // Contoh: masukkan data ke tabel notifications
        Notification::create([
            'title' => $notification->title,
            'message' => $notification->message,
            'status' => $notification->status,
            'admin_bidang_id' => $notification->admin_bidang_id, // Masukkan admin_bidang_id dari notification
        // Tambahkan kolom lain yang dibutuhkan
        ]);
    }



// Menahan dumlu
private function updateBidangStatus($notification, $status)
{
    $bidangClasses = [Budaya::class, Pendidikan::class, Ekonomi::class];

    foreach ($bidangClasses as $bidangClass) {
        $bidang = $bidangClass::where('id', $notification->admin_bidang_id)->first();
        if ($bidang) {
            $bidang->status = $status;
            $bidang->save();
        }
    }
}

public function budaya()
{
    $acceptedNotifications = Notification::with('budaya')
        ->where('status', 'accepted')
        ->get();

    return view('MADARA.budaya', compact('acceptedNotifications'));
}

}
// menahan dumlu