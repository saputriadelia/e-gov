@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin E-Government</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


@section('content')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header bg-danger text-white text-center">
            <h1><strong>Decline Notifikasi</strong></h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.egov.notifications.decline', $notification->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea name="message" id="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger" href="admin.egov.notification.index">Kirim</button>
            </form>
        </div>
    </div>
</div>

@if (session('error_message'))
<div class="alert alert-danger mt-3">
    {{ session('error_message') }}
</div>
@endif

@endsection

@section('scripts')
<x-nav-link :href="route('admin.egov.notifications.index')" :active="request()->routeIs('admin.egov.notifications.index')">
    {{ __('Notifikasi') }}
</x-nav-link>
@endsection