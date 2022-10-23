@extends('layouts.main2')

@section('isi')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="{{ url('updateobat', $obat->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Edit Form Data Obat</h4>
                                <p>Ini adalah Formulir untuk edit data obat di aplikasi ini.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nama Obat</label>
                                        <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat" required value="{{ $obat->nama_obat }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Dibuat Oleh</label>
                                        <input type="text" name="dibuat_oleh" class="form-control" placeholder="Dibuat oleh" readonly required value="{{ $obat->user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Tanggal Pembuatan</label>
                                        <input type="date" name="tgl_pembuatan" class="form-control" placeholder="Tanggal Pembuatan" required value="{{ $obat->tgl_pembuatan }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Tanggal Kadaluarsa</label>
                                        <input type="date" name="tgl_kadaluarsa" class="form-control" placeholder="Tanggal Kadaluarsa" required value="{{ $obat->tgl_kadaluarsa }}">
                                    </div>
                                </div>
                                <button class="w-100 btn btn-lg btn-info" type="submit">Ubah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
  </div>
</main>
@endsection
