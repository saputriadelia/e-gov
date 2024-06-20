@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Informasi Budaya</title>
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
        <a href="{{ route('admin.budaya.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        <div class="card-header text-center">
            <h4>Kelola Informasi Budaya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Poster</th>
                            <th>Nama Festival</th>
                            <th>Tanggal & Waktu</th>
                            <th>Lokasi</th>
                            <th>Semua Usia</th>
                            <th>Harga Tiket</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($budayas as $budaya)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $budaya->poster) }}" alt="poster" width="100"></td>
                            <td>{{ $budaya->nama_festival }}</td>
                            <td>{{ $budaya->tanggal_waktu }}</td>
                            <td>{{ $budaya->lokasi }}</td>
                            <td>{{ $budaya->batasan_usia }}</td>
                            <td>{{ $budaya->harga_tiket }}</td>
                            <td>
                                @if ($budaya->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($budaya->status == 'accepted')
                                    <span class="badge badge-success">Accepted</span>
                                @elseif ($budaya->status == 'declined')
                                    <span class="badge badge-danger">Declined</span>
                                @elseif ($budaya->status == 'waiting_validation')
                                    <span class="badge badge-info">Menunggu Validasi</span>
                                @endif
                            </td>
                            <td>
                                @if ($budaya->status == 'pending' || $budaya->status == 'declined')
                                    <form action="{{ route('admin.budaya.sendNotification', $budaya->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Kirim ke Admin e-Gov</button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.budaya.edit', $budaya->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.budaya.destroy', $budaya->id) }}" method="POST" style="display:inline;">
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
