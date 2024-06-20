@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Informasi Pendidikan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="admin-assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

@section('content')
<div class="container">
    <div class="text-center mb-3">
        <a href="{{ route('admin.pendidikan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        <div class="card-header text-center">
            <h4>Kelola Informasi Pendidikan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Tahun</th>
                                    <th>Klasifikasi</th> 
                                    <th>Jumlah Siswa SD</th>
                                    <th>Jumlah Siswa SMP</th>
                                    <th>Jumlah Siswa SMA</th>
                                    <th>Jumlah Sekolah SD</th>
                                    <th>Jumlah Sekolah SMP</th>
                                    <th>Jumlah Sekolah SMA</th>
                                    <th>Jumlah Guru SD</th>
                                    <th>Jumlah Guru SMP</th>
                                    <th>Jumlah Guru SMA</th>
                                    <th>Total Siswa</th>
                                    <th>Total Sekolah</th>
                                    <th>Total Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendidikans as $pendidikan)
                                    <tr>
                                        <td>{{ $pendidikan->id }}</td>
                                        <td>{{ $pendidikan->judul }}</td>
                                        <td>{{ $pendidikan->tahun }}</td>
                                        <td>{{ $pendidikan->klasifikasi }}</td>
                                        <td>{{ $pendidikan->jumlah_siswa_sd }}</td>
                                        <td>{{ $pendidikan->jumlah_siswa_smp }}</td>
                                        <td>{{ $pendidikan->jumlah_siswa_sma }}</td>
                                        <td>{{ $pendidikan->jumlah_sekolah_sd }}</td>
                                        <td>{{ $pendidikan->jumlah_sekolah_smp }}</td>
                                        <td>{{ $pendidikan->jumlah_sekolah_sma }}</td>
                                        <td>{{ $pendidikan->jumlah_guru_sd }}</td>
                                        <td>{{ $pendidikan->jumlah_guru_smp }}</td>
                                        <td>{{ $pendidikan->jumlah_guru_sma }}</td>
                                        <td>{{ $pendidikan->total_siswa }}</td>
                                        <td>{{ $pendidikan->total_sekolah }}</td>
                                        <td>{{ $pendidikan->total_guru }}</td>
                                        <td>
                                            @if ($pendidikan->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($pendidikan->status == 'accepted')
                                    <span class="badge badge-success">Accepted</span>
                                @elseif ($pendidikan->status == 'declined')
                                    <span class="badge badge-danger">Declined</span>
                                @elseif ($pendidikan->status == 'waiting_validation')
                                    <span class="badge badge-info">Menunggu Validasi</span>
                                @endif
                            </td>
                            <td>
                                @if ($pendidikan->status == 'pending' || $pendidikan->status == 'declined')
                                    <form action="{{ route('admin.pendidikan.sendNotification', $pendidikan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Kirim ke Admin e-Gov</button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.pendidikan.edit', $pendidikan->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.pendidikan.destroy', $pendidikan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="admin-assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin-assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
