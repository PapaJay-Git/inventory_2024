@extends('layouts.app')

@section('title')
    Login
@endsection
@section('content')
    <div class="container shadow-background bg-inner-card-primary border-r-15px transition-all">
        <div class="row py-5">
            <div
                class="col-12 col-md-5 col-lg-6 col-xl-7 d-lg-flex flex-column justify-content-center align-items-center d-none py-5">
                <a href="/login" class="text-center text-nowrap">
                    <img src="{{ asset('logos/para_sa_bayan.png') }}" class="w-25 h-auto rounded">
                    <img src="{{ asset('logos/municipality.jpg') }}" class="w-50 h-auto mb-5">
                    <img src="{{ asset('logos/dswd.png') }}" class="w-25 h-auto">
                </a>
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-5 p-1 p-sm-2 p-md-5">
                <div class="shadow border-r-8px">

                    <div class="card-body bg-white p-4 border-r-8px">
                        <div class="d-flex flex-column justify-content-center align-items-center ">
                            <a href="/login" class="text-center text-nowrap d-lg-none">
                                <img src="{{ asset('logos/para_sa_bayan.png') }}" class="w-25 h-auto">
                                <img src="{{ asset('logos/municipality.jpg') }}" class="w-50 h-auto mb-5">
                                <img src="{{ asset('logos/dswd.png') }}" class="w-25 h-auto">
                            </a>

                            <div class="text-dark fw-bold bebas-font" style="font-size: 55px">WELCOME</div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="username" type="text"
                                        class="form-control p-3
                                    @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" autocomplete="username" autofocus
                                        placeholder="Username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <div class="password-container">
                                        <input id="password" type="password"
                                            class="form-control p-3 @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                                            <img src="../../images/unsee.svg" alt=""
                                                style="width: auto; height: 20px;">
                                        </span>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary fw-bold w-100 btn-lg">
                                        {{ __('LOG IN') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-3 d-none">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label fw-bold" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
