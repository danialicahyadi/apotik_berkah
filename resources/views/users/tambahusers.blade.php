@extends('layouts.main2')

@section('isi')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-registration">
      <form action="/storeuser" method="POST">
        @csrf
          <h1 class="h3 mb-3 mt-3 fw-normal text-center">Register User</h1>
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name')
              is-invalid
            @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username')
            is-invalid
          @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email')
            is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password')
            is-invalid
          @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-dark mt-3" type="submit">Register User</button>   
        </form>
    </main>
  </div>
</div>
@endsection