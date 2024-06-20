<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ... -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>INFORMATION</h1>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary">All</button>
                        <button type="button" class="btn btn-secondary">Pendidikan</button>
                        <button type="button" class="btn btn-secondary">Ekonomi</button>
                        <button type="button" class="btn btn-secondary">Budaya</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path/to/image1.jpg" class="card-img-top" alt="Informasi Pendidikan">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Pendidikan</h5>
                            <p class="card-text">87% completed</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 87%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path/to/image2.jpg" class="card-img-top" alt="Informasi Ekonomi">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Ekonomi</h5>
                            <p class="card-text">87% completed</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 87%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path/to/image3.jpg" class="card-img-top" alt="Informasi Budaya">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Budaya</h5>
                            <p class="card-text">87% completed</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 87%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan lebih banyak kartu sesuai kebutuhan -->
            </div>
        </div>
    </div>
</x-app-layout>

<!-- ... -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
