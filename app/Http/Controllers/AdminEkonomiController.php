<?php

namespace App\Http\Controllers;

use App\Models\Ekonomi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;

class AdminEkonomiController extends Controller
{
    public function index()
    {
        $ekonomis = Ekonomi::with('notification')->get();
        return view('admin.ekonomi.index', compact('ekonomis'));
    }

    public function create()
    {
        return view('admin.ekonomi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image',
            'kategori' => 'required|string|in:nabati,hewani',
            'nama_pangan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Ekonomi::create($validated);

        return redirect()->route('admin.ekonomi.index')->with('success', 'Data ekonomi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekonomi = Ekonomi::findOrFail($id);
        return view('admin.ekonomi.edit', compact('ekonomi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image',
            'kategori' => 'required|string|in:nabati,hewani',
            'nama_pangan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        $ekonomi = Ekonomi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambars', 'public');
        }

        $ekonomi->update($validated);
        $ekonomi->status = 'pending'; // Set status kembali ke pending
        $ekonomi->save();

        return redirect()->route('admin.ekonomi.index')->with('success', 'Festival ekonomi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekonomi = Ekonomi::findOrFail($id);
        $filePath = storage_path('app/public/' . $ekonomi->gambar);
        if ($ekonomi->gambar && file_exists($filePath)) {
            unlink($filePath);
        }
        $ekonomi->delete();

        return redirect()->route('admin.ekonomi.index')->with('success', 'Festival ekonomi berhasil dihapus.');
    }

    public function sendNotification(Request $request, $id)
{
    $ekonomi = Ekonomi::findOrFail($id);
    $ekonomi->status = 'waiting_validation'; // Mengubah status menjadi waiting_validation
    $ekonomi->save();

    Notification::create([
        'admin_bidang_id' => $ekonomi->id,
        'title' => "ekonomi",
        'message' => "Ekonomi, gambar : {$ekonomi->gambar}, Nama Pangan: {$ekonomi->nama_pangan}, harga: {$ekonomi->harga}, Tanggal: {$ekonomi->tanggal_masuk}",
        'status' => 'pending',
        'read' => false,
    ]);

    return redirect()->route('admin.ekonomi.index')->with('success', 'Notifikasi berhasil dikirim ke Admin e-Gov.');
}


    public function acceptInformation(Request $request, $id)
    {
        // Logika untuk menerima informasi
        Notification::create([
            'admin_bidang_id' => $id, // ID admin ekonomi yang menerima notifikasi
            'title' => 'Informasi Diterima',
            'message' => 'Informasi Anda telah diterima.',
            'status' => 'accepted',
        ]);

        return redirect()->route('admin.egov.notifications.index');
    }

    public function declineInformation(Request $request, $id)
    {
        // Logika untuk menolak informasi
        Notification::create([
            'admin_bidang_id' => $id, // ID admin ekonomi yang menerima notifikasi
            'title' => 'Informasi Ditolak',
            'message' => 'Informasi Anda telah ditolak.',
            'status' => 'declined',
        ]);

        return redirect()->route('admin.egov.notifications.index');
    }
}

