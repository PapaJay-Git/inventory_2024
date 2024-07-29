@extends('layouts.app')

@section('title')
    Create DAFAC Record
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="mx-1 fw-bold">CREATE DAFAC RECORD</span>
                        <a href="{{ route('dafacs.index') }}" class="btn btn-primary btn-sm fw-bold">
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


                        <form action="{{ route('dafacs.store') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to create this record?')">
                            @csrf
                            @method('POST')

                            <div class="row row-gap-3">

                                <!-- Serial Number -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="serial_no">{{ __('Serial Number') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="serial_no" type="text"
                                        class="form-control  @error('serial_no') is-invalid @enderror" name="serial_no"
                                        value="{{ old('serial_no') }}" required placeholder="Serial Number">
                                    @error('serial_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    {{--  --}}
                                </div>

                                <div class="col-12">
                                    <label>{{ __('Address') }} <span class="text-danger fw-bold">*</span></label>
                                    <div class="row row-gap-2">
                                        @foreach (config('app.dafac_address') as $field)
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div style="position: relative">
                                                    <span style="position: absolute; top: -7px; left: 1px; font-size: 10px;"
                                                        class="bg-light px-1">
                                                        {{ ucwords(str_replace('_', ' ', $field)) }}
                                                    </span>
                                                    <input id="{{ $field }}" type="text"
                                                        name="{{ $field }}" value="{{ old($field) }}"
                                                        class="form-control p-2 mt-1 @error($field) is-invalid @enderror"
                                                        required>
                                                </div>

                                                @error($field)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-9">
                                    <label>{{ __('Head of the Family') }} <span
                                            class="text-danger fw-bold">*</span></label>
                                    <div class="row row-gap-2">
                                        @foreach (config('app.head_of_the_family') as $field)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div style="position: relative">
                                                    <span style="position: absolute; top: -7px; left: 1px; font-size: 10px;"
                                                        class="bg-light px-1">
                                                        {{ ucwords(str_replace('_', ' ', $field)) }}
                                                    </span>
                                                    <input id="{{ $field }}" type="text"
                                                        name="{{ $field }}" value="{{ old($field) }}"
                                                        class="form-control p-2 mt-1 @error($field) is-invalid @enderror"
                                                        required>
                                                </div>

                                                @error($field)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="sex">{{ __('Sex') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <select id="sex" class="form-control @error('sex') is-invalid @enderror"
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

                                <div class="col-12 col-md-4 col-lg-3">
                                    <label for="age">{{ __('Age') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <input id="age" type="number"
                                        class="form-control  @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" required>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

                                <!-- Occupation -->
                                <div class="col-md-6 col-lg-3">
                                    <label for="occupation">{{ __('Occupation') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <select id="occupation" class="form-control @error('occupation') is-invalid @enderror"
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
                                </div>


                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="col-12">
                                        <label for="monthly_net_income">{{ __('Monthly Net Income') }}
                                            <span class="text-danger fw-bold">*</span></label>
                                        <div>
                                            <input id="monthly_net_income" type="number"
                                                class="form-control  @error('monthly_net_income') is-invalid @enderror"
                                                name="monthly_net_income" value="{{ old('monthly_net_income') }}"
                                                required>
                                            @error('monthly_net_income')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="is_4ps_beneficiary" class="d-block">{{ __('4Ps Beneficiary') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <select name="is_4ps_beneficiary" id="is_4ps_beneficiary"
                                        class="form-control  @error('monthly_net_income') is-invalid @enderror">
                                        <option value="1" {{ old('is_4ps_beneficiary') ? 'selected' : '' }}>YES
                                        </option>
                                        <option value="0" {{ old('is_4ps_beneficiary') ? 'selected' : '' }}>NO
                                        </option>
                                    </select>

                                    @error('is_4ps_beneficiary')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="is_indigenous_people" class="d-block">{{ __('Idigenous People') }}
                                        <span class="text-danger fw-bold">*</span></label>
                                    <select name="is_indigenous_people" id="is_indigenous_people"
                                        class="form-control  @error('monthly_net_income') is-invalid @enderror">
                                        <option value="1" {{ old('is_indigenous_people') ? 'selected' : '' }}>YES
                                        </option>
                                        <option value="0" {{ old('is_indigenous_people') ? 'selected' : '' }}>NO
                                        </option>
                                    </select>

                                    @error('is_indigenous_people')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="type_of_ethnicity">{{ __('Ethnicity') }}</label>
                                    <div>
                                        <input id="type_of_ethnicity" type="text"
                                            class="form-control  @error('type_of_ethnicity') is-invalid @enderror"
                                            name="type_of_ethnicity" value="{{ old('type_of_ethnicity') }}"
                                            placeholder="Leave blank if not IP">
                                        @error('type_of_ethnicity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div class="col-12">
                                    <h5>Family Members</h5>
                                </div>

                                <div class="col-12">
                                    <div id="family_members">
                                        @error('family_members')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @foreach (old('family_members') ?? [] as $index => $family_member)
                                            <div class="row mb-2 row-gap-2 pb-2"
                                                id="family_members_div_{{ $index }}"
                                                style="border-bottom: 1px solid rgb(169, 155, 155)">

                                                <div class="col-md-4 col-lg-4">
                                                    <label for="family_member_name_{{ $index }}">
                                                        Member Full Name
                                                    </label>
                                                    <div>
                                                        <input id="family_member_name_{{ $index }}" type="text"
                                                            class="form-control  @error('family_members.' . $index . '.family_member_name') is-invalid @enderror"
                                                            name="family_members[{{ $index }}][family_member_name]"
                                                            value="{{ old('family_members.' . $index . '.family_member_name') }}">
                                                        @error('family_members.' . $index . '.family_member_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-3">
                                                    <label for="relationship_to_head_{{ $index }}">
                                                        Relationship to the Head
                                                    </label>
                                                    <div>
                                                        <input id="relationship_to_head_{{ $index }}"
                                                            type="text"
                                                            class="form-control  @error('family_members.' . $index . '.relationship_to_head') is-invalid @enderror"
                                                            name="family_members[{{ $index }}][relationship_to_head]"
                                                            value="{{ old('family_members.' . $index . '.relationship_to_head') }}">
                                                        @error('family_members.' . $index . '.relationship_to_head')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-3">
                                                    <label for="age_{{ $index }}">
                                                        Age
                                                    </label>
                                                    <input id="age_{{ $index }}" type="number"
                                                        class="form-control  @error('family_members.' . $index . '.age') is-invalid @enderror"
                                                        name="family_members[{{ $index }}][age]"
                                                        value="{{ old('family_members.' . $index . '.age') }}">
                                                    @error('family_members.' . $index . '.age')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 col-lg-3">
                                                    <label for="gender_{{ $index }}">{{ __('Gender') }}
                                                        <span class="text-danger fw-bold">*</span>
                                                    </label>
                                                    <select id="gender_{{ $index }}"
                                                        class="form-control  @error('family_members.' . $index . '.gender') is-invalid @enderror"
                                                        name="family_members[{{ $index }}][gender]" required>
                                                        <option value="Male"
                                                            {{ old('family_members.' . $index . '.gender') == 'Male' ? 'selected' : '' }}>
                                                            {{ 'Male' }}
                                                        </option>
                                                        <option value="Female"
                                                            {{ old('family_members.' . $index . '.gender') == 'Female' ? 'selected' : '' }}>
                                                            {{ 'Female' }}
                                                        </option>
                                                    </select>
                                                    @error('family_members.' . $index . '.gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4 col-lg-3">
                                                    <label for="education_{{ $index }}">
                                                        Education
                                                    </label>
                                                    <div>
                                                        <input id="education_{{ $index }}" type="text"
                                                            class="form-control  @error('family_members.' . $index . '.education') is-invalid @enderror"
                                                            name="family_members[{{ $index }}][education]"
                                                            value="{{ old('family_members.' . $index . '.education') }}">
                                                        @error('family_members.' . $index . '.education')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-3">
                                                    <label for="occupational_skills_{{ $index }}">
                                                        Occupational Skills
                                                    </label>
                                                    <div>
                                                        <input id="occupational_skills_{{ $index }}"
                                                            type="text"
                                                            class="form-control  @error('family_members.' . $index . '.occupational_skills') is-invalid @enderror"
                                                            name="family_members[{{ $index }}][occupational_skills]"
                                                            value="{{ old('family_members.' . $index . '.occupational_skills') }}">
                                                        @error('family_members.' . $index . '.occupational_skills')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="remarks_{{ $index }}">
                                                        Remarks
                                                    </label>
                                                    <div>
                                                        <textarea name="family_members[{{ $index }}][remarks]" id="remarks_{{ $index }}"
                                                            class="form-control  @error('family_members.' . $index . '.remarks') is-invalid @enderror">{{ old('family_members.' . $index . '.remarks') }}</textarea>
                                                        @error('family_members.' . $index . '.remarks')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger mt-1"
                                                        onclick="removeElement('family_members_div_{{ $index }}')">Remove</button>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="addFamilyMember()">Add
                                        Family Member</button>

                                </div>
                                <hr>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="housing_type">{{ __('Housing type') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <select id="housing_type"
                                        class="form-control @error('housing_type') is-invalid @enderror"
                                        name="housing_type" required>
                                        @foreach (config('app.housing_type') as $housing_type)
                                            <option value="{{ $housing_type }}"
                                                {{ old('housing_type') == $housing_type ? 'selected' : '' }}>
                                                {{ $housing_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('housing_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="code">{{ __('Code') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <select id="code" class="form-control @error('code') is-invalid @enderror"
                                        name="code" required>
                                        @foreach (config('app.code') as $code)
                                            <option value="{{ $code }}"
                                                {{ old('code') == $code ? 'selected' : '' }}>
                                                {{ $code }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="housing_condition">{{ __('Housing condition') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <select id="housing_condition"
                                        class="form-control @error('housing_condition') is-invalid @enderror"
                                        name="housing_condition" required>
                                        @foreach (config('app.housing_condition') as $housing_condition)
                                            <option value="{{ $housing_condition }}"
                                                {{ old('housing_condition') == $housing_condition ? 'selected' : '' }}>
                                                {{ $housing_condition }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('housing_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <label for="health_condition">{{ __('Health condition') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <select id="health_condition"
                                        class="form-control @error('health_condition') is-invalid @enderror"
                                        name="health_condition" required>
                                        @foreach (config('app.health_condition') as $health_condition)
                                            <option value="{{ $health_condition }}"
                                                {{ old('health_condition') == $health_condition ? 'selected' : '' }}>
                                                {{ $health_condition }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('health_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Name Of brg captain -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="name_of_brg_captain">{{ __('Name of Barangay Captain') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="name_of_brg_captain" type="text"
                                        class="form-control  @error('name_of_brg_captain') is-invalid @enderror"
                                        name="name_of_brg_captain" value="{{ old('name_of_brg_captain') }}"
                                        placeholder="Serial Number">
                                    @error('name_of_brg_captain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- date_registered -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="date_registered">{{ __('Date Registered') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="date_registered" type="date"
                                        class="form-control  @error('date_registered') is-invalid @enderror"
                                        name="date_registered" value="{{ old('date_registered') }}"
                                        placeholder="Serial Number">
                                    @error('date_registered')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- name_of_lswdo -->
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label for="name_of_lswdo">{{ __('Name of LSWDO') }}
                                        <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input id="name_of_lswdo" type="text"
                                        class="form-control  @error('name_of_lswdo') is-invalid @enderror"
                                        name="name_of_lswdo" value="{{ old('name_of_lswdo') }}"
                                        placeholder="Serial Number">
                                    @error('name_of_lswdo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

        let familyMemberIndex = {{ old('family_members') ? count(old('family_members')) : 1 }};

        function addFamilyMember() {
            const container = document.getElementById('family_members');
            const template = `
                <div class="row mb-2 row-gap-2 pb-2" id="family_members_div_${familyMemberIndex}" style="border-bottom: 1px solid rgb(169, 155, 155)">
                    <div class="col-md-4 col-lg-4">
                        <label for="family_member_name_${familyMemberIndex}">
                            Member Full Name
                        </label>
                        <div>
                            <input id="family_member_name_${familyMemberIndex}" type="text"
                                class="form-control"
                                name="family_members[${familyMemberIndex}][family_member_name]"
                                value="">
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <label for="relationship_to_head_${familyMemberIndex}">
                            Relationship to the Head
                        </label>
                        <div>
                            <input id="relationship_to_head_${familyMemberIndex}"
                                type="text"
                                class="form-control"
                                name="family_members[${familyMemberIndex}][relationship_to_head]"
                                value="">
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <label for="age_${familyMemberIndex}">
                            Age
                        </label>
                        <input id="age_${familyMemberIndex}" type="number"
                            class="form-control"
                            name="family_members[${familyMemberIndex}][age]"
                            value="">
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <label for="gender_${familyMemberIndex}">{{ __('Gender') }}
                            <span class="text-danger fw-bold">*</span>
                        </label>
                        <select id="gender_${familyMemberIndex}"
                            class="form-control"
                            name="family_members[${familyMemberIndex}][gender]" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <label for="education_${familyMemberIndex}">
                            Education
                        </label>
                        <div>
                            <input id="education_${familyMemberIndex}" type="text"
                                class="form-control"
                                name="family_members[${familyMemberIndex}][education]"
                                value="">
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <label for="occupational_skills_${familyMemberIndex}">
                            Occupational Skills
                        </label>
                        <div>
                            <input id="occupational_skills_${familyMemberIndex}"
                                type="text"
                                class="form-control"
                                name="family_members[${familyMemberIndex}][occupational_skills]"
                                value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="remarks_${familyMemberIndex}">
                            Remarks
                        </label>
                        <div>
                            <textarea name="family_members[${familyMemberIndex}][remarks]" id="remarks_${familyMemberIndex}"
                                class="form-control"></textarea>
                        </div>
                    </div>

                    <div>
                        <button type="button" class="btn btn-sm btn-danger mt-1"
                            onclick="removeElement('family_members_div_${familyMemberIndex}')">Remove</button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', template);
            familyMemberIndex++;
        }

        function removeElement(id) {
            var element = document.getElementById(id);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
