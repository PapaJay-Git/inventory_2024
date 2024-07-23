@extends('layouts.app')

@section('title')
    Create Daycare Record
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    <form action="{{ route('daycares.store') }}" method="POST" onsubmit="return confirm('Are you sure you want to create this record?')">
                        @csrf
                        @method('POST')

                        <!-- ECCD ID -->
                        <div class="form-group row my-2">
                            <label for="eccdfid" class="col-md-4 col-form-label text-md-right">{{ __('ECCDF ID') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="eccdfid" type="text" class="form-control @error('eccdfid') is-invalid @enderror" name="eccdfid" value="{{ old('eccdfid') }}" required>
                                @error('eccdfid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Facility Location -->
                        <div class="form-group row my-2">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('1. Facility Address') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="facility_street_address" type="text" class="form-control @error('facility_street_address') is-invalid @enderror" name="facility_street_address" value="{{ old('facility_street_address') }}" placeholder="Street Address" required>
                                <input id="facility_barangay" type="text" class="form-control mt-1 @error('facility_barangay') is-invalid @enderror" name="facility_barangay" value="{{ old('facility_barangay') }}" placeholder="Barangay" required>
                                <input id="facility_city_municipality" type="text" class="form-control mt-1 @error('facility_city_municipality') is-invalid @enderror" name="facility_city_municipality" value="{{ old('facility_city_municipality') }}" placeholder="City/Municipality" required>
                                <input id="facility_province" type="text" class="form-control mt-1 @error('facility_province') is-invalid @enderror" name="facility_province" value="{{ old('facility_province') }}" placeholder="Province" required>
                                <input id="facility_region" type="text" class="form-control mt-1 @error('facility_region') is-invalid @enderror" name="facility_region" value="{{ old('facility_region') }}" placeholder="Region" required>
                                @foreach (['facility_street_address', 'facility_barangay', 'facility_city_municipality', 'facility_province', 'facility_region'] as $field)
                                    @error($field)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endforeach
                            </div>
                        </div>

                        <!-- Facility and Service Provider Info -->
                        <div class="form-group row my-2">
                            <label for="facility_name" class="col-md-4 col-form-label text-md-right">{{ __('2. Facility Name') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="facility_name" type="text" class="form-control @error('facility_name') is-invalid @enderror" name="facility_name" value="{{ old('facility_name') }}" required>
                                @error('facility_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="service_provider" class="col-md-4 col-form-label text-md-right">{{ __('3. Service Provider') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="service_provider" type="text" class="form-control @error('service_provider') is-invalid @enderror" name="service_provider" value="{{ old('service_provider') }}" required>
                                @error('service_provider')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Child Information -->
                        <div class="form-group row my-2">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('4. Child Name') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                                <input id="middle_name" type="text" class="form-control mt-1 @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name">
                                <input id="last_name" type="text" class="form-control mt-1 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                                <input id="ext" type="text" class="form-control mt-1 @error('ext') is-invalid @enderror" name="ext" value="{{ old('ext') }}" placeholder="Extension (e.g., Jr., Sr.)" maxlength="10">
                                <input id="nickname" type="text" class="form-control mt-1 @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" placeholder="Nickname">
                                @foreach (['first_name', 'middle_name', 'last_name', 'ext', 'nickname'] as $field)
                                    @error($field)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('5. Sex') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" required>
                                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="birth_order" class="d-block mt-3">{{ __('Birth Order') }}</label>
                                <div>
                                    <input id="birth_order" type="number" class="form-control @error('birth_order') is-invalid @enderror" name="birth_order" value="{{ old('birth_order') }}" required>
                                    @error('birth_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="no_of_siblings" class="col-md-4 col-form-label text-md-right">{{ __('6. Number of Siblings') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="no_of_siblings" type="number" class="form-control @error('no_of_siblings') is-invalid @enderror" name="no_of_siblings" value="{{ old('no_of_siblings') ?? 0 }}" required>
                                @error('no_of_siblings')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row my-2">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('7. Date of Birth') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="birth_registered" class="d-block mt-3">{{ __('Birth Registered') }} <span class="text-danger fw-bold">*</span></label>
                                <div>
                                    <input id="birth_registered" type="date" class="form-control @error('birth_registered') is-invalid @enderror" name="birth_registered" value="{{ old('birth_registered') }}" required>
                                    @error('birth_registered')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="birthplace" class="col-md-4 col-form-label text-md-right">{{ __('8. Birthplace') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ old('birthplace') }}" required>
                                @error('birthplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Home Address -->
                        <div class="form-group row my-2">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('9. Home Address') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="home_street_address" type="text" class="form-control @error('home_street_address') is-invalid @enderror" name="home_street_address" value="{{ old('home_street_address') }}" placeholder="Street Address" required>
                                <input id="home_barangay" type="text" class="form-control mt-1 @error('home_barangay') is-invalid @enderror" name="home_barangay" value="{{ old('home_barangay') }}" placeholder="Barangay" required>
                                <input id="home_city_municipality" type="text" class="form-control mt-1 @error('home_city_municipality') is-invalid @enderror" name="home_city_municipality" value="{{ old('home_city_municipality') }}" placeholder="City/Municipality" required>
                                <input id="home_province" type="text" class="form-control mt-1 @error('home_province') is-invalid @enderror" name="home_province" value="{{ old('home_province') }}" placeholder="Province" required>
                                <input id="home_region" type="text" class="form-control mt-1 @error('home_region') is-invalid @enderror" name="home_region" value="{{ old('home_region') }}" placeholder="Region" required>
                                @error('home_street_address', 'home_barangay', 'home_city_municipality', 'home_province', 'home_region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Religion and Ethnicity -->
                        <div class="form-group row my-2">
                            <label for="religion" class="col-md-4 col-form-label text-md-right">{{ __('10. Religion') }}</label>
                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}">
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="ethnicity" class="col-md-4 col-form-label text-md-right">{{ __('11. Ethnicity') }}</label>
                            <div class="col-md-6">
                                <input id="ethnicity" type="text" class="form-control @error('ethnicity') is-invalid @enderror" name="ethnicity" value="{{ old('ethnicity') }}">
                                @error('ethnicity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nutrition and Services -->
                        <div class="form-group row my-2">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('12. The child underwent the following: (check all applicable and fill details)') }}</label>
                            <div class="col-md-6">

                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" value="1" id="breastfeeding" name="breastfeeding" {{ old('breastfeeding') ? 'checked' : '' }}>
                                        <label for="breastfeeding" class="d-block">{{ __('Breastfeeding') }}</label>
                                    </div>

                                    @error('breastfeeding')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- kind_of_breastfeeding --}}
                                <div class="mt-3">
                                    <div>
                                        <label for="kind_of_breastfeeding" >{{ __('Kind of Breastfeeding') }}</label>

                                        <select id="kind_of_breastfeeding" class="form-control @error('kind_of_breastfeeding') is-invalid @enderror" name="kind_of_breastfeeding" required>
                                            <option value="Exclusive" {{ old('kind_of_breastfeeding') == 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
                                            <option value="Mixed" {{ old('kind_of_breastfeeding') == 'Mixed' ? 'selected' : '' }}>Mixed</option>
                                        </select>
                                    </div>
                                    @error('kind_of_breastfeeding')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- breastfed_for_months --}}
                                <div class="mt-3">
                                    <div>
                                        <label for="breastfed_for_months" >{{ __('Breastfed for Months') }}</label>
                                        <input id="breastfed_for_months" type="number" class="form-control @error('breastfed_for_months') is-invalid @enderror" name="breastfed_for_months" value="{{ old('breastfed_for_months') }}">
                                    </div>
                                    @error('breastfed_for_months')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- supplementary_feeding --}}
                                <div class="mt-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" value="1" id="supplementary_feeding" name="supplementary_feeding" {{ old('supplementary_feeding') ? 'checked' : '' }}>
                                        <label for="supplementary_feeding" >{{ __('Supplementary Feeding') }}</label>
                                    </div>
                                    @error('supplementary_feeding')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label for="supplementary_feeding_for_days">{{ __('Supplementary Feeding for Days') }}</label>
                                    <div>
                                        <input id="supplementary_feeding_for_days" type="number" class="form-control @error('supplementary_feeding_for_days') is-invalid @enderror" name="supplementary_feeding_for_days" value="{{ old('supplementary_feeding_for_days') }}">
                                        @error('supplementary_feeding_for_days')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" value="1" id="has_disability" name="has_disability" {{ old('has_disability') ? 'checked' : '' }}>
                                        <label for="has_disability" >{{ __('Child have Disability/impairment. ') }}</label>
                                    </div>

                                    @error('has_disability')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <div>
                                        <label for="referred_for_assistance" >{{ __('Has the child been referred for assistance/assessment or other services in connection with his/her disability/impairment?') }}</label>

                                        <select id="referred_for_assistance" class="form-control @error('referred_for_assistance') is-invalid @enderror" name="referred_for_assistance">
                                            <option value="No" {{ old('referred_for_assistance') == 'No' ? 'selected' : '' }}>No</option>
                                            <option value="Yes" {{ old('referred_for_assistance') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>

                                    @error('referred_for_assistance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mt-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" value="1" id="listahanan_identified" name="listahanan_identified" {{ old('listahanan_identified') ? 'checked' : '' }}>
                                        <label for="listahanan_identified" >{{ __('Listahanan identified') }}</label>
                                    </div>
                                    @error('listahanan_identified')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mt-3">
                                    <div>
                                        <input type="checkbox" value="1" id="pantawid_beneficiary" name="pantawid_beneficiary" {{ old('pantawid_beneficiary') ? 'checked' : '' }}>
                                        <label for="pantawid_beneficiary">{{ __('Pantawid Benifeciary') }}</label>
                                    </div>
                                    @error('pantawid_beneficiary')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <div>
                                        <label for="household_id">{{ __('Household ID') }}</label>
                                        <input id="household_id" type="number" class="form-control @error('household_id') is-invalid @enderror" name="household_id" value="{{ old('household_id') }}">
                                    </div>
                                    @error('household_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- Disabilities -->
                        <h5>13. The child has the following disabilities/impairments:</h5>
                        <!-- Disabilities -->
                        <div id="disabilities">
                            @error('disabilities')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(old('disabilities'))
                                @foreach(old('disabilities') as $index => $disability)
                                    <div id="disability_div_{{ $index }}">
                                        <div class="form-group row my-2" >
                                            <label for="disability_{{ $index }}" class="col-md-4 col-form-label text-md-right">Disability/Impairment (e.g. hearing, speech, visual)</label>
                                            <div class="col-md-6">
                                                <input id="disability_{{ $index }}" type="text" class="form-control @error('disabilities.'.$index.'.disability') is-invalid @enderror" name="disabilities[{{ $index }}][disability]" value="{{ old('disabilities.'.$index.'.disability') }}">
                                                @error('disabilities.'.$index.'.disability')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="cause_{{ $index }}" class="col-md-4 col-form-label text-md-right">Cause (e.g. inborn, illness)</label>
                                            <div class="col-md-6">
                                                <input id="cause_{{ $index }}" type="text" class="form-control @error('disabilities.'.$index.'.cause') is-invalid @enderror" name="disabilities[{{ $index }}][cause]" value="{{ old('disabilities.'.$index.'.cause') }}">
                                                <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('disability_div_{{ $index }}')">Remove</button>
                                                @error('disabilities.'.$index.'.cause')
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
                                        <label for="disability_0" class="col-md-4 col-form-label text-md-right">Disability/Impairment (e.g. hearing, speech, visual)</label>
                                        <div class="col-md-6">
                                            <input id="disability_0" type="text" class="form-control" name="disabilities[0][disability]">
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="cause_0" class="col-md-4 col-form-label text-md-right">Cause (e.g. inborn, illness)</label>
                                        <div class="col-md-6">
                                            <input id="cause_0" type="text" class="form-control" name="disabilities[0][cause]">
                                            <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('disability_div_0')">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="addDisability()">Add Another Disability</button>

                        <hr>



                        <!-- ECCD Experiences -->
                        <h5>14. The child has the following past ECCD experiences:</h5>
                        <div id="eccd_experiences">
                            @error('eccdExperiences')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(old('eccdExperiences'))
                                @foreach(old('eccdExperiences') as $index => $experience)
                                    <div id="eccdExperiences_div_{{ $index }}">
                                        <div class="form-group row my-2">
                                            <label for="service_type_{{ $index }}" class="col-md-4 col-form-label text-md-right">Service Type (e.g. Center, Community)</label>
                                            <div class="col-md-6">
                                                <input id="service_type_{{ $index }}" type="text" class="form-control @error('eccdExperiences.'.$index.'.service_type') is-invalid @enderror" name="eccdExperiences[{{ $index }}][service_type]" value="{{ old('eccdExperiences.'.$index.'.service_type') }}">
                                                @error('eccdExperiences.'.$index.'.service_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="service_{{ $index }}" class="col-md-4 col-form-label text-md-right">Service (e.g Child Minding, Day Care Mother)</label>
                                            <div class="col-md-6">
                                                <input id="service_{{ $index }}" type="text" class="form-control @error('eccdExperiences.'.$index.'.service') is-invalid @enderror" name="eccdExperiences[{{ $index }}][service]" value="{{ old('eccdExperiences.'.$index.'.service') }}">
                                                @error('eccdExperiences.'.$index.'.service')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="from_date_{{ $index }}" class="col-md-4 col-form-label text-md-right">From (Start Date)</label>
                                            <div class="col-md-6">
                                                <input id="from_date_{{ $index }}" type="date" class="form-control @error('eccdExperiences.'.$index.'.from_date') is-invalid @enderror" name="eccdExperiences[{{ $index }}][from_date]" value="{{ old('eccdExperiences.'.$index.'.from_date') }}">
                                                @error('eccdExperiences.'.$index.'.from_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="to_date_{{ $index }}" class="col-md-4 col-form-label text-md-right">To (End Date)</label>
                                            <div class="col-md-6">
                                                <input id="to_date_{{ $index }}" type="date" class="form-control @error('eccdExperiences.'.$index.'.to_date') is-invalid @enderror" name="eccdExperiences[{{ $index }}][to_date]" value="{{ old('eccdExperiences.'.$index.'.to_date') }}">
                                                <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('eccdExperiences_div_{{ $index }}')">Remove</button>
                                                @error('eccdExperiences.'.$index.'.to_date')
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
                                        <label for="service_type_0" class="col-md-4 col-form-label text-md-right">Service Type (e.g. Center, Community)</label>
                                        <div class="col-md-6">
                                            <input id="service_type_0" type="text" class="form-control" name="eccdExperiences[0][service_type]">
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="service_0" class="col-md-4 col-form-label text-md-right">Service (e.g Child Minding, Day Care Mother)</label>
                                        <div class="col-md-6">
                                            <input id="service_0" type="text" class="form-control" name="eccdExperiences[0][service]">
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="from_date_0" class="col-md-4 col-form-label text-md-right">From (Start Date)</label>
                                        <div class="col-md-6">
                                            <input id="from_date_0" type="date" class="form-control" name="eccdExperiences[0][from_date]">
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="to_date_0" class="col-md-4 col-form-label text-md-right">To (End Date)</label>
                                        <div class="col-md-6">
                                            <input id="to_date_0" type="date" class="form-control" name="eccdExperiences[0][to_date]">
                                            <button class="btn btn-sm btn-danger mt-1" onclick="removeElement('eccdExperiences_div_0')">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="addEccdExperience()">Add Another ECCD Experience</button>


                        <hr>


                        <div class="form-group row my-2">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('15.') }}</label>

                            <div class="col-md-6">

                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" value="1" id="participation_fee_paid" name="participation_fee_paid" {{ old('participation_fee_paid') ? 'checked' : '' }}>
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
                                        <label for="participation_fee_amount" class="d-block mt-3">{{ __('Participation fee amount') }}</label>
                                        <input id="participation_fee_amount" type="number" class="form-control @error('participation_fee_amount') is-invalid @enderror" name="participation_fee_amount" value="{{ old('participation_fee_amount') }}">
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
                                        <select id="parents_counterpart" class="form-control @error('parents_counterpart') is-invalid @enderror" name="parents_counterpart" required>
                                            <option value="Cash" {{ old('parents_counterpart') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                            <option value="In Kind" {{ old('parents_counterpart') == 'In Kind' ? 'selected' : '' }}>In Kind</option>
                                            <option value="None" {{ old('parents_counterpart') == 'None' ? 'selected' : '' }}>None</option>
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



                        <div class="form-group row my-2">
                            <label for="school_year" class="col-md-4 col-form-label text-md-right">{{ __('16. School Year') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="school_year" name="school_year" class="form-control @error('school_year') is-invalid @enderror" value="{{ old('school_year') }}">
                                @error('school_year')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="scheduled_session" class="col-md-4 col-form-label text-md-right">{{ __('17. Scheduled session') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <select id="scheduled_session" class="form-control @error('scheduled_session') is-invalid @enderror" name="scheduled_session" required>
                                    <option value="Morning" {{ old('scheduled_session') == 'Morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="Afternoon" {{ old('scheduled_session') == 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                </select>
                                @error('scheduled_session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row my-2">
                            <label for="attendance_status" class="col-md-4 col-form-label text-md-right">{{ __('18. Attendance status') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <select id="attendance_status" class="form-control @error('attendance_status') is-invalid @enderror" name="attendance_status" required>
                                    <option value="Continuing" {{ old('attendance_status') == 'Continuing' ? 'selected' : '' }}>Continuing</option>
                                    <option value="Dropped Out" {{ old('attendance_status') == 'Dropped Out' ? 'selected' : '' }}>Dropped Out</option>
                                    <option value="Graduated" {{ old('attendance_status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                                </select>
                                @error('attendance_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="mt-3">
                                    <div>
                                        <label for="dropout_reason" >{{ __('If drop out, reason: ') }}</label>
                                        <select id="dropout_reason" class="form-control @error('dropout_reason') is-invalid @enderror" name="dropout_reason" required>
                                            <option selected disabled>Select</option>
                                            <option value="Illness" {{ old('dropout_reason') == 'Illness' ? 'selected' : '' }}>Illness</option>
                                            <option value="Transfer of Residence" {{ old('dropout_reason') == 'Transfer of Residence' ? 'selected' : '' }}>Transfer of Residence</option>
                                            <option value="Others" {{ old('dropout_reason') == 'Others' ? 'selected' : '' }}>Others</option>
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
                                        <input id="dropout_reason_others" type="text" class="form-control @error('dropout_reason_others') is-invalid @enderror" name="dropout_reason_others" value="{{ old('dropout_reason_others') }}">
                                    </div>

                                    @error('dropout_reason_others')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row my-2">
                            <label for="accomplished_by" class="col-md-4 col-form-label text-md-right">{{ __('Accomplished by') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="accomplished_by" type="text" class="form-control @error('accomplished_by') is-invalid @enderror" name="accomplished_by" value="{{ old('accomplished_by') }}">
                                @error('dropout_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="name_of_eccd_service_provider" class="col-md-4 col-form-label text-md-right">{{ __('Name of ECCD Service Provider') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="name_of_eccd_service_provider" type="text" class="form-control @error('name_of_eccd_service_provider') is-invalid @enderror" name="name_of_eccd_service_provider" value="{{ old('name_of_eccd_service_provider') }}">
                                @error('dropout_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="date_accomplished" class="col-md-4 col-form-label text-md-right">{{ __('Date accomplished') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="date_accomplished" type="date" class="form-control @error('date_accomplished') is-invalid @enderror" name="date_accomplished" value="{{ old('date_accomplished') }}">
                                @error('dropout_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="encoder_id" class="col-md-4 col-form-label text-md-right">{{ __('Encoder ID') }} <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-6">
                                <input id="encoder_id" type="text" class="form-control @error('encoder_id') is-invalid @enderror" name="encoder_id" value="{{ old('encoder_id') }}">
                                @error('dropout_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <!-- Submit Button -->
                        <div class="form-group row my-2">
                            <div class="col-md-8 offset-md-4">
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
                        <input id="disability_${disabilityIndex}" type="text" class="form-control" name="disabilities[${disabilityIndex}][disability]">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="cause_${disabilityIndex}" class="col-md-4 col-form-label text-md-right">Cause (e.g. inborn, illness)</label>
                    <div class="col-md-6">
                        <input id="cause_${disabilityIndex}" type="text" class="form-control" name="disabilities[${disabilityIndex}][cause]">
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
                        <input id="service_type_${eccdExperienceIndex}" type="text" class="form-control" name="eccdExperiences[${eccdExperienceIndex}][service_type]">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="service_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">Service (e.g Child Minding, Day Care Mother)</label>
                    <div class="col-md-6">
                        <input id="service_${eccdExperienceIndex}" type="text" class="form-control" name="eccdExperiences[${eccdExperienceIndex}][service]">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="from_date_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">From (Start Date)</label>
                    <div class="col-md-6">
                        <input id="from_date_${eccdExperienceIndex}" type="date" class="form-control" name="eccdExperiences[${eccdExperienceIndex}][from_date]">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="to_date_${eccdExperienceIndex}" class="col-md-4 col-form-label text-md-right">To (End Date)</label>
                    <div class="col-md-6">
                        <input id="to_date_${eccdExperienceIndex}" type="date" class="form-control" name="eccdExperiences[${eccdExperienceIndex}][to_date]">
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
