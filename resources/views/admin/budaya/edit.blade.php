@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6>Edit Festival Budaya</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.budaya.update', $budaya->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="poster">Poster</label>
                    <input type="file" name="poster" id="poster" class="form-control">
                    @if($budaya->poster)
                        <img src="{{ asset('storage/' . $budaya->poster) }}" alt="{{ $budaya->nama_festival }}" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="nama_festival">Nama Festival</label>
                    <input type="text" name="nama_festival" id="nama_festival" class="form-control" value="{{ $budaya->nama_festival }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_waktu">Tanggal & Waktu</label>
                    <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="form-control" value="{{ $budaya->tanggal_waktu }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $budaya->lokasi }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="batasan_usia">Semua Usia</label>
                    <input type="text" name="batasan_usia" id="batasan_usia" class="form-control" value="{{ $budaya->batasan_usia }}" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="harga_tiket">Harga Tiket</label>
                    <input type="number" name="harga_tiket" id="harga_tiket" class="form-control" value="{{ $budaya->harga_tiket }}" required>
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
    <title>Kelola Budaya</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
</body>
</html>
