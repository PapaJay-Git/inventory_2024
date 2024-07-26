@extends('layouts.app')

@section('title')
    Create Kabataans Record
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE KABATAAN RECORD</span>
                        <a href="{{ route('kabataans.index') }}" class="btn btn-primary btn-sm fw-bold">
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

                        <form action="{{ route('kabataans.store') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this record?')">
                            @csrf
                            @method('POST')

                            {{-- ROW 1 --}}
                            <div class="row row-gap-3">

                                <h5 class="fw-bold">Personal Information</h5>
                                <!-- Personal Information -->
                                @foreach (config('app.kabataan_names') as $kabataan_name)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <label>{{ ucwords(str_replace('_', ' ', $kabataan_name)) }}<span
                                                class="text-danger fw-bold">*</span></label>
                                        <input id="{{ $kabataan_name }}" type="text"
                                            class="form-control mt-1 @error($kabataan_name) is-invalid @enderror"
                                            name="{{ $kabataan_name }}" value="{{ old($kabataan_name) }}">

                                        @error($kabataan_name)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach

                                {{-- Date of birth --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="date_of_birth">{{ __('Date of birth') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="date_of_birth" type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- gender --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="gender">{{ __('Gender') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <select id="gender" class="form-control @error('gender') is-invalid @enderror"
                                            name="gender" required>
                                            @foreach (config('app.sex') as $genderField)
                                                <option value="{{ $genderField }}"
                                                    {{ old('gender') == $genderField ? 'selected' : '' }}>
                                                    {{ $genderField }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- Age --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="age">{{ __('Age') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="age" type="number"
                                            class="form-control @error('age') is-invalid @enderror" name="age"
                                            value="{{ old('age') }}" required>
                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Religion --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="religion">{{ __('Religion') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="religion" type="text"
                                            class="form-control @error('religion') is-invalid @enderror" name="religion"
                                            value="{{ old('religion') }}" required>
                                        @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Position --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="position">{{ __('Position') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="position" type="text"
                                            class="form-control @error('position') is-invalid @enderror" name="position"
                                            value="{{ old('position') }}" required>
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- Mobile Phone --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="mobile_phone">{{ __('Mobile Phone') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="mobile_phone" type="text"
                                            class="form-control @error('mobile_phone') is-invalid @enderror"
                                            name="mobile_phone" value="{{ old('mobile_phone') }}" required>
                                        @error('mobile_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Barangay --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="barangay">{{ __('Barangay') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="barangay" type="text"
                                            class="form-control @error('barangay') is-invalid @enderror" name="barangay"
                                            value="{{ old('barangay') }}" required>
                                        @error('barangay')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- City/Municipality --}}
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="hone_address">{{ __('City/Municipality') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="city_municipality" type="text"
                                            class="form-control @error('city_municipality') is-invalid @enderror"
                                            name="city_municipality" value="{{ old('city_municipality') }}" required>
                                        @error('city_municipality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Home Address --}}
                                <div class="col-12">
                                    <label for="home_address">{{ __('Home Address') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <textarea name="home_address" id="home_address" class="form-control @error('home_address') is-invalid @enderror"
                                            required maxlength="255">{{ old('home_address') }}</textarea>
                                        @error('home_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <h5 class="fw-bold">Educational Attainment</h5>

                                <!-- kabataan_education_fields -->
                                @foreach (config('app.kabataan_education_fields') as $kabataan_education_fields)
                                    <div class="col-sm-9 col-md-8 col-lg-4">
                                        <label>{{ ucwords(str_replace('_', ' ', $kabataan_education_fields[0])) }}</label>
                                        <input id="{{ $kabataan_education_fields[0] }}" type="text"
                                            name="{{ $kabataan_education_fields[0] }}"
                                            value="{{ old($kabataan_education_fields[0]) }}"
                                            class="form-control mt-1 @error($kabataan_education_fields[0]) is-invalid @enderror">

                                        @error($kabataan_education_fields[0])
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 col-md-4 col-lg-2">
                                        <label>{{ ucwords(str_replace('_', ' ', $kabataan_education_fields[1])) }}</label>
                                        <input id="{{ $kabataan_education_fields[1] }}" type="number"
                                            name="{{ $kabataan_education_fields[1] }}"
                                            value="{{ old($kabataan_education_fields[1]) }}"
                                            class="form-control mt-1 @error($kabataan_education_fields[1]) is-invalid @enderror">

                                        @error($kabataan_education_fields[1])
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach


                                <h5 class="fw-bold">In case of Emergency, please notify:</h5>

                                <!-- kabataan_in_case_of_emergency -->
                                @foreach (config('app.kabataan_in_case_of_emergency') as $kabataan_in_case_of_emergency)
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label>{{ ucwords(str_replace('_', ' ', $kabataan_in_case_of_emergency)) }}</label>
                                        <input id="{{ $kabataan_in_case_of_emergency }}" type="text"
                                            name="{{ $kabataan_in_case_of_emergency }}"
                                            value="{{ old($kabataan_in_case_of_emergency) }}"
                                            class="form-control mt-1 @error($kabataan_in_case_of_emergency) is-invalid @enderror">

                                        @error($kabataan_in_case_of_emergency)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach



                                <!-- Submit Button -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                                        CREATE
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
        var activeLink = document.getElementById('forms-svg');
        activeLink.classList.add('active-svg');
    </script>
@endsection
