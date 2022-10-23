@extends('layouts.main2')

@section('isi')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
  </div>
  @if(session()->has('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('berhasil') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('delete') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <h2 class="text-center">Data Obat</h2>
  <a class="btn btn-success" href="/tambahobat">
    <span data-feather="plus"></span> Tambah Data
  </a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID Obat</th>
          <th scope="col">Nama Obat</th>
          <th scope="col">Tanggal Dibuat</th>
          <th scope="col">Tanggal Kadaluarsa</th>
          <th scope="col">Dibuat Oleh</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      @forelse ($obat as $row)
      <tbody>
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->nama_obat }}</td>
          <td>{{ $row->tgl_pembuatan }}</td>
          <td>{{ $row->tgl_kadaluarsa }}</td>
          <td>{{ $row->user->name }}</td>
          <td>
            <form action="{{ url('delete', $row->id) }}" method="POST">
              @csrf
              <a class="btn btn-info" href="{{ url('editobat', $row->id) }}">
                <span data-feather="edit" class="align-text-bottom"></span>
              </a>
              <button class="btn btn-danger">
                <span data-feather="trash" class="align-text-bottom"></span>
              </button>
            </form>
          </td>
        </tr>
      </tbody>
      @empty
        
      @endforelse
      
    </table>
  </div>
</main>
@endsection
