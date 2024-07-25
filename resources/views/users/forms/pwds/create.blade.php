@extends('layouts.app')

@section('title')
    Create Person with Disability (Pwd) Record
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE PWD RECORD</span>
                        <a href="{{ route('pwds.index') }}" class="btn btn-primary btn-sm fw-bold">
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

                        <form action="{{ route('pwds.store') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this record?')"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            {{-- ROW 1 --}}
                            <div class="row row-gap-3">
                                <!-- Application type -->
                                <div class="col-12 my-2">
                                    <label for="pwd_photo" class="fw-bold">{{ __('PWD Photo') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="d-flex justify-content-start gap-2">
                                        <div class="card" style="width: 5rem; height: 5rem" id="photo-container">

                                        </div>
                                        <div>
                                            <input type="file" name="pwd_photo" id="pwd_photo" accept="image/*"
                                                class="form-control  @error('pwd_photo') is-invalid @enderror" required>
                                            @error('pwd_photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-2 my-2">
                                    <label for="application_type">{{ __('1. Application type') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <select id="application_type"
                                            class="form-control @error('application_type') is-invalid @enderror"
                                            name="application_type" required>
                                            @foreach (config('app.application_type') as $application_typeField)
                                                <option value="{{ $application_typeField }}"
                                                    {{ old('application_type') == $application_typeField ? 'selected' : '' }}>
                                                    {{ $application_typeField }}</option>
                                            @endforeach
                                        </select>
                                        @error('application_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Persons with disability number -->
                                <div class="col-md-6 col-lg-3 my-2">
                                    <label for="disability_number"
                                        class="text-nowrap">{{ __('2. Persons with disability number') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="disability_number" type="text"
                                            class="form-control @error('disability_number') is-invalid @enderror"
                                            name="disability_number" value="{{ old('disability_number') }}" required>
                                        @error('disability_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-2 my-2">
                                    <label for="date_applied">{{ __('3. Date applied') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="date_applied" type="date"
                                            class="form-control @error('date_applied') is-invalid @enderror"
                                            name="date_applied" value="{{ old('date_applied') }}" required>
                                        @error('date_applied')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Personal Information -->
                                <div class="col-md-7 col-lg-5 my-2">
                                    <label>{{ __('4. Personal Information') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="d-sm-flex justify-content-between">
                                        @foreach (config('app.personal_information') as $facilityField)
                                            <div>
                                                <input id="{{ $facilityField }}" type="text"
                                                    class="form-control mt-1 @error($facilityField) is-invalid @enderror"
                                                    name="{{ $facilityField }}" value="{{ old($facilityField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $facilityField)) }}">

                                                @error($facilityField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Date of birth --}}
                                <div class="col-6 col-md-4 col-lg-2 my-2">
                                    <label for="date_of_birth">{{ __('5. Date of birth') }} <span
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

                                {{-- Sex --}}
                                <div class="col-6 col-md-4 col-lg-2 my-2">
                                    <label for="sex">{{ __('6. Sex') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <select id="sex" class="form-control @error('sex') is-invalid @enderror"
                                            name="sex" required>
                                            @foreach (config('app.sex') as $sexField)
                                                <option value="{{ $sexField }}"
                                                    {{ old('sex') == $sexField ? 'selected' : '' }}>{{ $sexField }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Civil Status --}}
                                <div class="col-12 col-md-4 col-lg-2 my-2">
                                    <label for="civil_status">{{ __('7. Civil Status') }}
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

                                {{-- Type of Disabilities --}}
                                <div class="col-md-6 col-lg-6 my-2">
                                    <label for="type_of_disabilities">
                                        {{ __('8. Type of Disabilities') }} <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <div>
                                        <select id="type_of_disabilities"
                                            class="form-control @error('type_of_disabilities') is-invalid @enderror"
                                            name="type_of_disabilities[]" multiple required>
                                            @foreach (config('app.type_of_disabilities') as $type_of_disabilityField)
                                                <option value="{{ $type_of_disabilityField }}"
                                                    {{ in_array($type_of_disabilityField, old('type_of_disabilities', [])) ? 'selected' : '' }}>
                                                    {{ $type_of_disabilityField }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('type_of_disabilities')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Cause of disability --}}
                                <div class="col-md-6 col-lg-4 my-2">
                                    <div>
                                        <div>
                                            <label for="cause_of_disability"
                                                class="text-nowrap">{{ __('9. Cause of disability') }}
                                                <span class="text-danger fw-bold">*</span></label>
                                            <select id="cause_of_disability"
                                                class="form-control mt-1 @error('cause_of_disability') is-invalid @enderror"
                                                name="cause_of_disability" required>
                                                @foreach (config('app.cause_of_disability') as $cause_of_disabilityField)
                                                    <option value="{{ $cause_of_disabilityField }}"
                                                        {{ old('cause_of_disability') == $cause_of_disabilityField ? 'selected' : '' }}>
                                                        {{ $cause_of_disabilityField }}</option>
                                                @endforeach
                                            </select>
                                            @error('cause_of_disability')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="cause_of_disability_others"
                                                class="text-nowrap">{{ __('Others (Explain/specify)') }}</label>
                                            <div>
                                                <input id="cause_of_disability_others" type="text"
                                                    class="form-control mt-1 @error('cause_of_disability_others') is-invalid @enderror"
                                                    name="cause_of_disability_others"
                                                    value="{{ old('cause_of_disability_others') }}">
                                                @error('cause_of_disability_others')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Residence address -->
                                <div class="col-md-6 col-lg-8 my-2">
                                    <label>{{ __('10. Residence address') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        @foreach (config('app.residence_address') as $residence_addressField)
                                            <div class="col-12 col-md-6 col-lg-4 gap-2">
                                                <input id="{{ $residence_addressField }}" type="text"
                                                    name="{{ $residence_addressField }}"
                                                    value="{{ old($residence_addressField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $residence_addressField)) }}"
                                                    class="form-control mt-1 @error($residence_addressField) is-invalid @enderror"
                                                    required>

                                                @error($residence_addressField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- contact details -->
                                <div class="col-md-6 col-lg-8 my-2">
                                    <label>{{ __('11. Contact details') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        @foreach (config('app.contail_details') as $contail_detailsField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $contail_detailsField }}"
                                                    type="{{ $contail_detailsField == 'email_address' ? 'email' : 'text' }}"
                                                    name="{{ $contail_detailsField }}"
                                                    value="{{ old($contail_detailsField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $contail_detailsField)) }}"
                                                    class="form-control mt-1 @error($contail_detailsField) is-invalid @enderror">

                                                @error($contail_detailsField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Educational Attainment -->
                                <div class="col-12 col-md-3 col-lg-4 my-2">
                                    <label for="educational_attainment">{{ __('12. Educational Attainment') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="d-flex justify-content-between gap-1">
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
                                </div>

                                <!-- Status of employment -->
                                <div class="col-md-9 col-lg-6 my-2">
                                    <label>{{ __('13. Employment') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="status_of_employment"
                                                class="text-nowrap">{{ __('Status of employment') }}
                                                <span class="text-danger fw-bold">*</span></label>

                                            <select id="status_of_employment"
                                                class="form-control @error('status_of_employment') is-invalid @enderror"
                                                name="status_of_employment" required>
                                                @foreach (config('app.status_of_employment') as $status_of_employmentField)
                                                    <option value="{{ $status_of_employmentField }}"
                                                        {{ old('status_of_employment') == $status_of_employmentField ? 'selected' : '' }}>
                                                        {{ $status_of_employmentField }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_of_employment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="category_of_employment"
                                                class="text-nowrap">{{ __('Category of employment') }}
                                                <span class="text-danger fw-bold">*</span></label>

                                            <select id="category_of_employment"
                                                class="form-control @error('category_of_employment') is-invalid @enderror"
                                                name="category_of_employment" required>
                                                @foreach (config('app.category_of_employment') as $category_of_employmentField)
                                                    <option value="{{ $category_of_employmentField }}"
                                                        {{ old('category_of_employment') == $category_of_employmentField ? 'selected' : '' }}>
                                                        {{ $category_of_employmentField }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_of_employment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="types_of_employment"
                                                class="text-nowrap">{{ __('Types of employment') }}
                                                <span class="text-danger fw-bold">*</span></label>

                                            <select id="types_of_employment"
                                                class="form-control @error('types_of_employment') is-invalid @enderror"
                                                name="types_of_employment" required>
                                                @foreach (config('app.types_of_employment') as $types_of_employmentField)
                                                    <option value="{{ $types_of_employmentField }}"
                                                        {{ old('types_of_employment') == $types_of_employmentField ? 'selected' : '' }}>
                                                        {{ $types_of_employmentField }}</option>
                                                @endforeach
                                            </select>
                                            @error('types_of_employment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <!-- Occupation -->
                                <div class="col-md-3 col-lg-4 my-2">
                                    <label for="occupation">{{ __('14. Occupation') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <select id="occupation"
                                            class="form-control @error('occupation') is-invalid @enderror"
                                            name="occupation" required>
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

                                        <label for="occupation_others"
                                            class="d-block mt-2">{{ __('Others (Specify)') }}</label>
                                        <div>
                                            <input id="occupation_others" type="text"
                                                class="form-control @error('occupation_others') is-invalid @enderror"
                                                name="occupation_others" value="{{ old('occupation_others') }}">
                                            @error('occupation_others')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Organizational Information -->
                                <div class="col-md-8 col-lg-6 my-2">
                                    <label>{{ __('15. Organizational Information') }}
                                        <span class="text-danger fw-bold">*</span></label>

                                    @error('organizational_information')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="row">
                                        @foreach (config('app.organizational_information') as $organizational_informationField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $organizational_informationField }}" type="text"
                                                    name="{{ $organizational_informationField }}"
                                                    value="{{ old($organizational_informationField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $organizational_informationField)) }}"
                                                    class="form-control mt-1 @error($organizational_informationField) is-invalid @enderror">

                                                @error($organizational_informationField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- ID Reference No -->
                                <div class="col-md-6 my-2">
                                    <label>{{ __('16. ID Reference No') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    @error('id_reference_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="row">
                                        @foreach (config('app.id_reference_no') as $id_reference_noField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $id_reference_noField }}" type="text"
                                                    name="{{ $id_reference_noField }}"
                                                    value="{{ old($id_reference_noField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $id_reference_noField)) }}"
                                                    class="form-control mt-1 @error($id_reference_noField) is-invalid @enderror">


                                                @error($id_reference_noField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Family Background -->
                                <div class="col-md-12">
                                    <label>{{ __('17. Family Background') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    @error('family_background')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="row">
                                        @foreach (config('app.family_background') as $family_backgroundField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $family_backgroundField }}" type="text"
                                                    name="{{ $family_backgroundField }}"
                                                    value="{{ old($family_backgroundField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $family_backgroundField)) }}"
                                                    class="form-control mt-1 @error($family_backgroundField) is-invalid @enderror">

                                                @error($family_backgroundField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Accomplished By -->
                                <div class="col-md-8 col-lg-6 my-2">
                                    <label for="accomplished_by">{{ __('18. Accomplished By') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        <div class="col-10">
                                            <select id="accomplished_by"
                                                class="form-control @error('accomplished_by') is-invalid @enderror"
                                                name="accomplished_by" required>
                                                @foreach (config('app.accomplished_by') as $accomplished_byField)
                                                    <option value="{{ $accomplished_byField }}"
                                                        {{ old('accomplished_by') == $accomplished_byField ? 'selected' : '' }}>
                                                        {{ $accomplished_byField }}</option>
                                                @endforeach
                                            </select>
                                            @error('accomplished_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        @foreach (config('app.accomplished_by_name') as $accomplished_by_nameField)
                                            <div class="col-12 col-md-6 col-4">
                                                <input id="{{ $accomplished_by_nameField }}" type="text"
                                                    name="{{ $accomplished_by_nameField }}"
                                                    value="{{ old($accomplished_by_nameField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $accomplished_by_nameField)) }}"
                                                    class="form-control mt-1 @error($accomplished_by_nameField) is-invalid @enderror"
                                                    required>


                                                @error($accomplished_by_nameField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Name of certifying physician -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label
                                        for="name_of_certifying_physician">{{ __('19. Name of certifying physician') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="name_of_certifying_physician" type="text"
                                            class="form-control @error('name_of_certifying_physician') is-invalid @enderror"
                                            name="name_of_certifying_physician"
                                            value="{{ old('name_of_certifying_physician') }}" required
                                            placeholder="Name of certifying physician">
                                        @error('name_of_certifying_physician')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div>
                                            <label for="license_no">{{ __('License No.') }}
                                                <span class="text-danger fw-bold">*</span>
                                            </label>
                                            <div>
                                                <input id="license_no" type="text"
                                                    class="form-control @error('license_no') is-invalid @enderror"
                                                    name="license_no" value="{{ old('license_no') }}" required
                                                    placeholder="License No.">
                                                @error('license_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Processing Officer -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label for="processing_officer">{{ __('20. Processing Officer') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="processing_officer" type="text"
                                            class="form-control @error('processing_officer') is-invalid @enderror"
                                            name="processing_officer" value="{{ old('processing_officer') }}" required
                                            placeholder="Processing Officer">
                                        @error('processing_officer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Approving Officer -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label for="approving_officer">{{ __('21. Approving Officer') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="approving_officer" type="text"
                                            class="form-control @error('approving_officer') is-invalid @enderror"
                                            name="approving_officer" value="{{ old('approving_officer') }}" required
                                            placeholder="Approving Officer">
                                        @error('approving_officer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Encoder -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label for="encoder">{{ __('22. Encoder') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="encoder" type="text"
                                            class="form-control @error('encoder') is-invalid @enderror" name="encoder"
                                            value="{{ old('encoder') }}" required placeholder="Encoder">
                                        @error('encoder')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Name of reporting unit (Office/Section) -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label
                                        for="name_of_reporting_unit_office_section">{{ __('23. Name of reporting unit (Office/Section)') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="name_of_reporting_unit_office_section" type="text"
                                            class="form-control @error('name_of_reporting_unit_office_section') is-invalid @enderror"
                                            name="name_of_reporting_unit_office_section"
                                            value="{{ old('name_of_reporting_unit_office_section') }}" required
                                            placeholder="Name of reporting unit (Office/Section)">
                                        @error('name_of_reporting_unit_office_section')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Control No. -->
                                <div class="col-md-4 col-lg-3 my-2">
                                    <label for="control_no">{{ __('23. Control No.') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="control_no" type="text"
                                            class="form-control @error('control_no') is-invalid @enderror"
                                            name="control_no" value="{{ old('control_no') }}" required
                                            placeholder="Control No.">
                                        @error('control_no')
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
            const fileInput = document.getElementById('pwd_photo');
            const photoContainer = document.getElementById('photo-container');

            // Function to update the image preview
            const updateImagePreview = () => {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoContainer.innerHTML =
                            `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover;" alt="PWD Photo Preview">`;
                    }
                    reader.readAsDataURL(file);
                } else {
                    photoContainer.innerHTML = ''; // Clear the image if no file is selected
                }
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
