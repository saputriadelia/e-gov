@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard E-Gov</h1>
        <div class="row">
            <!-- Statistik atau informasi penting lainnya -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Statistik</div>
                    <div class="card-body">
                        <p>Jumlah notifikasi: {{ $notificationCount }}</p>
                        <!-- Tambahkan statistik lainnya di sini -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Tombol atau link ke berbagai sub-modul -->
            <div class="col-md-4">
                <a href="{{ route('admin.egov.notifications.index') }}" class="btn btn-primary btn-block">Kelola Informasi / Notifikasi</a>
            </div>
            <!-- Tambahkan tombol atau link ke sub-modul lainnya di sini -->
        </div>
    </div>
@endsection
