@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card p-3 px-5">
        <div class="row ">
            <div class="col-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="font-weight-normal text-center">Masuk</h3>
                    <div class="form-group py-2">
                        <input id="email" type="email" class="loginregister @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" [autofocus] placeholder="Nama pengguna">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group py-2">
                        <input id="password" type="password" class="loginregister @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            <p class="text-muted d-flex flex-md-row-reverse">
                            {{ __('Forgot Your Password?') }}
                            </p>
                        </a>
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <p class="text-center">-Atau-</p>
                    

                </form>
                <div class="form-group ">
                    <a href="{{ route('register') }}" class="text-decoration-none">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Register') }}
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <p class=" align-self-center">Atau</p>
            </div>
            <div class="col-md-4 text-uppercase">
                <h3 class="font-weight-normal text-center mb-5">Masuk Dengan Sosial Media mu</h3>
                <a href="#" class="btn btn-primary btn-block mt-5 py-2">Masuk Dengan Facebook</a>
                <a href="#" class="btn btn-outline-primary btn-block mt-5 py-2">Masuk Dengan Google</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 text-center py-3">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </div>
        </div>
        <div class="row py-4">
            <div class="col">Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div class="col">Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div class="col">Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
        <div class="row justify-content-center py-5">
            <div class="col-sm-8 text-center">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
@endsection
