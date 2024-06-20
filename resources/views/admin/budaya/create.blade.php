<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create budaya</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Festival Budaya Baru</div>

                <div class="card-body">
                    <form action="{{ route('admin.budaya.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" value="pending"> <!-- Tambahkan hidden input untuk status -->
                        <div class="form-group">
                            <label for="poster">Poster:</label>
                            <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="nama_festival">Nama Festival:</label>
                            <input type="text" class="form-control" id="nama_festival" name="nama_festival" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_waktu">Tanggal & Waktu:</label>
                            <input type="datetime-local" class="form-control" id="tanggal_waktu" name="tanggal_waktu" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="batasan_usia">Batasan Usia:</label>
                            <input type="number" class="form-control" id="batasan_usia" name="batasan_usia">
                        </div>
                        <div class="form-group">
                            <label for="harga_tiket">Harga Tiket:</label>
                            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" step="0.01">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
