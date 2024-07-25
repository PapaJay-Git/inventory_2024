@extends('layouts.app')

@section('title')
    Edit Barangay Account
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">EDIT BARANGAY ACCOUNT</span>
                        <a href="/barangay-accounts" class="btn btn-primary btn-sm fw-bold">
                            BACK
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/barangay-accounts/{{ $barangay->id }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to update this account?')">
                            @csrf
                            @method('PUT')

                            <div class="form-group row my-2">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">

                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        required value="{{ old('username') ?? $barangay->username }}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="barangay_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Barangay Name') }}</label>

                                <div class="col-md-6">

                                    <input id="barangay_name" type="text"
                                        class="form-control @error('barangay_name') is-invalid @enderror"
                                        name="barangay_name" required value="{{ old('barangay_name') ?? $barangay->name }}">

                                    @error('barangay_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="psgc_barangay"
                                    class="col-md-4 col-form-label text-md-right">{{ __('PSGC Barangay') }}</label>

                                <div class="col-md-6">

                                    <input id="psgc_barangay" type="text"
                                        class="form-control @error('psgc_barangay') is-invalid @enderror"
                                        name="psgc_barangay" required
                                        value="{{ old('psgc_barangay') ?? $barangay->psgc_barangay }}">

                                    @error('psgc_barangay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="new_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <div class="password-container">
                                        <input id="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" value="{{ old('new_password') }}">
                                        <span class="toggle-password" onclick="togglePasswordVisibility('new_password')">
                                            <img src="../../images/unsee.svg" alt=""
                                                style="width: auto; height: 20px;">
                                        </span>
                                    </div>


                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="new_password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                <div class="col-md-6">
                                    <div class="password-container">
                                        <input id="new_password_confirmation" type="password"
                                            class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                            name="new_password_confirmation"
                                            value="{{ old('new_password_confirmation') }}">
                                        <span class="toggle-password"
                                            onclick="togglePasswordVisibility('new_password_confirmation')">
                                            <img src="../../images/unsee.svg" alt=""
                                                style="width: auto; height: 20px;">
                                        </span>
                                    </div>

                                    @error('new_password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row my-2">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                                        {{ __('UPDATE') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var activeLink = document.getElementById('barangay-svg');

        activeLink.classList.add('active-svg');
    </script>
@endsection
