@extends('layouts.master')

@section('konten')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
  <div class="card bg-dark text-white" style="width: 40rem;">
    <div class="card-header text-center fs-3">Create Mata Kuliah</div>
    <div class="card-body">
      <form action="{{ route('StoreMatakuliah') }}" method="POST">
        @csrf
        <!-- Kode MK -->
        <div class="mb-3">
          <label for="inputkode" class="form-label">Kode Matakuliah</label>
          <input type="text" name="kode_MK" id="inputkode" class="form-control" value="{{ old('kode_MK') }}">
          @error('kode_MK')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <!-- Nama Matakuliah -->
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama Matakuliah</label>
          <input type="text" name="nama_Matakuliah" id="inputNama" class="form-control" value="{{ old('nama_Matakuliah') }}">
          @error('nama_Matakuliah')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <!-- Nama Dosen -->
        <div class="mb-3">
          <label class="form-label">Nama Dosen</label>
          <select class="form-select" name="id_Dosen">
            @foreach($dosens as $dosen)
              <option value="{{ $dosen->id_Dosen }}" {{ old('id_Dosen') == $dosen->id_Dosen ? 'selected' : '' }}>
                {{ $dosen->id_Dosen }} - {{ $dosen->name }}
              </option>
            @endforeach
          </select>
          @error('id_Dosen')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <!-- SKS -->
        <div class="mb-3">
          <label class="form-label">SKS</label>
          <input type="text" name="sks" class="form-control" value="{{ old('sks') }}">
          @error('sks')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <!-- Jurusan -->
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanSTI" value="Sistem Teknologi Informasi" {{ old('jurusan') == 'Sistem Teknologi Informasi' ? 'checked' : '' }}>
            <label class="form-check-label" for="jurusanSTI">Sistem Teknologi Informasi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanBD" value="Bisnis Digital" {{ old('jurusan') == 'Bisnis Digital' ? 'checked' : '' }}>
            <label class="form-check-label" for="jurusanBD">Bisnis Digital</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jurusan" id="jurusanKWU" value="Kewirausahaan" {{ old('jurusan') == 'Kewirausahaan' ? 'checked' : '' }}>
            <label class="form-check-label" for="jurusanKWU">Kewirausahaan</label>
          </div>
          @error('jurusan')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>


        <!-- Tombol -->
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success me-2">Tambah Data</button>
          <a href="{{ route('Main2')}}" class="btn btn-secondary text-white">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection