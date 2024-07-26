@extends('layouts.app')

@section('title')
Create Kababaihans Record
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="mx-1 fw-bold">CREATE KABABAIHANS RECORD</span>
                    <a href="{{ route('kababaihans.index') }}" class="btn btn-primary btn-sm fw-bold">
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

                    <form action="{{ route('kababaihans.store') }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to create this record?')"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{-- ROW 1 --}}
                        <div class="row row-gap-3">
                            <!-- Application type -->
                            <div class="col-12 my-2">
                                <label for="image_paths" class="fw-bold">{{ __('Pictures of ID') }}
                                    <span class="text-danger fw-bold">*</span></label>
                                <div class="d-flex justify-content-start gap-2">
                                    <div class="card d-flex flex-row overflow-hidden" style="min-width: 5rem; height: 5rem"
                                        id="photo-container">

                                    </div>
                                    <div>
                                        <input type="file" multiple name="image_paths[]" id="image_paths"
                                            accept="image/*"
                                            class="form-control  @error('image_paths') is-invalid @enderror" required>
                                        @error('image_paths')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-6 col-lg-3">
                                <label>Date<span class="text-danger fw-bold">*</span></label>
                                <input id="date" type="date"
                                    class="form-control mt-1 @error('date') is-invalid @enderror" name="date"
                                    value="{{ old('date') }}" required>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @foreach (config('app.kababaihan_names') as $kababaihan_name)
                                <div class="col-6 col-md-6 col-lg-3">
                                    <label>{{ ucwords(str_replace('_', ' ', $kababaihan_name)) }}<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input id="{{ $kababaihan_name }}" type="text"
                                        class="form-control mt-1 @error($kababaihan_name) is-invalid @enderror"
                                        name="{{ $kababaihan_name }}" value="{{ old($kababaihan_name) }}">

                                    @error($kababaihan_name)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="col-12 col-md-6 col-lg-6">
                                <label>City Address<span class="text-danger fw-bold">*</span></label>
                                <input id="city_address" type="text"
                                    class="form-control mt-1 @error('city_address') is-invalid @enderror"
                                    name="city_address" value="{{ old('city_address') }}" required>

                                @error('city_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <label>Provincial Address<span class="text-danger fw-bold">*</span></label>
                                <input id="provincial_address" type="text"
                                    class="form-control mt-1 @error('provincial_address') is-invalid @enderror"
                                    name="provincial_address" value="{{ old('provincial_address') }}" required>

                                @error('provincial_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 col-lg-6">
                                <label>Birth Place<span class="text-danger fw-bold">*</span></label>
                                <input id="birth_place" type="text"
                                    class="form-control mt-1 @error('birth_place') is-invalid @enderror"
                                    name="birth_place" value="{{ old('birth_place') }}" required>

                                @error('birth_place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-6 col-md-3 col-lg-3">
                                <label>Date of Birth<span class="text-danger fw-bold">*</span></label>
                                <input id="date_of_birth" type="date"
                                    class="form-control mt-1 @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            {{-- Civil Status --}}
                            <div class="col-6 col-md-3 col-lg-3">
                                <label for="civil_status">{{ __('Civil Status') }}
                                    <span class="text-danger fw-bold">*</span></label>
                                <div>
                                    <select id="civil_status"
                                        class="form-control @error('civil_status') is-invalid @enderror"
                                        name="civil_status" required>
                                        @foreach (config('app.civil_status') as $civil_statusField)
                                            <option value="{{ $civil_statusField }}"
                                                {{ old('civil_status') == $civil_statusField ? 'selected' : '' }}>
                                                {{ $civil_statusField }}</option>
                                        @endforeach
                                    </select>
                                    @error('civil_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="citizenship">Citizenship <span class="text-danger fw-bold">*</span></label>
                                <div>
                                    <input id="citizenship" type="text"
                                        class="form-control @error('citizenship') is-invalid @enderror"
                                        name="citizenship" value="{{ old('citizenship') }}" required>
                                    @error('citizenship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="religion">Religion <span class="text-danger fw-bold">*</span></label>
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

                            <div class="col-md-4 col-lg-3">
                                <label for="mobile_number">Mobile Number <span
                                        class="text-danger fw-bold">*</span></label>
                                <div>
                                    <input id="mobile_number" type="text"
                                        class="form-control @error('mobile_number') is-invalid @enderror"
                                        name="mobile_number" value="{{ old('mobile_number') }}" required>
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Occupation -->
                            <div class="col-md-4 col-lg-3">
                                <label for="occupation">{{ __('Occupation') }}
                                    <span class="text-danger fw-bold">*</span></label>
                                <select id="occupation"
                                    class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                    required>
                                    @foreach (config('app.occupation') as $occupationField)
                                        <option value="{{ $occupationField }}"
                                            {{ old('occupation') == $occupationField ? 'selected' : '' }}>
                                            {{ $occupationField }}</option>
                                    @endforeach
                                </select>
                                @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="name_of_company">Name of company</label>
                                <div>
                                    <input id="name_of_company" type="text"
                                        class="form-control @error('name_of_company') is-invalid @enderror"
                                        name="name_of_company" value="{{ old('name_of_company') }}">
                                    @error('name_of_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="company_address">Company Address</label>
                                <div>
                                    <input id="company_address" type="text"
                                        class="form-control @error('company_address') is-invalid @enderror"
                                        name="company_address" value="{{ old('company_address') }}">
                                    @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Educational Attainment -->
                            <div class="col-md-4 col-lg-3">
                                <label for="educational_attainment">{{ __('Educational Attainment') }}
                                    <span class="text-danger fw-bold">*</span></label>
                                <select id="educational_attainment"
                                    class="form-control @error('educational_attainment') is-invalid @enderror"
                                    name="educational_attainment" required>
                                    @foreach (config('app.educational_attainment') as $educational_attainmentField)
                                        <option value="{{ $educational_attainmentField }}"
                                            {{ old('educational_attainment') == $educational_attainmentField ? 'selected' : '' }}>
                                            {{ $educational_attainmentField }}</option>
                                    @endforeach
                                </select>
                                @error('educational_attainment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="spouse_name">Name of Spouse</label>
                                <div>
                                    <input id="spouse_name" type="text"
                                        class="form-control @error('spouse_name') is-invalid @enderror"
                                        name="spouse_name" value="{{ old('spouse_name') }}">
                                    @error('spouse_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Spouce Occupation -->
                            <div class="col-md-4 col-lg-3">
                                <label for="spouse_occupation">{{ __('Spouce Occupation') }}
                                    <span class="text-danger fw-bold">*</span></label>
                                <select id="spouse_occupation"
                                    class="form-control @error('spouse_occupation') is-invalid @enderror"
                                    name="spouse_occupation" required>
                                    @foreach (config('app.occupation') as $spouse_occupationField)
                                        <option value="{{ $spouse_occupationField }}"
                                            {{ old('spouse_occupation') == $spouse_occupationField ? 'selected' : '' }}>
                                            {{ $spouse_occupationField }}</option>
                                    @endforeach
                                </select>
                                @error('spouse_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="number_of_children">Number of Children</label>
                                <div>
                                    <input id="number_of_children" type="number"
                                        class="form-control @error('number_of_children') is-invalid @enderror"
                                        name="number_of_children" value="{{ old('number_of_children') }}" required>
                                    @error('number_of_children')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <label for="other_organizations_membership">Other organization's membership</label>
                                <div>
                                    <input id="other_organizations_membership" type="text"
                                        class="form-control @error('other_organizations_membership') is-invalid @enderror"
                                        name="other_organizations_membership"
                                        value="{{ old('other_organizations_membership') }}">
                                    @error('other_organizations_membership')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label for="emergency_contact_name">Emegency Contact Name</label>
                                <div>
                                    <input id="emergency_contact_name" type="text"
                                        class="form-control @error('emergency_contact_name') is-invalid @enderror"
                                        name="emergency_contact_name" value="{{ old('emergency_contact_name') }}"
                                        required>
                                    @error('emergency_contact_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="emergency_contact_number">Emegency Contact Number</label>
                                <div>
                                    <input id="emergency_contact_number" type="text"
                                        class="form-control @error('emergency_contact_number') is-invalid @enderror"
                                        name="emergency_contact_number" value="{{ old('emergency_contact_number') }}"
                                        required>
                                    @error('emergency_contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image_paths');
        const photoContainer = document.getElementById('photo-container');

        // Function to update the image preview
        const updateImagePreview = () => {
            const files = fileInput.files;

            // Clear existing images
            photoContainer.innerHTML = '';

            // Iterate through each selected file
            Array.from(files).forEach(file => {
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imageElement = `
                        <img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover;" alt="PWD Photo Preview">
                    `;
                        photoContainer.insertAdjacentHTML('beforeend', imageElement);
                    };
                    reader.readAsDataURL(file);
                }
            });
        };

        // Attach change event listener to the file input
        fileInput.addEventListener('change', updateImagePreview);

        // Optional: Update the image preview on page load if a file is already selected
        if (fileInput.files.length > 0) {
            updateImagePreview();
        }
    });
</script>
@endsection
