@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
  <div class="card bg-dark text-white" style="width: 40rem;">
    <div class="card-header text-center fs-3">Create Mahasiswa</div>
    <div class="card-body">
      <form action="{{ route('UpdateMahasiswa', $item->id) }}" method="POST">
          @method('PUT')
        @csrf
        <!-- Nama -->
        <div class="mb-3">
          <label for="inputName" class="form-label">Nama</label>
          <input type="text" name="name" id="inputName" class="form-control" value="{{ $item->name }}">
        </div>

        <!-- NIM -->
        <div class="mb-3">
          <label for="inputNim" class="form-label">NIM</label>
          <input type="text" name="NIM" id="inputNim" class="form-control" value="{{ $item->NIM }}">
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-3">
          <label for="inputTempat" class="form-label">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="inputTempat" class="form-control" value="{{ $item->tempat_lahir }}">
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
          <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="inputTanggal" class="form-control" value="{{ $item->tanggal_lahir }}">
        </div>

        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanSTI" value="Sistem Teknologi Informasi"
            @checked(old('jurusan', $item->jurusan) == 'Sistem Teknologi Informasi')>
            <label class="form-check-label" for="jurusanSTI">Sistem Teknologi Informasi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanBD" value="Bisnis Digital"
             @checked(old('jurusan', $item->jurusan) == 'Bisnis Digital')>
            <label class="form-check-label" for="jurusanBD">Bisnis Digital</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="jurusan" type="radio" name="jurusan" id="jurusanKWU" value="Kewirausahaan"
              @checked(old('jurusan', $item->jurusan) == 'Kewirausahaan')>
            <label class="form-check-label" for="jurusanKWU">Kewirausahaan</label>
          </div>
        </div>

        <!-- Angkatan -->
        <div class="mb-3">
          <label for="inputAngkatan" class="form-label">Angkatan</label>
          <input type="number" name="angkatan" id="inputAngkatan" class="form-control" value="{{ $item->angkatan }}">
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-warning me-2">Edit Data</button>
          <a href="{{ route('Main')}}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection