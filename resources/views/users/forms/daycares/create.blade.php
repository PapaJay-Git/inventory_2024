@extends('layouts.app')

@section('title')
    Create Daycare Record
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE DAYCARE RECORD</span>
                        <a href="{{ route('daycares.index') }}" class="btn btn-primary btn-sm fw-bold">
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

                        <form action="{{ route('daycares.store') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this record?')">
                            @csrf
                            @method('POST')

                            <div class="row row-gap-3">

                                <!-- ECCD ID -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="eccdfid">{{ __('ECCDF ID') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="eccdfid" type="text"
                                        class="form-control  @error('eccdfid') is-invalid @enderror" name="eccdfid"
                                        value="{{ old('eccdfid') }}" required placeholder="ECCDF ID">
                                    @error('eccdfid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Facility Location -->
                                <div class="col-12 col-lg-9">
                                    <label>{{ __('1. Facility Address') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <div class="row">

                                        @foreach (config('app.facility_address') as $facilityField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $facilityField }}" type="text"
                                                    class="form-control  mt-1 @error($facilityField) is-invalid @enderror"
                                                    name="{{ $facilityField }}" value="{{ old($facilityField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $facilityField)) }}"
                                                    required>

                                                @error($facilityField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Facility and Service Provider Info -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div>
                                        <label for="facility_name">{{ __('2. Facility Name') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="facility_name" type="text"
                                                class="form-control  @error('facility_name') is-invalid @enderror"
                                                name="facility_name" value="{{ old('facility_name') }}" required>
                                            @error('facility_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="service_provider">{{ __('3. Service Provider') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="service_provider" type="text"
                                                class="form-control  @error('service_provider') is-invalid @enderror"
                                                name="service_provider" value="{{ old('service_provider') }}" required>
                                            @error('service_provider')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Child Information -->
                                <div class="col-12 col-md-8 col-lg-6">
                                    <label>{{ __('4. Child Name') }} <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        @foreach (config('app.child_name') as $child_nameField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $child_nameField }}" type="text"
                                                    name="{{ $child_nameField }}" value="{{ old($child_nameField) }}"
                                                    {!! $child_nameField == 'ext' ? "maxlength='10'" : '' !!}
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $child_nameField)) }}"
                                                    class="form-control  mt-1 @error($child_nameField) is-invalid @enderror"
                                                    required>

                                                @error($child_nameField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col-12 col-md-8 col-lg-3">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-12">
                                            <label for="sex">{{ __('5. Sex') }}
                                                <span class="text-danger fw-bold">*</span>
                                            </label>
                                            <select id="sex" class="form-control  @error('sex') is-invalid @enderror"
                                                name="sex" required>
                                                @foreach (config('app.sex') as $sex)
                                                    <option value="{{ $sex }}"
                                                        {{ old('sex') == $sex ? 'selected' : '' }}>{{ $sex }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-12">
                                            <label for="birth_order">{{ __('Birth Order') }}</label>
                                            <input id="birth_order" type="number"
                                                class="form-control  @error('birth_order') is-invalid @enderror"
                                                name="birth_order" value="{{ old('birth_order') }}" required>
                                            @error('birth_order')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <label for="no_of_siblings">{{ __('6. Number of Siblings') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="no_of_siblings" type="number"
                                            class="form-control  @error('no_of_siblings') is-invalid @enderror"
                                            name="no_of_siblings" value="{{ old('no_of_siblings') ?? 0 }}" required>
                                        @error('no_of_siblings')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-8 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="date_of_birth">{{ __('7. Date of Birth') }}
                                                <span class="text-danger fw-bold">*</span></label>
                                            <input id="date_of_birth" type="date"
                                                class="form-control  @error('date_of_birth') is-invalid @enderror"
                                                name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="birth_registered">{{ __('Birth Registered') }}
                                                <span class="text-danger fw-bold">*</span></label>
                                            <input id="birth_registered" type="date"
                                                class="form-control  @error('birth_registered') is-invalid @enderror"
                                                name="birth_registered" value="{{ old('birth_registered') }}" required>
                                            @error('birth_registered')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <label for="birthplace">{{ __('8. Birthplace') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="birthplace" type="text"
                                            class="form-control  @error('birthplace') is-invalid @enderror"
                                            name="birthplace" value="{{ old('birthplace') }}" required>
                                        @error('birthplace')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Home Address -->
                                <div class="col-12 col-md-9 col-lg-8">
                                    <label>{{ __('9. Home Address') }} <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        @foreach (config('app.home_address') as $home_addressField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $home_addressField }}" type="text"
                                                    class="form-control  mt-1 @error($home_addressField) is-invalid @enderror"
                                                    name="{{ $home_addressField }}"
                                                    value="{{ old($home_addressField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $home_addressField)) }}"
                                                    required>

                                                @error($home_addressField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Religion and Ethnicity -->
                                <div class="col-12 col-md-3 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="religion">{{ __('10. Religion') }}</label>
                                            <div>
                                                <input id="religion" type="text"
                                                    class="form-control  @error('religion') is-invalid @enderror"
                                                    name="religion" value="{{ old('religion') }}">
                                                @error('religion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="ethnicity">{{ __('11. Ethnicity') }}</label>
                                            <div>
                                                <input id="ethnicity" type="text"
                                                    class="form-control  @error('ethnicity') is-invalid @enderror"
                                                    name="ethnicity" value="{{ old('ethnicity') }}">
                                                @error('ethnicity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nutrition and Services -->
                                <div class="col-12">
                                    <label>{{ __('12. The child underwent the following: (check all applicable and fill details)') }}</label>
                                    <div class="row row-gap-2">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input type="checkbox" value="1" id="breastfeeding"
                                                            name="breastfeeding"
                                                            {{ old('breastfeeding') ? 'checked' : '' }}>
                                                        <label for="breastfeeding"
                                                            class="d-block">{{ __('Breastfeeding') }}</label>
                                                    </div>

                                                    @error('breastfeeding')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                {{-- kind_of_breastfeeding --}}
                                                <div class="col-12">
                                                    <label
                                                        for="kind_of_breastfeeding">{{ __('Kind of Breastfeeding') }}</label>

                                                    <select id="kind_of_breastfeeding"
                                                        class="form-control  @error('kind_of_breastfeeding') is-invalid @enderror"
                                                        name="kind_of_breastfeeding" required>
                                                        @foreach (config('app.kind_of_breastfeeding') as $kind_of_breastfeeding)
                                                            <option value="{{ $kind_of_breastfeeding }}"
                                                                {{ old('kind_of_breastfeeding') == $kind_of_breastfeeding ? 'selected' : '' }}>
                                                                {{ $kind_of_breastfeeding }}</option>
                                                        @endforeach>
                                                    </select>
                                                    @error('kind_of_breastfeeding')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                {{-- breastfed_for_months --}}
                                                <div class="col-12">
                                                    <label
                                                        for="breastfed_for_months">{{ __('Breastfed for Months') }}</label>
                                                    <input id="breastfed_for_months" type="number"
                                                        class="form-control  @error('breastfed_for_months') is-invalid @enderror"
                                                        name="breastfed_for_months"
                                                        value="{{ old('breastfed_for_months') }}">
                                                    @error('breastfed_for_months')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="checkbox" value="1" id="has_disability"
                                                        name="has_disability"
                                                        {{ old('has_disability') ? 'checked' : '' }}>
                                                    <label
                                                        for="has_disability">{{ __('Child have Disability/impairment. ') }}</label>
                                                </div>

                                                @error('has_disability')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label
                                                    for="referred_for_assistance">{{ __('Has the child been referred for assistance/assessment or other services in connection with his/her disability/impairment?') }}</label>

                                                <select id="referred_for_assistance"
                                                    class="form-control  @error('referred_for_assistance') is-invalid @enderror"
                                                    name="referred_for_assistance">
                                                    <option value="No"
                                                        {{ old('referred_for_assistance') == 'No' ? 'selected' : '' }}>
                                                        No
                                                    </option>
                                                    <option value="Yes"
                                                        {{ old('referred_for_assistance') == 'Yes' ? 'selected' : '' }}>
                                                        Yes
                                                    </option>
                                                </select>

                                                @error('referred_for_assistance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="checkbox" value="1" id="listahanan_identified"
                                                    name="listahanan_identified"
                                                    {{ old('listahanan_identified') ? 'checked' : '' }}>
                                                <label
                                                    for="listahanan_identified">{{ __('Listahanan identified') }}</label>
                                                @error('listahanan_identified')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <input type="checkbox" value="1" id="pantawid_beneficiary"
                                                    name="pantawid_beneficiary"
                                                    {{ old('pantawid_beneficiary') ? 'checked' : '' }}>
                                                <label for="pantawid_beneficiary">{{ __('Pantawid Benifeciary') }}</label>
                                                @error('pantawid_beneficiary')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div>
                                                <label for="household_id">{{ __('Household ID') }}</label>
                                                <input id="household_id" type="number"
                                                    class="form-control  @error('household_id') is-invalid @enderror"
                                                    name="household_id" value="{{ old('household_id') }}">
                                                @error('household_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            {{-- supplementary_feeding --}}
                                            <div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="checkbox" value="1" id="supplementary_feeding"
                                                        name="supplementary_feeding"
                                                        {{ old('supplementary_feeding') ? 'checked' : '' }}>
                                                    <label
                                                        for="supplementary_feeding">{{ __('Supplementary Feeding') }}</label>
                                                </div>
                                                @error('supplementary_feeding')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label
                                                    for="supplementary_feeding_for_days">{{ __('Supplementary Feeding for Days') }}</label>
                                                <div>
                                                    <input id="supplementary_feeding_for_days" type="number"
                                                        class="form-control  @error('supplementary_feeding_for_days') is-invalid @enderror"
                                                        name="supplementary_feeding_for_days"
                                                        value="{{ old('supplementary_feeding_for_days') }}">
                                                    @error('supplementary_feeding_for_days')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                    <!-- Disabilities -->
                                    <label>13. The child has the following disabilities/impairments:</label>
                                    <!-- Disabilities -->
                                    <div id="disabilities">
                                        @error('disabilities')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if (old('disabilities'))
                                            @foreach (old('disabilities') as $index => $disability)
                                                <div id="disability_div_{{ $index }}">
                                                    <div class="form-group row my-2">
                                                        <label for="disability_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">Disability/Impairment
                                                            (e.g. hearing, speech, visual)
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input id="disability_{{ $index }}" type="text"
                                                                class="form-control  @error('disabilities.' . $index . '.disability') is-invalid @enderror"
                                                                name="disabilities[{{ $index }}][disability]"
                                                                value="{{ old('disabilities.' . $index . '.disability') }}">
                                                            @error('disabilities.' . $index . '.disability')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="cause_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">Cause (e.g.
                                                            inborn,
                                                            illness)</label>
                                                        <div class="col-md-6">
                                                            <input id="cause_{{ $index }}" type="text"
                                                                class="form-control  @error('disabilities.' . $index . '.cause') is-invalid @enderror"
                                                                name="disabilities[{{ $index }}][cause]"
                                                                value="{{ old('disabilities.' . $index . '.cause') }}">
                                                            <button class="btn btn-sm btn-danger mt-1"
                                                                onclick="removeElement('disability_div_{{ $index }}')">Remove</button>
                                                            @error('disabilities.' . $index . '.cause')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        @else
                                            <div id="disability_div_0">
                                                <div class="form-group row my-2">
                                                    <label for="disability_0"
                                                        class="col-md-4 col-form-label text-md-right">Disability/Impairment
                                                        (e.g.
                                                        hearing, speech, visual)</label>
                                                    <div class="col-md-6">
                                                        <input id="disability_0" type="text" class="form-control "
                                                            name="disabilities[0][disability]">
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label for="cause_0"
                                                        class="col-md-4 col-form-label text-md-right">Cause
                                                        (e.g. inborn, illness)</label>
                                                    <div class="col-md-6">
                                                        <input id="cause_0" type="text" class="form-control "
                                                            name="disabilities[0][cause]">
                                                        <button class="btn btn-sm btn-danger mt-1"
                                                            onclick="removeElement('disability_div_0')">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="addDisability()">Add
                                        Another
                                        Disability</button>

                                    <hr>



                                    <!-- ECCD Experiences -->
                                    <label>14. The child has the following past ECCD experiences:</label>
                                    <div id="eccd_experiences">
                                        @error('eccdExperiences')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if (old('eccdExperiences'))
                                            @foreach (old('eccdExperiences') as $index => $experience)
                                                <div id="eccdExperiences_div_{{ $index }}">
                                                    <div class="form-group row my-2">
                                                        <label for="service_type_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">Service Type
                                                            (e.g.
                                                            Center, Community)
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input id="service_type_{{ $index }}" type="text"
                                                                class="form-control  @error('eccdExperiences.' . $index . '.service_type') is-invalid @enderror"
                                                                name="eccdExperiences[{{ $index }}][service_type]"
                                                                value="{{ old('eccdExperiences.' . $index . '.service_type') }}">
                                                            @error('eccdExperiences.' . $index . '.service_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="service_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">Service (e.g
                                                            Child
                                                            Minding, Day Care Mother)</label>
                                                        <div class="col-md-6">
                                                            <input id="service_{{ $index }}" type="text"
                                                                class="form-control  @error('eccdExperiences.' . $index . '.service') is-invalid @enderror"
                                                                name="eccdExperiences[{{ $index }}][service]"
                                                                value="{{ old('eccdExperiences.' . $index . '.service') }}">
                                                            @error('eccdExperiences.' . $index . '.service')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="from_date_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">From (Start
                                                            Date)</label>
                                                        <div class="col-md-6">
                                                            <input id="from_date_{{ $index }}" type="date"
                                                                class="form-control  @error('eccdExperiences.' . $index . '.from_date') is-invalid @enderror"
                                                                name="eccdExperiences[{{ $index }}][from_date]"
                                                                value="{{ old('eccdExperiences.' . $index . '.from_date') }}">
                                                            @error('eccdExperiences.' . $index . '.from_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="to_date_{{ $index }}"
                                                            class="col-md-4 col-form-label text-md-right">To (End
                                                            Date)</label>
                                                        <div class="col-md-6">
                                                            <input id="to_date_{{ $index }}" type="date"
                                                                class="form-control  @error('eccdExperiences.' . $index . '.to_date') is-invalid @enderror"
                                                                name="eccdExperiences[{{ $index }}][to_date]"
                                                                value="{{ old('eccdExperiences.' . $index . '.to_date') }}">
                                                            <button class="btn btn-sm btn-danger mt-1"
                                                                onclick="removeElement('eccdExperiences_div_{{ $index }}')">Remove</button>
                                                            @error('eccdExperiences.' . $index . '.to_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        @else
                                            <div id="eccdExperiences_div_0">
                                                <div class="form-group row my-2">
                                                    <label for="service_type_0"
                                                        class="col-md-4 col-form-label text-md-right">Service Type (e.g.
                                                        Center,
                                                        Community)</label>
                                                    <div class="col-md-6">
                                                        <input id="service_type_0" type="text" class="form-control "
                                                            name="eccdExperiences[0][service_type]">
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label for="service_0"
                                                        class="col-md-4 col-form-label text-md-right">Service
                                                        (e.g Child Minding, Day Care Mother)</label>
                                                    <div class="col-md-6">
                                                        <input id="service_0" type="text" class="form-control "
                                                            name="eccdExperiences[0][service]">
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label for="from_date_0"
                                                        class="col-md-4 col-form-label text-md-right">From
                                                        (Start Date)</label>
                                                    <div class="col-md-6">
                                                        <input id="from_date_0" type="date" class="form-control "
                                                            name="eccdExperiences[0][from_date]">
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label for="to_date_0"
                                                        class="col-md-4 col-form-label text-md-right">To (End
                                                        Date)</label>
                                                    <div class="col-md-6">
                                                        <input id="to_date_0" type="date" class="form-control "
                                                            name="eccdExperiences[0][to_date]">
                                                        <button class="btn btn-sm btn-danger mt-1"
                                                            onclick="removeElement('eccdExperiences_div_0')">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        onclick="addEccdExperience()">Add
                                        Another ECCD Experience</button>

                                    <hr>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label>{{ __('15.') }}</label>

                                    <div>

                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="checkbox" value="1" id="participation_fee_paid"
                                                    name="participation_fee_paid"
                                                    {{ old('participation_fee_paid') ? 'checked' : '' }}>
                                                <label for="participation_fee_paid">{{ __('Participation Fee') }}</label>
                                            </div>
                                            @error('participation_fee_paid')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <div>
                                                <label for="participation_fee_amount"
                                                    class="d-block mt-3">{{ __('Participation fee amount') }}</label>
                                                <input id="participation_fee_amount" type="number"
                                                    class="form-control  @error('participation_fee_amount') is-invalid @enderror"
                                                    name="participation_fee_amount"
                                                    value="{{ old('participation_fee_amount') }}">
                                            </div>
                                            @error('participation_fee_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <div>
                                                <label for="parents_counterpart">{{ __('Parents counterpart') }}</label>
                                                <select id="parents_counterpart"
                                                    class="form-control  @error('parents_counterpart') is-invalid @enderror"
                                                    name="parents_counterpart" required>
                                                    @foreach (config('app.parents_counterpart') as $parents_counterpart)
                                                        <option value="{{ $parents_counterpart }}"
                                                            {{ old('parents_counterpart') == $parents_counterpart ? 'selected' : '' }}>
                                                            {{ $parents_counterpart }}</option>
                                                    @endforeach>
                                                </select>
                                            </div>

                                            @error('parents_counterpart')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-lg-4">
                                    <div>
                                        <label for="school_year">{{ __('16. School Year') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="school_year" name="school_year"
                                            class="form-control  @error('school_year') is-invalid @enderror"
                                            value="{{ old('school_year') }}">
                                        @error('school_year')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="scheduled_session">{{ __('17. Scheduled session') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select id="scheduled_session"
                                            class="form-control  @error('scheduled_session') is-invalid @enderror"
                                            name="scheduled_session" required>
                                            @foreach (config('app.scheduled_session') as $scheduled_session)
                                                <option value="{{ $scheduled_session }}"
                                                    {{ old('scheduled_session') == $scheduled_session ? 'selected' : '' }}>
                                                    {{ $scheduled_session }}</option>
                                            @endforeach>
                                        </select>
                                        @error('scheduled_session')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="attendance_status">{{ __('18. Attendance status') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <select id="attendance_status"
                                            class="form-control  @error('attendance_status') is-invalid @enderror"
                                            name="attendance_status" required>
                                            @foreach (config('app.attendance_status') as $attendance_status)
                                                <option value="{{ $attendance_status }}"
                                                    {{ old('attendance_status') == $attendance_status ? 'selected' : '' }}>
                                                    {{ $attendance_status }}</option>
                                            @endforeach>
                                        </select>
                                        @error('attendance_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="mt-3">
                                            <div>
                                                <label for="dropout_reason">{{ __('If drop out, reason: ') }}</label>
                                                <select id="dropout_reason"
                                                    class="form-control  @error('dropout_reason') is-invalid @enderror"
                                                    name="dropout_reason" required>
                                                    @foreach (config('app.dropout_reason') as $dropout_reason)
                                                        <option value="{{ $dropout_reason }}"
                                                            {{ old('dropout_reason') == $dropout_reason ? 'selected' : '' }}>
                                                            {{ $dropout_reason }}</option>
                                                    @endforeach>
                                                </select>
                                            </div>
                                            @error('dropout_reason')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <div>
                                                <label for="dropout_reason_others">{{ __('(Others) specify') }}</label>
                                                <input id="dropout_reason_others" type="text"
                                                    class="form-control  @error('dropout_reason_others') is-invalid @enderror"
                                                    name="dropout_reason_others"
                                                    value="{{ old('dropout_reason_others') }}">
                                            </div>

                                            @error('dropout_reason_others')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-6 col-lg-12 row">
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label for="accomplished_by">{{ __('Accomplished by') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="accomplished_by" type="text"
                                                class="form-control  @error('accomplished_by') is-invalid @enderror"
                                                name="accomplished_by" value="{{ old('accomplished_by') }}">
                                            @error('accomplished_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label
                                            for="name_of_eccd_service_provider">{{ __('Name of ECCD Service Provider') }}
                                            <span class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="name_of_eccd_service_provider" type="text"
                                                class="form-control  @error('name_of_eccd_service_provider') is-invalid @enderror"
                                                name="name_of_eccd_service_provider"
                                                value="{{ old('name_of_eccd_service_provider') }}">
                                            @error('name_of_eccd_service_provider')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label for="date_accomplished">{{ __('Date accomplished') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="date_accomplished" type="date"
                                                class="form-control  @error('date_accomplished') is-invalid @enderror"
                                                name="date_accomplished" value="{{ old('date_accomplished') }}">
                                            @error('date_accomplished')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label for="encoder_id">{{ __('Encoder ID') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="encoder_id" type="text"
                                                class="form-control  @error('encoder_id') is-invalid @enderror"
                                                name="encoder_id" value="{{ old('encoder_id') }}">
                                            @error('encoder_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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

        let disabilityIndex = {{ old('disabilities') ? count(old('disabilities')) : 1 }};
        let eccdExperienceIndex = {{ old('eccdExperiences') ? count(old('eccdExperiences')) : 1 }};

        function addDisability() {
            var disabilitiesDiv = document.getElementById('disabilities');
            var newDisability = `
                <div id="disabilities_div_${disabilityIndex}">
                    <div class="form-group row my-2">
                        <label for="disability_${disabilityIndex}" class="col-md-4 col-form-label text-md-right">Disability/Impairment (e.g. hearing, speech, visual)</label>
                        <div class="col-md-6">
                            <input id="disability_${disabilityIndex}" type="text" class="form-control " name="disabilities[${disabilityIndex}][disability]">
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="cause_${disabilityIndex}" class="col-md-4 col-form-label text-md-right">Cause (e.g. inborn, illness)</label>
                        <div class="col-md-6">
                            <input id="cause_${disabilityIndex}" type="text" class="form-control " name="disabilities[${disabilityIndex}][cause]">
                            <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('disabilities_div_{${disabilityIndex}')">Remove</button>
                        </div>
                    </div>
                    <hr>
                </div>`;
            disabilitiesDiv.insertAdjacentHTML('beforeend', newDisability);
            disabilityIndex++;
        }

        function addEccdExperience() {
            var eccdExperiencesDiv = document.getElementById('eccd_experiences');
            var newEccdExperience = `
                <div id="eccdExperiences_div_${eccdExperienceIndex}">
                    <div class="form-group row my-2">
                        <label for="service_type_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">Service Type (e.g. Center, Community)</label>
                        <div class="col-md-6">
                            <input id="service_type_${eccdExperienceIndex}" type="text" class="form-control " name="eccdExperiences[${eccdExperienceIndex}][service_type]">
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="service_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">Service (e.g Child Minding, Day Care Mother)</label>
                        <div class="col-md-6">
                            <input id="service_${eccdExperienceIndex}" type="text" class="form-control " name="eccdExperiences[${eccdExperienceIndex}][service]">
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="from_date_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">From (Start Date)</label>
                        <div class="col-md-6">
                            <input id="from_date_${eccdExperienceIndex}" type="date" class="form-control " name="eccdExperiences[${eccdExperienceIndex}][from_date]">
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="to_date_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">To (End Date)</label>
                        <div class="col-md-6">
                            <input id="to_date_${eccdExperienceIndex}" type="date" class="form-control " name="eccdExperiences[${eccdExperienceIndex}][to_date]">
                            <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('eccdExperiences_div_{${eccdExperienceIndex}')">Remove</button>
                        </div>
                    </div>
                    <hr>
                </div>
                `;
            eccdExperiencesDiv.insertAdjacentHTML('beforeend', newEccdExperience);
            eccdExperienceIndex++;
        }

        function removeElement(id) {
            const element = document.getElementById(id);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
