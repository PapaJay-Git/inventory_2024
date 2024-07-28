@extends('layouts.app')

@section('title')
    Create Solo - Parent Record
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE SOLO - PARENT RECORD</span>
                        <a href="{{ route('solo_parents.index') }}" class="btn btn-primary btn-sm fw-bold">
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


                        <form action="{{ route('solo_parents.store') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this record?')">
                            @csrf
                            @method('POST')

                            <div class="row row-gap-3">

                                <!-- Case Number -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="case_number">{{ __('Case Number') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="case_number" type="text"
                                        class="form-control  @error('case_number') is-invalid @enderror" name="case_number"
                                        value="{{ old('case_number') }}" required placeholder="Case Number">
                                    @error('case_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="col-12">
                                    <h5>I. Identifying Information</h5>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label>{{ __('Full Name') }} <span class="text-danger fw-bold">*</span></label>
                                    <div class="row">
                                        @foreach (config('app.personal_information') as $personal_informationField)
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <input id="{{ $personal_informationField }}" type="text"
                                                    name="{{ $personal_informationField }}"
                                                    value="{{ old($personal_informationField) }}" {!! $personal_informationField == 'ext' ? "maxlength='10'" : '' !!}
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $personal_informationField)) }}"
                                                    class="form-control  mt-1 @error($personal_informationField) is-invalid @enderror"
                                                    required>

                                                @error($personal_informationField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <label for="philsys_card_number">{{ __('Philsys Card Number') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div>
                                        <input id="philsys_card_number" type="text"
                                            class="form-control  @error('philsys_card_number') is-invalid @enderror"
                                            name="philsys_card_number" value="{{ old('philsys_card_number') ?? 0 }}"
                                            required>
                                        @error('philsys_card_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-12 col-md-4 col-lg-3">
                                    <label for="date_of_birth">{{ __('Date of Birth') }}
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


                                {{-- SEX AND PLACE OF BIRTH --}}
                                <div class="col-12 col-md-12 col-lg-5 row row-gap-1">
                                    <div class="col-12 col-md-4 col-lg-6">
                                        <label for="sex">{{ __('Sex') }}
                                            <span class="text-danger fw-bold">*</span>
                                        </label>
                                        <select id="sex" class="form-control  @error('sex') is-invalid @enderror"
                                            name="sex" required>
                                            @foreach (config('app.sex') as $sex)
                                                <option value="{{ $sex }}"
                                                    {{ old('sex') == $sex ? 'selected' : '' }}>
                                                    {{ $sex }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-6">
                                        <label for="age">{{ __('Age') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="age" type="number"
                                                class="form-control  @error('age') is-invalid @enderror" name="age"
                                                value="{{ old('age') }}" required>
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-4 col-lg-6">
                                        <label for="place_of_birth">{{ __('Birthplace') }} <span
                                                class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="place_of_birth" type="text"
                                                class="form-control  @error('place_of_birth') is-invalid @enderror"
                                                name="place_of_birth" value="{{ old('place_of_birth') }}" required>
                                            @error('place_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-12 col-lg-7">
                                    <label>{{ __('Address') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <div class="row row-gap-2">

                                        @foreach (config('app.address') as $addressField)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <input id="{{ $addressField }}" type="text"
                                                    class="form-control  mt-1 @error($addressField) is-invalid @enderror"
                                                    name="{{ $addressField }}" value="{{ old($addressField) }}"
                                                    placeholder="{{ ucwords(str_replace('_', ' ', $addressField)) }}"
                                                    required>

                                                @error($addressField)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Educational Attainment -->
                                <div class="col-12 col-md-6 col-lg-3">
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

                                {{-- Civil Status --}}
                                <div class="col-12 col-md-6 col-lg-3">
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

                                <!-- Occupation -->
                                <div class="col-md-6 col-lg-3">
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

                                <!-- Religion -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="religion">{{ __('Religion') }}</label>
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
                                </div>

                                <!-- Company/Agency -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="company_agency">{{ __('Company/Agency') }}</label>
                                        <div>
                                            <input id="company_agency" type="text"
                                                class="form-control  @error('company_agency') is-invalid @enderror"
                                                name="company_agency" value="{{ old('company_agency') }}" required>
                                            @error('company_agency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Monthly Income -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="monthly_income">{{ __('Monthly Income') }}</label>
                                        <div>
                                            <input id="monthly_income" type="number"
                                                class="form-control  @error('monthly_income') is-invalid @enderror"
                                                name="monthly_income" value="{{ old('monthly_income') }}" required>
                                            @error('monthly_income')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Status of employment -->
                                <div class="col-md-6 col-lg-3">
                                    <label for="status_of_employment">{{ __('Status of Employment') }}
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

                                <!-- Contact Number -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="contact_numbers">{{ __('Contact Number/s') }}
                                            <span class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="contact_numbers" type="text"
                                                class="form-control  @error('contact_numbers') is-invalid @enderror"
                                                name="contact_numbers" value="{{ old('contact_numbers') }}" required>
                                            @error('contact_numbers')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="email_address">{{ __('Email Address') }}</label>
                                        <div>
                                            <input id="email_address" type="email"
                                                class="form-control  @error('email_address') is-invalid @enderror"
                                                name="email_address" value="{{ old('email_address') }}" required>
                                            @error('email_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Pantawid Benifeciary and Household ID -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="row row-gap-2">
                                        <div class="col-12">
                                            <label for="pantawid_beneficiary">{{ __('Pantawid Benifeciary?') }}</label>
                                            <div>
                                                <select
                                                    class="form-control  @error('pantawid_beneficiary') is-invalid @enderror"
                                                    name="pantawid_beneficiary" id="pantawid_beneficiary">
                                                    <option value="0"
                                                        {{ old('pantawid_beneficiary') ? 'selected' : '' }}>No</option>
                                                    <option value="1"
                                                        {{ old('pantawid_beneficiary') ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                @error('pantawid_beneficiary')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="household_id">{{ __('Household ID') }}</label>
                                            <div>
                                                <input id="household_id" type="text"
                                                    class="form-control  @error('household_id') is-invalid @enderror"
                                                    name="household_id" value="{{ old('household_id') }}">
                                                @error('household_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Indigenous Person and affiliation -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="row row-gap-2">
                                        <div class="col-12">
                                            <label for="indigenous_person">{{ __('Indigenous Person?') }}</label>
                                            <div>
                                                <select
                                                    class="form-control  @error('indigenous_person') is-invalid @enderror"
                                                    name="indigenous_person" id="indigenous_person">
                                                    <option value="0"
                                                        {{ old('indigenous_person') ? 'selected' : '' }}>No</option>
                                                    <option value="1"
                                                        {{ old('indigenous_person') ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                @error('indigenous_person')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="affiliation">{{ __('Affiliation') }}</label>
                                            <div>
                                                <input id="affiliation" type="text"
                                                    class="form-control  @error('affiliation') is-invalid @enderror"
                                                    name="affiliation" value="{{ old('affiliation') }}">
                                                @error('affiliation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- lgbtq and pwd -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="row row-gap-2">
                                        <div class="col-12">
                                            <label for="lgbtq">{{ __('LGBTQ+?') }}</label>
                                            <div>
                                                <select class="form-control  @error('lgbtq') is-invalid @enderror"
                                                    name="lgbtq" id="lgbtq">
                                                    <option value="0" {{ old('lgbtq') ? 'selected' : '' }}>No
                                                    </option>
                                                    <option value="1" {{ old('lgbtq') ? 'selected' : '' }}>Yes
                                                    </option>
                                                </select>
                                                @error('lgbtq')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="pwd">{{ __('PWD?') }}</label>
                                            <div>
                                                <select class="form-control  @error('pwd') is-invalid @enderror"
                                                    name="pwd" id="pwd">
                                                    <option value="0" {{ old('pwd') ? 'selected' : '' }}>No</option>
                                                    <option value="1" {{ old('pwd') ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                @error('pwd')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <hr>

                                <div class="col-12">
                                    <h5>II. Household Composition</h5>
                                </div>

                                <div class="col-12">
                                    <div id="household_compositions">
                                        @error('householdCompositions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @foreach (old('householdCompositions') ?? [] as $index => $experience)
                                            <div class="row mb-2 row-gap-2 pb-2"
                                                id="householdCompositions_div_{{ $index }}"
                                                style="border-bottom: 1px solid rgb(169, 155, 155)">
                                                <div class="col-md-4 col-lg-4">
                                                    <label for="full_name_{{ $index }}">
                                                        Full Name
                                                    </label>
                                                    <div>
                                                        <input id="full_name_{{ $index }}" type="text"
                                                            class="form-control  @error('householdCompositions.' . $index . '.full_name') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][full_name]"
                                                            value="{{ old('householdCompositions.' . $index . '.full_name') }}">
                                                        @error('householdCompositions.' . $index . '.full_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="sex_{{ $index }}">{{ __('Sex') }}
                                                        <span class="text-danger fw-bold">*</span>
                                                    </label>
                                                    <select id="sex_{{ $index }}"
                                                        class="form-control  @error('householdCompositions.' . $index . '.sex') is-invalid @enderror"
                                                        name="householdCompositions[{{ $index }}][sex]" required>
                                                        @foreach (config('app.sex') as $sex)
                                                            <option value="{{ $sex }}"
                                                                {{ old('householdCompositions.' . $index . '.sex') == $sex ? 'selected' : '' }}>
                                                                {{ $sex }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('householdCompositions.' . $index . '.sex')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="relationship_{{ $index }}">
                                                        Relationship
                                                    </label>
                                                    <div>
                                                        <input id="relationship_{{ $index }}" type="text"
                                                            class="form-control  @error('householdCompositions.' . $index . '.relationship') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][relationship]"
                                                            value="{{ old('householdCompositions.' . $index . '.relationship') }}">
                                                        @error('householdCompositions.' . $index . '.relationship')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-2">
                                                    <label for="age_{{ $index }}">
                                                        Age
                                                    </label>
                                                    <div>
                                                        <input id="age_{{ $index }}" type="number"
                                                            class="form-control  @error('householdCompositions.' . $index . '.age') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][age]"
                                                            value="{{ old('householdCompositions.' . $index . '.age') }}">
                                                        @error('householdCompositions.' . $index . '.age')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-2">
                                                    <label for="birthdate_{{ $index }}">
                                                        Birthday
                                                    </label>
                                                    <div>
                                                        <input id="birthdate_{{ $index }}" type="date"
                                                            class="form-control  @error('householdCompositions.' . $index . '.birthdate') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][birthdate]"
                                                            value="{{ old('householdCompositions.' . $index . '.birthdate') }}">
                                                        @error('householdCompositions.' . $index . '.birthdate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Civil Status --}}
                                                <div class="col-md-4 col-lg-3">
                                                    <label
                                                        for="civil_status_{{ $index }}">{{ __('Civil Status') }}
                                                        <span class="text-danger fw-bold">*</span></label>
                                                    <div>
                                                        <select id="civil_status_{{ $index }}"
                                                            class="form-control @error('householdCompositions.' . $index . '.civil_status') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][civil_status]"
                                                            required>
                                                            @foreach (config('app.civil_status') as $civil_statusField)
                                                                <option value="{{ $civil_statusField }}"
                                                                    {{ old('householdCompositions.' . $index . '.civil_status') == $civil_statusField ? 'selected' : '' }}>
                                                                    {{ $civil_statusField }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('householdCompositions.' . $index . '.civil_status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Educational Attainment -->
                                                <div class="col-md-4 col-lg-3">
                                                    <label
                                                        for="educational_attainment_{{ $index }}">{{ __('Educational Attainment') }}
                                                        <select id="educational_attainment_{{ $index }}"
                                                            class="form-control @error('householdCompositions.' . $index . '.educational_attainment') is-invalid @enderror"
                                                            name="householdCompositions[{{ $index }}][educational_attainment]"
                                                            required>
                                                            @foreach (config('app.educational_attainment') as $educational_attainmentField)
                                                                <option value="{{ $educational_attainmentField }}"
                                                                    {{ old('householdCompositions.' . $index . '.educational_attainment') == $educational_attainmentField ? 'selected' : '' }}>
                                                                    {{ $educational_attainmentField }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('householdCompositions.' . $index .
                                                            '.educational_attainment')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>

                                                <!-- Occupation -->
                                                <div class="col-md-4 col-lg-3">
                                                    <label for="occupation_{{ $index }}">{{ __('Occupation') }}
                                                        <span class="text-danger fw-bold">*</span></label>
                                                    <select id="occupation_{{ $index }}"
                                                        class="form-control @error('householdCompositions.' . $index . '.occupation') is-invalid @enderror"
                                                        name="householdCompositions[{{ $index }}][occupation]"
                                                        required>
                                                        @foreach (config('app.occupation') as $occupationField)
                                                            <option value="{{ $occupationField }}"
                                                                {{ old('householdCompositions.' . $index . '.occupation') == $occupationField ? 'selected' : '' }}>
                                                                {{ $occupationField }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('householdCompositions.' . $index . '.occupation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <!-- Monthly Income -->
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="col-12">
                                                        <label
                                                            for="monthly_income_{{ $index }}">{{ __('Monthly Income') }}</label>
                                                        <div>
                                                            <input id="monthly_income_{{ $index }}"
                                                                type="number"
                                                                class="form-control  @error('householdCompositions.' . $index . '.monthly_income') is-invalid @enderror"
                                                                name="householdCompositions[{{ $index }}][monthly_income]"
                                                                value="{{ old('householdCompositions.' . $index . '.monthly_income') }}">
                                                            @error('householdCompositions.' . $index . '.monthly_income')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger mt-1"
                                                        onclick="removeElement('householdCompositions_div_{{ $index }}')">Remove</button>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        onclick="addHouseholdCompositions()">Add Household Composition</button>

                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <label for="classification_circumstances">
                                        III. Classification/Circumtances of being a solo parent (Dahilan bakit nagingsolo
                                        parent)?
                                        <span class="text-danger fw-bold">*</span></label>
                                    </label>
                                    <textarea class="form-control @error('classification_circumstances') is-invalid @enderror"
                                        id="classification_circumstances" name="classification_circumstances" required>{{ old('classification_circumstances') }}</textarea>
                                    @error('classification_circumstances')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="needs_problems">IV. Needs/Provlems of being a solo parent
                                        (Kinakailangan/Problema ng isang solo parent)?
                                        <span class="text-danger fw-bold">*</span></label>
                                    </label>
                                    <textarea class="form-control @error('needs_problems') is-invalid @enderror" id="needs_problems"
                                        name="needs_problems" required>{{ old('needs_problems') }}</textarea>
                                    @error('needs_problems')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <hr>
                                <h5>V. In Case of Emergency</h5>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label for="emergency_name">Emergency Name</label>
                                            <input id="emergency_name" type="text" name="emergency_name"
                                                value="{{ old('emergency_name') }}"
                                                class="form-control  mt-1 @error('emergency_name') is-invalid @enderror"
                                                required>

                                            @error('emergency_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label for="emergency_relationship">Emergency Name</label>
                                            <input id="emergency_relationship" type="text"
                                                name="emergency_relationship"
                                                value="{{ old('emergency_relationship') }}"
                                                class="form-control  mt-1 @error('emergency_relationship') is-invalid @enderror"
                                                required>

                                            @error('emergency_relationship')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label for="emergency_address">Emergency Name</label>
                                            <input id="emergency_address" type="text" name="emergency_address"
                                                value="{{ old('emergency_address') }}"
                                                class="form-control  mt-1 @error('emergency_address') is-invalid @enderror"
                                                required>

                                            @error('emergency_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label for="emergency_number">Emergency Name</label>
                                            <input id="emergency_number" type="text" name="emergency_number"
                                                value="{{ old('emergency_number') }}"
                                                class="form-control  mt-1 @error('emergency_number') is-invalid @enderror"
                                                required>

                                            @error('emergency_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <h5>For SPO/SPD Use Only</h5>
                                <!-- SPO status -->
                                <div class="col-md-6 col-lg-3">
                                    <label for="spo_status">{{ __('SPO Status') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <select id="spo_status"
                                        class="form-control @error('spo_status') is-invalid @enderror" name="spo_status"
                                        required>
                                        @foreach (config('app.spo_status') as $spo_statusField)
                                            <option value="{{ $spo_statusField }}"
                                                {{ old('spo_status') == $spo_statusField ? 'selected' : '' }}>
                                                {{ $spo_statusField }}</option>
                                        @endforeach
                                    </select>
                                    @error('spo_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- solo_parent_id_card_number -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label
                                            for="solo_parent_id_card_number">{{ __('Solo parent ID card number') }}</label>
                                        <div>
                                            <input id="solo_parent_id_card_number" type="text"
                                                class="form-control  @error('solo_parent_id_card_number') is-invalid @enderror"
                                                name="solo_parent_id_card_number"
                                                value="{{ old('solo_parent_id_card_number') }}">
                                            @error('solo_parent_id_card_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- solo_parent_category -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="solo_parent_category">{{ __('Solo parent Category') }}</label>
                                        <div>
                                            <input id="solo_parent_category" type="text"
                                                class="form-control  @error('solo_parent_category') is-invalid @enderror"
                                                name="solo_parent_category" value="{{ old('solo_parent_category') }}">
                                            @error('solo_parent_category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- date_issuance -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="date_issuance">{{ __('Date Issuance') }}</label>
                                        <div>
                                            <input id="date_issuance" type="date"
                                                class="form-control  @error('date_issuance') is-invalid @enderror"
                                                name="date_issuance" value="{{ old('date_issuance') }}">
                                            @error('date_issuance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- beneficiary_code -->
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="beneficiary_code">{{ __('Beneficiary Code') }}</label>
                                        <div>
                                            <input id="beneficiary_code" type="text"
                                                class="form-control  @error('beneficiary_code') is-invalid @enderror"
                                                name="beneficiary_code" value="{{ old('beneficiary_code') }}">
                                            @error('beneficiary_code')
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

        let householdCompositionIndex = {{ old('householdCompositions') ? count(old('householdCompositions')) : 1 }};

        function addHouseholdCompositions() {
            const householdCompositionsDiv = document.getElementById('household_compositions');

            // Base HTML template for new household composition
            const newHouseholdComposition = `
            <div class="row mb-2 row-gap-2 pb-2" id="householdCompositions_div_${householdCompositionIndex}"
                style="border-bottom: 1px solid rgb(169, 155, 155)">
                <div class="col-md-4 col-lg-4">
                    <label for="full_name_${householdCompositionIndex}">Full Name</label>
                    <div>
                        <input id="full_name_${householdCompositionIndex}" type="text" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][full_name]">
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <label for="sex_${householdCompositionIndex}">{{ __('Sex') }} <span class="text-danger fw-bold">*</span></label>
                    <select id="sex_${householdCompositionIndex}" class="form-control"
                        name="householdCompositions[${householdCompositionIndex}][sex]" required>
                        @foreach (config('app.sex') as $sex)
                            <option value="{{ $sex }}">{{ $sex }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-lg-2">
                    <label for="relationship_${householdCompositionIndex}">Relationship</label>
                    <div>
                        <input id="relationship_${householdCompositionIndex}" type="text" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][relationship]">
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <label for="age_${householdCompositionIndex}">Age</label>
                    <div>
                        <input id="age_${householdCompositionIndex}" type="number" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][age]">
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <label for="birthdate_${householdCompositionIndex}">Birthday</label>
                    <div>
                        <input id="birthdate_${householdCompositionIndex}" type="date" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][birthdate]">
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <label for="civil_status_${householdCompositionIndex}">{{ __('Civil Status') }} <span class="text-danger fw-bold">*</span></label>
                    <div>
                        <select id="civil_status_${householdCompositionIndex}" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][civil_status]" required>
                            @foreach (config('app.civil_status') as $civil_statusField)
                                <option value="{{ $civil_statusField }}">{{ $civil_statusField }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <label for="educational_attainment_${householdCompositionIndex}">{{ __('Educational Attainment') }}</label>
                    <div>
                        <select id="educational_attainment_${householdCompositionIndex}" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][educational_attainment]" required>
                            @foreach (config('app.educational_attainment') as $educational_attainmentField)
                                <option value="{{ $educational_attainmentField }}">{{ $educational_attainmentField }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <label for="occupation_${householdCompositionIndex}">{{ __('Occupation') }} <span class="text-danger fw-bold">*</span></label>
                    <div>
                        <select id="occupation_${householdCompositionIndex}" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][occupation]" required>
                            @foreach (config('app.occupation') as $occupationField)
                                <option value="{{ $occupationField }}">{{ $occupationField }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="monthly_income_${householdCompositionIndex}">{{ __('Monthly Income') }}</label>
                    <div>
                        <input id="monthly_income_${householdCompositionIndex}" type="number" class="form-control"
                            name="householdCompositions[${householdCompositionIndex}][monthly_income]">
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-danger mt-1"
                        onclick="removeElement('householdCompositions_div_${householdCompositionIndex}')">Remove</button>
                </div>
            </div>`;

            householdCompositionsDiv.insertAdjacentHTML('beforeend', newHouseholdComposition);
            householdCompositionIndex++;
        }

        function removeElement(id) {
            var element = document.getElementById(id);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
