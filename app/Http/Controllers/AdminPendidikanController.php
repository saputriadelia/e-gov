<?php
namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AdminPendidikanController extends Controller
{
    public function index()
    {
        $pendidikans = Pendidikan::with('notification')->get();
        return view('admin.pendidikan.index', compact('pendidikans'));
    }

    public function create()
    {
        return view('admin.pendidikan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'klasifikasi' => 'required|string|max:255',
            'jumlah_siswa_sd' => 'nullable|integer',
            'jumlah_siswa_smp' => 'nullable|integer',
            'jumlah_siswa_sma' => 'nullable|integer',
            'jumlah_sekolah_sd' => 'nullable|integer',
            'jumlah_sekolah_smp' => 'nullable|integer',
            'jumlah_sekolah_sma' => 'nullable|integer',
            'jumlah_guru_sd' => 'nullable|integer',
            'jumlah_guru_smp' => 'nullable|integer',
            'jumlah_guru_sma' => 'nullable|integer',
        ]);

        $validated = array_merge([
            'jumlah_siswa_sd' => 0,
            'jumlah_siswa_smp' => 0,
            'jumlah_siswa_sma' => 0,
            'jumlah_sekolah_sd' => 0,
            'jumlah_sekolah_smp' => 0,
            'jumlah_sekolah_sma' => 0,
            'jumlah_guru_sd' => 0,
            'jumlah_guru_smp' => 0,
            'jumlah_guru_sma' => 0,
        ], $validated);

        $validated['total_siswa'] = $validated['jumlah_siswa_sd'] + $validated['jumlah_siswa_smp'] + $validated['jumlah_siswa_sma'];
        $validated['total_sekolah'] = $validated['jumlah_sekolah_sd'] + $validated['jumlah_sekolah_smp'] + $validated['jumlah_sekolah_sma'];
        $validated['total_guru'] = $validated['jumlah_guru_sd'] + $validated['jumlah_guru_smp'] + $validated['jumlah_guru_sma'];

        Pendidikan::create($validated);

        return redirect()->route('admin.pendidikan.index')->with('success', 'Festival pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('admin.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'klasifikasi' => 'required|string|max:255',
            'jumlah_siswa_sd' => 'nullable|integer',
            'jumlah_siswa_smp' => 'nullable|integer',
            'jumlah_siswa_sma' => 'nullable|integer',
            'jumlah_sekolah_sd' => 'nullable|integer',
            'jumlah_sekolah_smp' => 'nullable|integer',
            'jumlah_sekolah_sma' => 'nullable|integer',
            'jumlah_guru_sd' => 'nullable|integer',
            'jumlah_guru_smp' => 'nullable|integer',
            'jumlah_guru_sma' => 'nullable|integer',
        ]);

        $validated = array_merge([
            'jumlah_siswa_sd' => 0,
            'jumlah_siswa_smp' => 0,
            'jumlah_siswa_sma' => 0,
            'jumlah_sekolah_sd' => 0,
            'jumlah_sekolah_smp' => 0,
            'jumlah_sekolah_sma' => 0,
            'jumlah_guru_sd' => 0,
            'jumlah_guru_smp' => 0,
            'jumlah_guru_sma' => 0,
        ], $validated);

        $validated['total_siswa'] = $validated['jumlah_siswa_sd'] + $validated['jumlah_siswa_smp'] + $validated['jumlah_siswa_sma'];
        $validated['total_sekolah'] = $validated['jumlah_sekolah_sd'] + $validated['jumlah_sekolah_smp'] + $validated['jumlah_sekolah_sma'];
        $validated['total_guru'] = $validated['jumlah_guru_sd'] + $validated['jumlah_guru_smp'] + $validated['jumlah_guru_sma'];

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($validated);
        $pendidikan->status = 'pending'; // Set status kembali ke pending
        $pendidikan->save();

        return redirect()->route('admin.pendidikan.index')->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $filePath = storage_path('app/public/' . $pendidikan->poster);
        if ($pendidikan->poster && file_exists($filePath)) {
            unlink($filePath);
        }
        $pendidikan->delete();

        return redirect()->route('admin.pendidikan.index')->with('success', 'Festival pendidikan berhasil dihapus.');
    }

    public function sendNotification(Request $request, $id)
{
    $pendidikan = Pendidikan::findOrFail($id);
    $pendidikan->status = 'waiting_validation'; // Mengubah status menjadi waiting_validation
    $pendidikan->save();
    $message = "Judul: {$pendidikan->judul}, Klasifikasi: {$pendidikan->klasifikasi}, ";

        if ($pendidikan->klasifikasi === 'siswa dan guru') {
            $message .= "Jumlah Siswa SD: {$pendidikan->jumlah_siswa_sd}, Jumlah Siswa SMP: {$pendidikan->jumlah_siswa_smp}, Jumlah Siswa SMA: {$pendidikan->jumlah_siswa_sma}, Total Siswa: {$pendidikan->total_siswa}, \n";
            $message .= "Jumlah Guru SD: {$pendidikan->jumlah_guru_sd}, Jumlah Guru SMP: {$pendidikan->jumlah_guru_smp}, Jumlah Guru SMA: {$pendidikan->jumlah_guru_sma}, Total Guru: {$pendidikan->total_guru}, ";
        } elseif ($pendidikan->klasifikasi === 'siswa') {
            $message .= "Jumlah Siswa SD: {$pendidikan->jumlah_siswa_sd}, Jumlah Siswa SMP: {$pendidikan->jumlah_siswa_smp}, Jumlah Siswa SMA: {$pendidikan->jumlah_siswa_sma}, Total Siswa: {$pendidikan->total_siswa}, ";
        } elseif ($pendidikan->klasifikasi === 'guru') {
            $message .= "Jumlah Guru SD: {$pendidikan->jumlah_guru_sd}, Jumlah Guru SMP: {$pendidikan->jumlah_guru_smp}, Jumlah Guru SMA: {$pendidikan->jumlah_guru_sma}, Total Guru: {$pendidikan->total_guru}, ";
        } elseif ($pendidikan->klasifikasi === 'sekolah') {
            $message .= "Jumlah Sekolah SD: {$pendidikan->jumlah_sekolah_sd}, Jumlah Sekolah SMP: {$pendidikan->jumlah_sekolah_smp}, Jumlah Sekolah SMA: {$pendidikan->jumlah_sekolah_sma}, Total Sekolah: {$pendidikan->total_sekolah}, ";
        }

        $message .= "Dibuat pada: {$pendidikan->created_at}";

    Notification::create([
        'admin_bidang_id' => $pendidikan->id,
        'title' => "pendidikan",
        'message' => $message,
        'status' => 'pending',
        'read' => false,
    ]);

    return redirect()->route('admin.pendidikan.index')->with('success', 'Notifikasi berhasil dikirim ke Admin e-Gov.');
}


    public function acceptInformation(Request $request, $id)
    {
        // Logika untuk menerima informasi
        Notification::create([
            'admin_bidang_id' => $id, // ID admin pendidikan yang menerima notifikasi
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
            'admin_bidang_id' => $id, // ID admin pendidikan yang menerima notifikasi
            'title' => 'Informasi Ditolak',
            'message' => 'Informasi Anda telah ditolak.',
            'status' => 'declined',
        ]);



        return redirect()->route('admin.egov.notifications.index');
    }
}
