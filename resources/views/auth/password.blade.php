@extends('layouts.app')

@section('title')
    Change Password
@endsection

@section('content')
    <div id="container" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header fw-bold">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session()->has('default'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('default') }}
                            </div>
                        @endif
                        <form method="POST" action="/password">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="current_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <div class="password-container">
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" required autocomplete="current-password"
                                            value="{{ session()->has('default') ? config('app.default_password') : old('current_password') }}">
                                        <span class="toggle-password"
                                            onclick="togglePasswordVisibility('current_password')">
                                            <img src="../../images/unsee.svg" alt=""
                                                style="width: auto; height: 20px;">
                                        </span>
                                    </div>

                                    @error('current_password')
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
                                            name="new_password" required autocomplete="new-password"
                                            value="{{ old('new_password') }}">
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

                            <div class="form-group row">
                                <label for="new_password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                <div class="col-md-6">
                                    <div class="password-container">
                                        <input id="new_password_confirmation" type="password" class="form-control"
                                            name="new_password_confirmation" required autocomplete="new-password"
                                            value="{{ old('new_password_confirmation') }}">
                                        <span class="toggle-password"
                                            onclick="togglePasswordVisibility('new_password_confirmation')">
                                            <img src="../../images/unsee.svg" alt=""
                                                style="width: auto; height: 20px;">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary fw-bold">
                                        {{ __('UPDATE') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script>
            var activeLink = document.getElementById('profile-svg');

            activeLink.classList.add('active-svg');
        </script>
    </div>
@endsection
