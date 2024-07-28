<div class="row mb-2 row-gap-2 pb-2" id="householdCompositions_div_0" style="border-bottom: 1px solid rgb(169, 155, 155)">
    <div class="col-md-4 col-lg-4">
        <label for="full_name_0">
            Full Name
        </label>
        <div>
            <input id="full_name_0" type="text" class="form-control" name="householdCompositions[0][full_name]" </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <label for="sex_0">{{ __('Sex') }}
            <span class="text-danger fw-bold">*</span>
        </label>
        <select id="sex_0" class="form-control" name="householdCompositions[0][sex]" required>
            @foreach (config('app.sex') as $sex)
                <option value="{{ $sex }}">
                    {{ $sex }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-2">
        <label for="relationship_0">
            Relationship
        </label>
        <div>
            <input id="relationship_0" type="text" class="form-control"
                name="householdCompositions[0][relationship]">
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <label for="age_0">
            Age
        </label>
        <div>
            <input id="age_0" type="number" class="form-control" name="householdCompositions[0][age]">
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <label for="birthdate_0">
            Birthday
        </label>
        <div>
            <input id="birthdate_0" type="date" class="form-control" name="householdCompositions[0][birthdate]">
        </div>
    </div>
    {{-- Civil Status --}}
    <div class="col-md-4 col-lg-3">
        <label for="civil_status_0">{{ __('Civil Status') }}
            <span class="text-danger fw-bold">*</span></label>
        <div>
            <select id="civil_status_0" class="form-control" name="householdCompositions[0][civil_status]" required>
                @foreach (config('app.civil_status') as $civil_statusField)
                    <option value="{{ $civil_statusField }}">
                        {{ $civil_statusField }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Educational Attainment -->
    <div class="col-md-4 col-lg-3">
        <label for="educational_attainment_0">{{ __('Educational Attainment') }}
            <select id="educational_attainment_0" class="form-control"
                name="householdCompositions[0][educational_attainment]" required>
                @foreach (config('app.educational_attainment') as $educational_attainmentField)
                    <option value="{{ $educational_attainmentField }}">
                        {{ $educational_attainmentField }}
                    </option>
                @endforeach
            </select>
    </div>

    <!-- Occupation -->
    <div class="col-md-4 col-lg-3">
        <label for="occupation_0">{{ __('Occupation') }}
            <span class="text-danger fw-bold">*</span></label>
        <select id="occupation_0" class="form-control" name="householdCompositions[0][occupation]" required>
            @foreach (config('app.occupation') as $occupationField)
                <option value="{{ $occupationField }}">
                    {{ $occupationField }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Monthly Income -->
    <div class="col-12 col-md-4 col-lg-3">
        <label for="monthly_income_0">{{ __('Monthly Income') }}</label>
        <div>
            <input id="monthly_income_0" type="number" class="form-control"
                name="householdCompositions[0][monthly_income]">
        </div>
    </div>


    <div>
        <button class="btn btn-sm btn-danger mt-1"
            onclick="removeElement('householdCompositions_div_0')">Remove</button>
    </div>

</div>
