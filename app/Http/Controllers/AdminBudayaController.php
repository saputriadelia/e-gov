<?php
namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AdminBudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::with('notification')->get();
        return view('admin.budaya.index', compact('budayas'));
    }

    public function create()
    {
        return view('admin.budaya.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'poster' => 'nullable|image',
            'nama_festival' => 'required|string|max:255',
            'tanggal_waktu' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'batasan_usia' => 'nullable|integer',
            'harga_tiket' => 'nullable|numeric',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $validated['status'] = $validated['status'] ?? 'pending';

        Budaya::create($validated);

        return redirect()->route('admin.budaya.index')->with('success', 'Festival budaya berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        return view('admin.budaya.edit', compact('budaya'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'poster' => 'nullable|image',
            'nama_festival' => 'required|string|max:255',
            'tanggal_waktu' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'batasan_usia' => 'nullable|integer',
            'harga_tiket' => 'nullable|numeric',
        ]);

        $budaya = Budaya::findOrFail($id);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $budaya->update($validated);
        $budaya->status = 'pending'; // Set status kembali ke pending
        $budaya->save();

        return redirect()->route('admin.budaya.index')->with('success', 'Festival budaya berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        $filePath = storage_path('app/public/' . $budaya->poster);
        if ($budaya->poster && file_exists($filePath)) {
            unlink($filePath);
        }
        $budaya->delete();

        return redirect()->route('admin.budaya.index')->with('success', 'Festival budaya berhasil dihapus.');
    }

    public function sendNotification(Request $request, $id)
{
    $budaya = Budaya::findOrFail($id);
    $budaya->status = 'waiting_validation'; // Mengubah status menjadi waiting_validation
    $budaya->save();

    Notification::create([
        'admin_bidang_id' => $budaya->id,
        'title' => "budaya",
        'message' => "Nama Festival: {$budaya->nama_festival}, Lokasi: {$budaya->lokasi}, Tanggal: {$budaya->tanggal_waktu}",
        'status' => 'pending',
        'read' => false,
    ]);

    return redirect()->route('admin.budaya.index')->with('success', 'Notifikasi berhasil dikirim ke Admin e-Gov.');
}


    public function acceptInformation(Request $request, $id)
    {
        // Logika untuk menerima informasi
        Notification::create([
            'admin_bidang_id' => $id, // ID admin budaya yang menerima notifikasi
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
            'admin_bidang_id' => $id, // ID admin budaya yang menerima notifikasi
            'title' => 'Informasi Ditolak',
            'message' => 'Informasi Anda telah ditolak.',
            'status' => 'declined',
        ]);

        return redirect()->route('admin.egov.notifications.index');
    }
}
