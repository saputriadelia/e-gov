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
            <a href="{{ route('admin.ekonomi.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Nama Pangan</th>
                        <th>Harga</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ekonomis as $ekonomi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $ekonomi->gambar) }}" alt="gambar" width="100"></td>
                        <td>{{ $ekonomi->kategori }}</td>
                        <td>{{ $ekonomi->nama_pangan }}</td>
                        <td>{{ $ekonomi->harga }}</td>
                        <td>{{ $ekonomi->tanggal_masuk }}</td>
                        <td>
                            @if ($ekonomi->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($ekonomi->status == 'accepted')
                                    <span class="badge badge-success">Accepted</span>
                                @elseif ($ekonomi->status == 'declined')
                                    <span class="badge badge-danger">Declined</span>
                                @elseif ($ekonomi->status == 'waiting_validation')
                                    <span class="badge badge-info">Menunggu Validasi</span>
                                @endif
                            </td>
                            <td>
                                @if ($ekonomi->status == 'pending' || $ekonomi->status == 'declined')
                                    <form action="{{ route('admin.ekonomi.sendNotification', $ekonomi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Kirim ke Admin e-Gov</button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.ekonomi.edit', $ekonomi->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.ekonomi.destroy', $ekonomi->id) }}" method="POST" style="display:inline;">
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