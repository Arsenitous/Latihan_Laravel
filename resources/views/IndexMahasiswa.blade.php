@extends('layouts.master')

@section('konten')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="container mt-4">

        {{-- <a href="{{ route('mahasiswa.create-form') }}" class="btn btn-success mb-3">
            ADD Mahasiswa
        </a> --}}
         <a href="/add" class="btn btn-success mb-3">
            ADD Mahasiswa
        </a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->id }}</td>
                        <td>{{ $mhs->NIM }}</td>
                        <td>{{ $mhs->name }}</td>
                        <td>{{ $mhs->tempat_lahir }}</td>
                        <td>{{ $mhs->tanggal_lahir }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->angkatan }}</td>
                        <td>
                        <a href="/mahasiswa/ {{$mhs->id}}" class="btn btn-primary me-2">EDIT</a>
                        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#hapus{{ $mhs->id}}">Hapus</button>
                        </td>
                    </tr>
                  
                @endforeach
            </tbody>
        </table>
        
@foreach ($mahasiswa as $item)
<div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/mahasiswa/{{ $item->id }}" method="POST" class="modal-content">
      @csrf
      @method('delete')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah yakin ingin menghapus data mahasiswa <b>{{ $item->name }}</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
      </div>
    </form>
  </div>
</div>
@endforeach

        
    </div>
@endsection