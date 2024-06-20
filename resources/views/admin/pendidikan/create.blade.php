@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola pendidikan</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="admin-assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="admin-assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0 text-center">{{ __('Tambah Data Pendidikan') }}</h6>
                    </div>
                    <hr />
                    <div class="card-body">
                        <form action="{{ route('admin.pendidikan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold" for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="tahun">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" required min="1900" max="{{ date('Y') }}">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="klasifikasi">Klasifikasi</label>
                                <select name="klasifikasi" id="klasifikasi" class="form-control" required onchange="toggleFields()">
                                    <option value="">Pilih Klasifikasi</option>
                                    <option value="siswa dan guru">Siswa dan Guru</option>
                                    <option value="sekolah">Sekolah</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                </select>
                            </div>
                            <div id="siswa-fields" style="display: none;">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_siswa_sd">Jumlah Siswa SD</label>
                                    <input type="number" name="jumlah_siswa_sd" id="jumlah_siswa_sd" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_siswa_smp">Jumlah Siswa SMP</label>
                                    <input type="number" name="jumlah_siswa_smp" id="jumlah_siswa_smp" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_siswa_sma">Jumlah Siswa SMA</label>
                                    <input type="number" name="jumlah_siswa_sma" id="jumlah_siswa_sma" class="form-control" min="0" value="0">
                                </div>
                            </div>
                            <div id="sekolah-fields" style="display: none;">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_sekolah_sd">Jumlah Sekolah SD</label>
                                    <input type="number" name="jumlah_sekolah_sd" id="jumlah_sekolah_sd" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_sekolah_smp">Jumlah Sekolah SMP</label>
                                    <input type="number" name="jumlah_sekolah_smp" id="jumlah_sekolah_smp" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_sekolah_sma">Jumlah Sekolah SMA</label>
                                    <input type="number" name="jumlah_sekolah_sma" id="jumlah_sekolah_sma" class="form-control" min="0" value="0">
                                </div>
                            </div>
                            <div id="guru-fields" style="display: none;">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_guru_sd">Jumlah Guru SD</label>
                                    <input type="number" name="jumlah_guru_sd" id="jumlah_guru_sd" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_guru_smp">Jumlah Guru SMP</label>
                                    <input type="number" name="jumlah_guru_smp" id="jumlah_guru_smp" class="form-control" min="0" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="jumlah_guru_sma">Jumlah Guru SMA</label>
                                    <input type="number" name="jumlah_guru_sma" id="jumlah_guru_sma" class="form-control" min="0" value="0">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleFields() {
            var klasifikasi = document.getElementById('klasifikasi').value;
            var siswaFields = document.getElementById('siswa-fields');
            var sekolahFields = document.getElementById('sekolah-fields');
            var guruFields = document.getElementById('guru-fields');

            siswaFields.style.display = 'none';
            sekolahFields.style.display = 'none';
            guruFields.style.display = 'none';

            if (klasifikasi === 'siswa dan guru') {
                siswaFields.style.display = 'block';
                guruFields.style.display = 'block';
            } else if (klasifikasi === 'siswa') {
                siswaFields.style.display = 'block';
            } else if (klasifikasi === 'sekolah') {
                sekolahFields.style.display = 'block';
            } else if (klasifikasi === 'guru') {
                guruFields.style.display = 'block';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>
@endsection
