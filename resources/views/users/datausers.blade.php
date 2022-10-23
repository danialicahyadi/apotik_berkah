@extends('layouts.main2')

@section('isi')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
  </div>
  @if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('delete') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <h2 class="text-center">Data Users</h2>
  <a class="btn btn-primary" href="/tambahusers" role="button">Tambah Users</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID Users</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Dibuat Tanggal</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      @forelse ($user as $row )
      <tbody>
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->username }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->created_at->diffForHumans() }}</td>
          <td>
            <form action="{{ url('deleteuser', $row->id) }}" method="POST">
              @csrf
              <button class="btn btn-danger" href="{{ url('/delete', $row->id) }}">
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

