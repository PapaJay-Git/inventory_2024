@extends('layouts.app')

@section('title')
    Create Barangay Account
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE BARANGAY ACCOUNT</span>
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
                        @error('error')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <form action="/barangay-accounts" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this account?')">
                            @csrf
                            @method('POST')

                            <div class="form-group row my-2">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">

                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        required value="{{ old('username') }}">

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
                                        name="barangay_name" required value="{{ old('barangay_name') }}">

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
                                        name="psgc_barangay" required value="{{ old('psgc_barangay') }}">

                                    @error('psgc_barangay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="default_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Default Password') }}</label>

                                <div class="col-md-6">

                                    <input id="default_password" type="text"
                                        class="form-control @error('default_password') is-invalid @enderror"
                                        name="default_password" value="{{ config('app.default_password') }}" disabled>

                                    @error('default_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row my-2">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                                        {{ __('CREATE') }}
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
