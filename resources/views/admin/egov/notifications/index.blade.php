<!-- resources/views/admin/notifications/index.blade.php -->

@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin E-Government</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header bg-primary text-white text-center"><h1><strong>Notifikasi</strong></h1></div>
            
            <div class="card-body">

                <!-- Filter Kategori -->
                <div class="mb-3">
                    <a href="{{ route('admin.egov.notifications.index', 'budaya') }}" class="btn btn-outline-primary">Budaya</a>
                    <a href="{{ route('admin.egov.notifications.index', 'pendidikan') }}" class="btn btn-outline-primary">Pendidikan</a>
                    <a href="{{ route('admin.egov.notifications.index', 'ekonomi') }}" class="btn btn-outline-primary">Ekonomi</a>
                    <a href="{{ route('admin.egov.notifications.index') }}" class="btn btn-outline-secondary">Semua</a>
                </div>      
                
                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('admin.egov.notifications.index') }}" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Cari notifikasi..." value="{{ request()->input('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>
                        @if ($notification->status == 'pending')
                            <span class="badge badge-warning">{{ ucfirst($notification->status) }}</span>
                        @elseif ($notification->status == 'verified')
                            <span class="badge badge-success">{{ ucfirst($notification->status) }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($notification->status == 'pending')
                        <form action="{{ route('admin.egov.notifications.accept', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('admin.egov.notifications.declineForm', $notification->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                        @else
                        <span class="badge badge-{{ $notification->status == 'accepted' ? 'success' : 'danger' }}">
                            {{ ucfirst($notification->status) }}
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $notifications->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>  
</div>
    @endsection
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>