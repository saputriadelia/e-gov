@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6>Edit Data Ekonomi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ekonomi.update', $ekonomi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    @if($ekonomi->gambar)
                        <img src="{{ asset('storage/' . $ekonomi->gambar) }}" alt="gambar" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="nabati" {{ $ekonomi->kategori == 'nabati' ? 'selected' : '' }}>Nabati</option>
                        <option value="hewani" {{ $ekonomi->kategori == 'hewani' ? 'selected' : '' }}>Hewani</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="nama_pangan">Nama Pangan</label>
                    <input type="text" name="nama_pangan" id="nama_pangan" class="form-control" value="{{ $ekonomi->nama_pangan }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $ekonomi->harga }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ $ekonomi->tanggal_masuk }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Ekonomi</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
</body>
</html>
