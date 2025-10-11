@extends('layouts.master')

@section('konten')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
 <div class="container mt-4">

         <a href="/add_mk" class="btn btn-success mb-3">
            ADD Matakuliah
        </a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode MK</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Jumlah SKS</th>
                     <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($matakuliah as $mk)
                    <tr>
                        <td>{{ $mk->id_MK }}</td>
                        <td>{{ $mk->kode_MK }}</td>
                        <td>{{ $mk->nama_Matakuliah }}</td>
                           <td>{{ $mk->dosen->name }}</td>
                        <td>{{ $mk->jurusan }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>
                        <a href="/matakuliah/ {{$mk->id_MK}}" class="btn btn-primary me-2">EDIT</a>
                        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#hapus{{ $mk->id_MK}}">Hapus</button>
                        </td>
                    </tr>
                  
                @endforeach
            </tbody>
        </table>

   @foreach ($matakuliah as $item)
<div class="modal fade" id="hapus{{ $item->id_MK }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/matakuliah/{{ $item->id_MK }}" method="POST" class="modal-content">
      @csrf
      @method('delete')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah yakin ingin menghapus data matakuliah <b>{{ $item->nama_Matakuliah }}</b>?
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