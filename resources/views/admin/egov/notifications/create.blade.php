@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kirim Notifikasi</h1>
    <form action="{{ route('admin.budaya.sendNotification') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Pesan Notifikasi:</label>
            <input type="text" class="form-control" id="message" name="message" required>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
