<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PWD PDF</title>
    <style>
        /* .min-w-full {
                min-width: 100%;
        } */

        table {
            width: 100%;
            max-width: 8.5in;
            /* Set the maximum width to 8.5 inches for letter size paper */
            border-collapse: collapse;
        }

        .font-mono {
            font-family: monospace;
        }

        .mt-1 {
            margin-top: 3px;
        }

        .mt-2 {
            margin-top: 6px;
        }

        .mt-3 {
            margin-top: 9px;
        }

        .mt-4 {
            margin-top: 12px;
        }

        .mt-5 {
            margin-top: 15px;
        }

        .mt-20px {
            margin-top: 20px;
        }

        .pb-1 {
            padding-bottom: 3px;
        }

        .pb-2 {
            padding-bottom: 6px;
        }

        .d-inline-block {
            display: inline-block;
        }

        .px-3 {
            padding: 0 3px;
        }

        .item {
            display: inline-block;
            /* Make items inline-block to respect text-align */
            vertical-align: middle;
            /* Center items vertically */
            line-height: normal;
            /* Reset line-height to avoid extra spacing */
        }


        .inline-block {
            display: inline-block;
        }



        /* Font Weight */
        .font-bold {
            font-weight: bold;
        }

        /* Text Alignment */
        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
            left: 0;
        }

        /* Column Span */
        .col-span-2 {
            column-span: 2;
        }

        /* Border */
        .border-2 {
            border-width: 2px;
            border-style: solid;
        }

        .border-1 {
            border-width: 1px;
            border-style: solid;
        }

        .border-black {
            border-color: #000;
            /* black color */
        }

        /* Background Color */
        .bg-gray-200 {
            background-color: #e2e8f0;
        }

        /* Border Bottom */
        .border-b-2 {
            border-width: 0;
            border-bottom-width: 2px;
            border-style: solid;
        }

        /* White Space */
        .whitespace-nowrap {
            white-space: nowrap;
        }

        .whitespace-wrap {
            white-space: wrap;
        }

        .text-2xl {
            font-size: 1.11rem;
        }

        .text-xl {
            font-size: .91rem;
        }

        .text-md {
            font-size: .81rem;
        }

        .text-sm {
            font-size: .71rem;
        }

        /* Font Size */
        .text-xs {
            font-size: .61rem;
        }

        @page {
            size: 8.5in 11in;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            border-collapse: collapse;
        }

        .container td {
            border: 1px solid black;
            padding: 1px;
            vertical-align: top;
        }

        .text-end {
            text-align: right;
        }

        .text-start {
            text-align: left;
        }

        input[type="radio"],
        input[type="checkbox"] {
            transform: scale(.5);
            height: .8rem;
        }

        input[type="text"] {
            height: .45rem;
            width: 94%;
            font-size: 0.55rem;
            box-sizing: border-box;
            display: block;
            border: 0px;
            overflow: hidden;
            white-space: wrap;
        }

        .pe-1 {
            padding-left: 5px;
        }

        td {
            overflow: hidden !important;
            /* Hide overflow content */
        }
    </style>
</head>

<body>
    <table class="font-mono whitespace-wrap">
        <thead class="pb-4">
            <tr>
                {{-- 1 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 2 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 3 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 4 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 5 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 6 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 7 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 8 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 9 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 10 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 11 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>
                {{-- 12 --}}
                <th colspan="1" style="min-width: 60px; max-width: 60px"></th>

            </tr>
            <tr>
                <th class="px-1 font-bold text-center" colspan="12">
                    <img src="{{ $base64Logo }}" style="height: 60px; width: 60px" class="inline-block">
                    <div class="inline-block">
                        <span class="text-2xl">DEPARTMENT OF HEALTH</span><br>
                        <span class="text-xl">Philippine Registry for persons with Disabilities Version 4.0</span><br>
                        <span class="text-2xl">Application Form</span>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody class="container">
            <tr>
                <td colspan="10" class="font-bold text-sm">
                    <span>1.</span>

                    <input type="radio" name="application_type" value="new"
                        {{ $pwd->application_type == 'New' ? 'checked' : '' }}>
                    <label>New Applicant</label>

                    <input type="radio" name="application_type" value="renewal"
                        {{ $pwd->application_type == 'Renewal' ? 'checked' : '' }}>
                    <label>Renewal</label>
                </td>
                <td colspan="2" class="text-xs text-center">
                    Place 1"x"1 <br>Photo Here
                </td>
            </tr>


            <tr>
                <td colspan="6">
                    <label class="font-bold text-sm">2. PERSON WITH DISABILITY NUMBER (RA-PPMM-BBB-NNNNNNN)</label>
                    <input type="text" value="{{ $pwd->disability_number }}">
                </td>
                <td colspan="4">
                    <label class="font-bold text-sm">3. DATE APPLIED: (mm/dd/yyyy)</label>
                    <input type="text" value="{{ \Carbon\Carbon::parse($pwd->date_applied)->format('m/d/Y') }}">
                </td>
                <td colspan="2" rowspan="3" class="text-center">
                    <div style="width: 75px; height: 75px; margin: auto">
                        <img src="{{ $pwd_photo }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="10" class="font-bold text-sm">
                    <label>4. PERSONAL INFORMATION</label>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <label class="font-bold text-sm">LAST NAME</label>
                    <input type="text" value="{{ $pwd->last_name }}">
                </td>
                <td colspan="3">
                    <label class="font-bold text-sm">FIRST NAME</label>
                    <input type="text" value="{{ $pwd->first_name }}">
                </td>
                <td colspan="2">
                    <label class="font-bold text-sm">MIDDLE NAME</label>
                    <input type="text" value="{{ $pwd->middle_name }}">
                </td>
                <td colspan="2">
                    <label class="font-bold text-sm">SUFFIX</label>
                    <input type="text" value="{{ $pwd->suffix }}">
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label class="font-bold text-sm">5. DATE OF BIRTH: (mm/dd/yyyy)</label>
                    <input type="text" value="{{ \Carbon\Carbon::parse($pwd->date_of_birth)->format('m/d/Y') }}">
                </td>
                <td colspan="6" class="text-sm">
                    <label class="font-bold">6. SEX: </label><br>
                    <input type="radio" {{ $pwd->sex == 'Male' ? 'checked' : '' }}> MALE
                    <input type="radio" {{ $pwd->sex == 'Female' ? 'checked' : '' }}> FEMALE
                </td>
            </tr>
            <tr>
                <td colspan="12" class="text-sm">
                    <label class="font-bold">7. CIVIL STATUS:</label><br>
                    @foreach (config('app.civil_status') as $cvs)
                        <input type="radio" {{ $pwd->civil_status == $cvs ? 'checked' : '' }}>{{ $cvs }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-sm">
                    <label class="font-bold">8. TYPE OF DISABILITY:</label>
                </td>
                <td colspan="6" class="text-sm">
                    <label class="font-bold">9. CAUSE OF DISABILITY:</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-xs">
                    @foreach (config('app.type_of_disabilities') as $index => $field)
                        @if ($index < 5)
                            <input type="checkbox"
                                {{ in_array($field, json_decode($pwd->type_of_disabilities, true) ?? []) ? 'checked' : '' }}>
                            {{ $field }}<br>
                        @endif
                    @endforeach
                </td>
                <td colspan="3" class="text-xs">
                    @foreach (config('app.type_of_disabilities') as $index => $field)
                        @if ($index >= 5)
                            <input type="checkbox"
                                {{ in_array($field, json_decode($pwd->type_of_disabilities, true) ?? []) ? 'checked' : '' }}>
                            {{ $field }}<br>
                        @endif
                    @endforeach
                </td>

                <td colspan="3" class="text-xs">
                    <input type="checkbox"> <span class="font-bold">Congenital/Inborn</span><br>
                    @foreach (config('app.cause_of_disability') as $field)
                        @if (str_contains($field, '(Acquired)'))
                            <input type="checkbox" {{ $pwd->cause_of_disability == $field ? 'checked' : '' }}>
                            {{ str_replace('(Acquired)', '', $field) }}</br>
                        @endif
                    @endforeach
                    <input type="text"
                        value="{{ str_contains($pwd->cause_of_disability, '(Acquired)') ? $pwd->cause_of_disability_others : '' }}">
                </td>
                <td colspan="3" class="text-xs">
                    <input type="checkbox"> <span class="font-bold">Acquired</span><br>
                    @foreach (config('app.cause_of_disability') as $field)
                        @if (str_contains($field, '(Congenital/Inborn)'))
                            <input type="checkbox" {{ $pwd->cause_of_disability == $field ? 'checked' : '' }}>
                            {{ str_replace('(Congenital/Inborn)', '', $field) }}</br>
                        @endif
                    @endforeach
                    <input type="text"
                        value="{{ str_contains($pwd->cause_of_disability, '(Congenital/Inborn)') ? $pwd->cause_of_disability_others : '' }}">
                </td>
            </tr>
            <tr>
                <td colspan="12" class="font-bold text-sm">
                    <label>10. RESIDENCE ADDRESS</label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label class="font-bold text-sm">House No. and Street</label>
                    <input type="text" value="{{ $pwd->house_no_street }}">
                </td>
                <td colspan="2">
                    <label class="font-bold text-sm">Barangay</label>
                    <input type="text" value="{{ $pwd->barangay }}">
                </td>
                <td colspan="2">
                    <label class="font-bold text-sm">Municipality/City</label>
                    <input type="text" value="{{ $pwd->municipality }}">
                </td>
                <td colspan="3">
                    <label class="font-bold text-sm">Province</label>
                    <input type="text" value="{{ $pwd->province }}">
                </td>
                <td colspan="2">
                    <label class="font-bold text-sm">Region</label>
                    <input type="text" value="{{ $pwd->region }}">
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <label class="font-bold text-sm"> 11. CONTACT DETAILS</label>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <label class="font-bold text-sm">Landline No.</label>
                    <input type="text" value="{{ $pwd->landline_no }}">
                </td>
                <td colspan="3">
                    <label class="font-bold text-sm">Mobile No.</label>
                    <input type="text" value="{{ $pwd->mobile_no }}">
                </td>
                <td colspan="5">
                    <label class="font-bold text-sm">E-mail Address</label>
                    <input type="text" value="{{ $pwd->email_address }}">
                </td>
            </tr>

            <tr>
                <td colspan="7" class="text-sm">
                    <label class="font-bold">12. EDUCATIONAL ATTAINMENT:</label>
                </td>
                <td colspan="5"class="text-sm">
                    <label class="font-bold">14. OCCUPATION:</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-xs">
                    <input type="radio" name="educational_attainment" value="None"
                        {{ $pwd->educational_attainment == 'None' ? 'checked' : '' }}> None<br>
                    <input type="radio" name="educational_attainment" value="Kindergarten"
                        {{ $pwd->educational_attainment == 'Kindergarten' ? 'checked' : '' }}> Kindergarten<br>
                    <input type="radio" name="educational_attainment" value="Elementary"
                        {{ $pwd->educational_attainment == 'Elementary' ? 'checked' : '' }}> Elementary<br>
                    <input type="radio" name="educational_attainment" value="Junior High School"
                        {{ $pwd->educational_attainment == 'Junior High School' ? 'checked' : '' }}> Junior High
                    School<br>
                </td>
                <td colspan="4" class="text-xs">
                    <input type="radio" name="educational_attainment" value="Senior High School"
                        {{ $pwd->educational_attainment == 'Senior High School' ? 'checked' : '' }}> Senior High
                    School<br>
                    <input type="radio" name="educational_attainment" value="College"
                        {{ $pwd->educational_attainment == 'College' ? 'checked' : '' }}> College<br>
                    <input type="radio" name="educational_attainment" value="Vocational"
                        {{ $pwd->educational_attainment == 'Vocational' ? 'checked' : '' }}> Vocational<br>
                    <input type="radio" name="educational_attainment" value="Post Graduate"
                        {{ $pwd->educational_attainment == 'Post Graduate' ? 'checked' : '' }}> Post Graduate<br>
                </td>
                <td colspan="5" rowspan="3" class="text-xs">
                    @foreach (config('app.occupation') as $field)
                        <div>
                            <input type="radio"
                                {{ $pwd->occupation == $field ? 'checked' : '' }}>{{ $field }}
                        </div>
                    @endforeach
                    <div><input type="text" value="{{ $pwd->occupation_others }}"></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-xs">
                    <label class="font-bold">13. STATUS OF EMPLOYMENT:</label>
                    <div>
                        @foreach (config('app.status_of_employment') as $field)
                            <div>
                                <input type="radio" {{ $pwd->status_of_employment == $field ? 'checked' : '' }}>
                                {{ $field }}
                            </div>
                        @endforeach
                    </div>
                </td>

                <td colspan="4" rowspan="2" class="text-xs">
                    <label class="font-bold">13 b. TYPES OF EMPLOYMENT:</label>
                    <div>
                        @foreach (config('app.types_of_employment') as $field)
                            <div>
                                <input type="radio" {{ $pwd->types_of_employment == $field ? 'checked' : '' }}>
                                {{ $field }}
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-xs">
                    <label class="font-bold">13 a. CATEGORY OF EMPLOYMENT:</label>
                    <div>
                        <div>
                            <input type="radio" {{ $pwd->category_of_employment == 'Government' ? 'checked' : '' }}>
                            Government
                        </div>
                        <div>
                            <input type="radio" {{ $pwd->category_of_employment == 'Private' ? 'checked' : '' }}>
                            Private
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="12" class="font-bold text-sm">
                    <label>15. ORGANIZATION INFORMATION:</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>Organization Affiliated:</label>
                    <input type="text" value="{{ $pwd->organization_affiliated }}">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Contact Person:</label>
                    <input type="text" value="{{ $pwd->contact_person }}">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Office Address:</label>
                    <input type="text" value="{{ $pwd->office_address }}">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Tel. Nos.:</label>
                    <input type="text" value="{{ $pwd->office_tel_no }}">
                </td>
            </tr>
            <tr>
                <td colspan="12" class="font-bold text-sm">
                    <label>16. ID REFERENCE NO.:</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="font-bold text-sm">
                    <label>SSS NO.:</label>
                    <input type="text" value="{{ $pwd->sss_no }}">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>GSIS NO.:</label>
                    <input type="text" value="{{ $pwd->gsis_no }}">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>PAG-IBIG NO.:</label>
                    <input type="text" value="{{ $pwd->pagibig_no }}">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>PSN NO.:</label>
                    <input type="text" value="{{ $pwd->psn_no }}">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>PhilHealth NO.:</label>
                    <input type="text" value="{{ $pwd->philhealth_no }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>17. FAMILY BACKGROUND:</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>LAST NAME</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>FIRST NAME</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>MIDDLE NAME</label>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>FATHER'S NAME:</label>
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->father_last_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->father_first_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->father_middle_name }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>MOTHER'S NAME:</label>
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->mother_last_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->mother_first_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->mother_middle_name }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>GUARDIAN'S NAME :</label>
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->guardian_last_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->guardian_first_name }}">
                </td>
                <td colspan="3">
                    <input type="text" value="{{ $pwd->guardian_middle_name }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>18. ACCOMPLISHED BY:</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>LAST NAME</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>FIRST NAME</label>
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>MIDDLE NAME</label>
                </td>
            </tr>

            <!-- Applicant Row -->
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio" name="accomplished_by" value="Applicant"
                        {{ $pwd->accomplished_by == 'Applicant' ? 'checked' : '' }}>
                    <label>Applicant</label>
                </td>
                <td colspan="3">
                    <input type="text" name="applicant_last_name"
                        value="{{ $pwd->accomplished_by == 'Applicant' ? $pwd->accomplished_by_last_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="applicant_first_name"
                        value="{{ $pwd->accomplished_by == 'Applicant' ? $pwd->accomplished_by_first_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="applicant_middle_name"
                        value="{{ $pwd->accomplished_by == 'Applicant' ? $pwd->accomplished_by_middle_name : '' }}">
                </td>
            </tr>

            <!-- Guardian Row -->
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio" name="accomplished_by" value="Guardian"
                        {{ $pwd->accomplished_by == 'Guardian' ? 'checked' : '' }}>
                    <label>Guardian</label>
                </td>
                <td colspan="3">
                    <input type="text" name="guardian_last_name"
                        value="{{ $pwd->accomplished_by == 'Guardian' ? $pwd->accomplished_by_last_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="guardian_first_name"
                        value="{{ $pwd->accomplished_by == 'Guardian' ? $pwd->accomplished_by_first_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="guardian_middle_name"
                        value="{{ $pwd->accomplished_by == 'Guardian' ? $pwd->accomplished_by_middle_name : '' }}">
                </td>
            </tr>

            <!-- Representative Row -->
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio" name="accomplished_by" value="Representative"
                        {{ $pwd->accomplished_by == 'Representative' ? 'checked' : '' }}>
                    <label>Representative</label>
                </td>
                <td colspan="3">
                    <input type="text" name="representative_last_name"
                        value="{{ $pwd->accomplished_by == 'Representative' ? $pwd->accomplished_by_last_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="representative_first_name"
                        value="{{ $pwd->accomplished_by == 'Representative' ? $pwd->accomplished_by_first_name : '' }}">
                </td>
                <td colspan="3">
                    <input type="text" name="representative_middle_name"
                        value="{{ $pwd->accomplished_by == 'Representative' ? $pwd->accomplished_by_middle_name : '' }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>19. NAME OF CERTIFYING PHYSICIAN:</label><br>
                    <label>LICENSE NO.:</label>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->name_of_certifying_physician }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>20. PROCESSING OFFICER:</label><br>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->processing_officer }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>21. APPROVING OFFICER:</label>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->approving_officer }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>22. ENCODER</label>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->encoder }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>23. NAME OF REPORTING UNIT <br>(OFFICE/SECTION)</label>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->name_of_reporting_unit_office_section }}">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>24. CONTROL N0.</label>
                </td>
                <td colspan="9">
                    <input type="text" value="{{ $pwd->control_no }}">
                </td>
            </tr>


        </tbody>
    </table>
</body>

</html>
