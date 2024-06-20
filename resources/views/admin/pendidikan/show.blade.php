@extends('layouts.app')

@section('title', 'Detail Pendidikan')

@section('contents')
    <h1 class="mb-0">Detail Pendidikan</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ $Pendidikan->judul }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tahun</label>
            <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{ $Pendidikan->tahun }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Klasifikasi</label>
            <input type="text" name="klasifikasi" class="form-control" placeholder="Klasifikasi" value="{{ $Pendidikan->klasifikasi }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Siswa SD</label>
            <input type="text" name="jumlah_siswa_sd" class="form-control" placeholder="Jumlah Siswa SD" value="{{ $Pendidikan->jumlah_siswa_sd }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah Siswa SMP</label>
            <input type="text" name="jumlah_siswa_smp" class="form-control" placeholder="Jumlah Siswa SMP" value="{{ $Pendidikan->jumlah_siswa_smp }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Siswa SMA</label>
            <input type="text" name="jumlah_siswa_sma" class="form-control" placeholder="Jumlah Siswa SMA" value="{{ $Pendidikan->jumlah_siswa_sma }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah Sekolah SD</label>
            <input type="text" name="jumlah_sekolah_sd" class="form-control" placeholder="Jumlah Sekolah SD" value="{{ $Pendidikan->jumlah_sekolah_sd }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Sekolah SMP</label>
            <input type="text" name="jumlah_sekolah_smp" class="form-control" placeholder="Jumlah Sekolah SMP" value="{{ $Pendidikan->jumlah_sekolah_smp }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah Sekolah SMA</label>
            <input type="text" name="jumlah_sekolah_sma" class="form-control" placeholder="Jumlah Sekolah SMA" value="{{ $Pendidikan->jumlah_sekolah_sma }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Guru SD</label>
            <input type="text" name="jumlah_guru_sd" class="form-control" placeholder="Jumlah Guru SD" value="{{ $Pendidikan->jumlah_guru_sd }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jumlah Guru SMP</label>
            <input type="text" name="jumlah_guru_smp" class="form-control" placeholder="Jumlah Guru SMP" value="{{ $Pendidikan->jumlah_guru_smp }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Guru SMA</label>
            <input type="text" name="jumlah_guru_sma" class="form-control" placeholder="Jumlah Guru SMA" value="{{ $Pendidikan->jumlah_guru_sma }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Siswa</label>
            <input type="text" name="total_siswa" class="form-control" placeholder="Total Siswa" value="{{ $Pendidikan->total_siswa }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Total Sekolah</label>
            <input type="text" name="total_sekolah" class="form-control" placeholder="Total Sekolah" value="{{ $Pendidikan->total_sekolah }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Guru</label>
            <input type="text" name="total_guru" class="form-control" placeholder="Total Guru" value="{{ $Pendidikan->total_guru }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Dibuat Pada</label>
            <input type="text" name="created_at" class="form-control" placeholder="Dibuat Pada" value="{{ $Pendidikan->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Diperbarui Pada</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Diperbarui Pada" value="{{ $Pendidikan->updated_at }}" readonly>
        </div>
    </div>
    <a href="{{ route('Pendidikan.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
    <a href="{{ route('Pendidikan.edit', $Pendidikan->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('Pendidikan.destroy', $Pendidikan->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
@endsection
