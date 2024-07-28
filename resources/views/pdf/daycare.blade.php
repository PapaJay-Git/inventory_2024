<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAYCARE PDF</title>
    <style>
        table {
            width: 100%;
            max-width: 8.5in;
            /* Set the maximum width to 8.5 inches for letter size paper */
            border-collapse: collapse;
        }

        .font-mono {
            font-family: monospace;
        }

        .whitespace-nowrap {
            white-space: nowrap;
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

        .item {
            display: inline-block;
            /* Make items inline-block to respect text-align */
            vertical-align: middle;
            /* Center items vertically */
            line-height: normal;
            /* Reset line-height to avoid extra spacing */
        }


        /* Font Weight */
        .font-bold {
            font-weight: bold;
        }

        /* Text Alignment */
        .text-center {
            text-align: center;
        }

        .align-items-center {
            align-items: center;
        }

        .text-start {
            text-align: left;
            left: 0;
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
            font-size: 1.05rem;
        }

        .text-xl {
            font-size: .85rem;
        }

        .text-md {
            font-size: .75rem;
        }

        .text-sm {
            font-size: .65rem;
        }

        /* Font Size */
        .text-xs {
            font-size: .55rem;
        }

        .text-xxs {
            font-size: .45rem;
        }

        @page {
            size: 8.5in 11in;
            margin-left: 15px;
            margin-right: 15px;
            margin-top: 15px;
            margin-bottom: 15px;
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
            padding: 1px 3px;
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
            transform: scale(.3);
            height: .6rem;
        }

        input[type="text"] {
            height: .7rem;
            width: 94%;
            box-sizing: border-box;
            font-size: 0.55rem;
            margin: 0px;
            display: block;
            border: 0px;
            overflow: hidden;
        }

        .pe-1 {
            padding-right: 15px !important;
        }

        td {
            overflow: hidden !important;
            /* Hide overflow content */
        }
    </style>
</head>

<body>
    <table class="font-mono whitespace-wrap">
        <table class="container border-black border-1">
            <thead class="pb-4">
                <tr>
                    {{-- 1 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 2 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 3 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 4 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 5 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 6 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 7 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 8 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 9 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 10 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 11 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 12 --}}
                    <th colspan="1" style="min-width: 55px; max-width: 55px"></th>
                    {{-- 13 --}}
                    <th colspan="1" style="min-width: 5px; max-width: 5px"></th>

                </tr>
                <tr>
                    <th class="font-bold text-start" colspan="10">
                        <span class="text-xs">Rev.10.4.19</span>
                    </th>
                    <th class="font-bold text-center" colspan="2">
                        <span class="text-xs"><b>ECCDFID</b>(to be filled up by the encoder)
                        </span>
                    </th>
                    <th colspan="1">

                    </th>
                </tr>
                <tr>
                    <th class="font-bold text-start" colspan="5" rowspan="2">
                        <img src="{{ $base64Logo }}" alt="Logo" style="height: 40px; width: 40px" class="item">

                        <span class="text-xs item">
                            <span>Republic of the Philippines</span><br>
                            <span>Department of Social Welfare and Development</span><br>
                            <span>Early Childhood Care and Development</span>
                        </span>
                    </th>
                    <th class="font-bold text-start text-2xl" colspan="4" rowspan="2">
                        Child Information Sheet
                    </th>
                    <th colspan="1">

                    </th>
                    <th class="font-bold text-center text-xs border-1 border-black" colspan="2" rowspan="1">
                        <input type="text" value="{{ $daycare->eccdfid }}">
                    </th>
                    <th colspan="1">

                    </th>
                </tr>
                <tr>
                    <th class="font-bold text-center text-xs" colspan="3">
                        <!-- Empty cell for ECCDFID input (second row) -->
                    </th>
                    <th colspan="1">

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="13" class="font-bold text-sm  border-1 border-black">
                        I. Identifying Information <span class="text-xs">NOTE: Fields with (*) asterisk are required
                            fields</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>1. Facility Location*</label>
                    </td>

                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_region }}">
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_province }}">
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_city_municipality }}">
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_barangay }}">
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_street_address }}">
                    </td>
                    <td colspan="1">

                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                    </td>

                    <td colspan="2" class="text-sm">
                        Region
                    </td>
                    <td colspan="2" class="text-sm">
                        Province
                    </td>
                    <td colspan="3" class="text-sm">
                        City/Municipality
                    </td>
                    <td colspan="2" class="text-sm">
                        Barangay
                    </td>
                    <td colspan="2" class="text-sm">
                        No. & Street Address
                    </td>
                    <td colspan="1">

                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>2. Name of Facility*</label>
                    </td>
                    <td colspan="5" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->facility_name }}">
                    </td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>3. Service Provider*</label>
                    </td>
                    <td colspan="5" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->service_provider }}">
                    </td>
                    <td colspan="1">

                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>4a. Name*</label>
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->last_name }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->first_name }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->middle_name }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->ext }}"></td>

                    <td colspan="1" class="font-bold text-sm">
                        <label>4b. Nickname</label>
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->nickname }}">
                    </td>
                    <td colspan="1">

                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        {{-- <label>4a. Name*</label> --}}
                    </td>
                    <td colspan="2" class="text-sm">Last Name*</td>
                    <td colspan="3" class="text-sm">First Name*</td>
                    <td colspan="2" class="text-sm">Middle Name*</td>
                    <td colspan="1" class="text-sm">Ext.(Jr.Sr.)</td>
                    <td colspan="4">

                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-sm">
                        <label class="font-bold">5. Sex*: </label>
                    </td>
                    <td colspan="2" class="text-xs">
                        <input type="radio" {{ $daycare->sex == 'Male' ? 'checked' : '' }}> Male
                        <input type="radio" {{ $daycare->sex == 'Female' ? 'checked' : '' }}> Female
                    </td>
                    <td colspan="2" class="text-sm font-bold">
                        <label class="font-bold">
                            6a. Birth Order*
                        </label>
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->birth_order }}">
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <label>6b. No. of siblings*</label>
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->no_of_siblings }}">
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <label>7. Date of Birth*</label>
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->date_of_birth }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>8. Birthplace*</label>
                    </td>
                    <td colspan="6" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->birthplace }}">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="font-bold text-sm">
                        <label>7a. Birth Registered</label>
                    </td>
                    <td colspan="2" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->birth_registered }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>9. Home Address*</label>
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->home_region }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->home_province }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->home_city_municipality }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->home_barangay }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->home_street_address }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm">Region</td>
                    <td colspan="2" class="text-sm">Province</td>
                    <td colspan="3" class="text-sm">City/Municipality</td>
                    <td colspan="2" class="text-sm">Barangay</td>
                    <td colspan="2" class="text-sm">House No./Street</td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                        <label>10. Religion</label>
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->religion }}"></td>
                    <td colspan="2"></td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>11. Ethnicity</label>
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->ethnicity }}"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="13" class="font-bold text-sm  border-1 border-black">
                        II. Nutrition and Services</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="6" class="font-bold text-sm">
                        12. The child underwent the following: <br>(check all applicable and fill details)
                    </td>
                    <td colspan="6" class="font-bold text-sm">
                        13. The child has the following disabilities/impairments:
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-sm">
                        <input type="checkbox" {{ $daycare->breastfeeding == true ? 'checked' : '' }}> Breastfeeding
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        a. Disability / Impairment (e.g. hearing, speech, visual)
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        b. Cause (e.g. inborn, illness)
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="5" class="text-sm">
                        Kind of Breastfeeding:<br>
                        <input type="checkbox" {{ $daycare->kind_of_breastfeeding == 'Exclusive' ? 'checked' : '' }}>
                        Exclusive
                        <input type="checkbox" {{ $daycare->kind_of_breastfeeding == 'Mixed' ? 'checked' : '' }}>
                        Mixed
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">1. <input type="text"
                            value="{{ $daycare->disabilities[0]['disability'] ?? '' }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->disabilities[0]['cause'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="5" class="text-sm">
                        Breastfed for
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">2. <input type="text"
                            value="{{ $daycare->disabilities[1]['disability'] ?? '' }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->disabilities[1]['cause'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->breastfed_for_months }}">
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        months
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="text-sm border-1 border-black">3. <input type="text"
                            value="{{ $daycare->disabilities[2]['disability'] ?? '' }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->disabilities[2]['cause'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-sm">
                        <input type="checkbox" {{ $daycare->supplementary_feeding == true ? 'checked' : '' }}>
                        Supplementary Feeding - supplemented for
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">4. <input type="text"
                            value="{{ $daycare->disabilities[3]['disability'] ?? '' }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->disabilities[3]['cause'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->supplementary_feeding_for_days }}">
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        days
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="text-sm border-1 border-black">5. <input type="text"
                            value="{{ $daycare->disabilities[4]['disability'] ?? '' }}"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->disabilities[4]['cause'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-sm">
                        <input type="checkbox" {{ $daycare->has_disability == true ? 'checked' : '' }}> Child have
                        Disability/Impairment
                    </td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="5" class="text-sm">
                        Has the child been referred for assistance / assessment or other services in connection with
                        his/her disability/impairment?*
                    </td>
                    <td colspan="6" class="font-bold text-sm">
                        14. The child has the following past ECCD Experiences:
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="4" class="font-bold text-sm border-1 border-black">
                        <input type="text" value="{{ $daycare->referred_for_assistance }}">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black">a. Service Type (e.g. Center, Communitiy)
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">b. Service (e.g Child minding, daycare)
                    </td>
                    <td colspan="1" class="text-sm border-1 border-black">c. From (Start Date)</td>
                    <td colspan="1" class="text-sm border-1 border-black">d. To (End Date)</td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-sm">
                        <input type="checkbox" {{ $daycare->listahanan_identified == true ? 'checked' : '' }}>
                        Listahanan Identified
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[0]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[0]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[0]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[0]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-sm">
                        <input type="checkbox" {{ $daycare->pantawid_beneficiary == true ? 'checked' : '' }}> Pantawid
                        Beneficiary
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[1]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[1]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[1]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[1]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="4" class="font-bold text-sm">
                        Household ID:<br>
                        <input type="text" style="border: 1px solid black" value="{{ $daycare->household_id }}">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[2]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[2]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[2]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[2]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[3]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[3]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[3]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[3]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[4]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[4]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[4]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[4]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[5]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[5]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[5]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[5]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold text-sm">
                        15a. Participation Fee
                    </td>
                    <td colspan="3" class="font-bold text-sm">
                        17. Scheduled Session*
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[6]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[6]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[6]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[6]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm">
                        <input type="checkbox" {{ $daycare->participation_fee_paid == true ? 'checked' : '' }}> Paid
                        amount of:
                        <input type="text" style="border: 1px solid black"
                            value="{{ $daycare->participation_fee_amount }}">
                    </td>
                    <td colspan="3" class="text-sm">
                        <input type="checkbox" {{ $daycare->scheduled_session == 'Morning' ? 'checked' : '' }}>
                        Morning
                        Session<br>
                        <input type="checkbox" {{ $daycare->scheduled_session == 'Afternoon' ? 'checked' : '' }}>
                        Afternoon Session
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[7]['service_type'] ?? '' }}"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[7]['service'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[7]['from_date'] ?? '' }}"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"
                            value="{{ $daycare->eccdExperiences[7]['to_date'] ?? '' }}"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold text-sm">
                        15b. Parent's Counterpart
                    </td>
                    <td colspan="3" class="font-bold text-sm">
                        18. Attendance Status*
                    </td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm">
                        <input type="checkbox" {{ $daycare->parents_counterpart == 'Cash' ? 'checked' : '' }}>
                        Cash<br>
                        <input type="checkbox" {{ $daycare->parents_counterpart == 'In Kind' ? 'checked' : '' }}> In
                        Kind<br>
                        <input type="checkbox" {{ $daycare->parents_counterpart == 'None' ? 'checked' : '' }}>
                        None<br>
                    </td>
                    <td colspan="2" class="text-sm">
                        <input type="checkbox" {{ $daycare->attendance_status == 'Continuing' ? 'checked' : '' }}>
                        Continuing<br>
                        <input type="checkbox" {{ $daycare->attendance_status == 'Dropped Out' ? 'checked' : '' }}>
                        Dropped Out<br>
                        <input type="checkbox" {{ $daycare->attendance_status == 'Graduated' ? 'checked' : '' }}>
                        Graduated<br>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm">
                        Accomplished By* <br>
                        <input type="text" style="border: 1px solid black"
                            value="{{ $daycare->accomplished_by }}">
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="5" class="font-bold text-sm text-center">
                        <input type="text" value="{{ $daycare->name_of_eccd_service_provider }}">
                        <hr>
                        Name and Signature of ECCD Service Provider
                        <br>
                        <br>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold text-sm">
                        16. School Year* <br>
                        <input type="text" style="border: 1px solid black" value="{{ $daycare->school_year }}">

                    </td>
                    <td colspan="3" class="text-sm">
                        If drop out, reason:<br>
                        <input type="checkbox" {{ $daycare->dropout_reason == 'Illness' ? 'checked' : '' }}>
                        Illness<br>
                        <input type="checkbox"
                            {{ $daycare->dropout_reason == 'Transfer of Residence' ? 'checked' : '' }}> Transfer of
                        Residence<br>
                        <input type="checkbox" {{ $daycare->dropout_reason == 'Others' ? 'checked' : '' }}> Others
                        (specify):<br>
                        <input type="text" style="border: 1px solid black"
                            value="{{ $daycare->dropout_reason_others }}">
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        Date Accomplished*
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <input type="text" style="border: 1px solid black"
                            value="{{ $daycare->date_accomplished }}">
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="6" class="font-bold text-sm"></td>
                    <td colspan="2" class="font-bold text-sm">
                        Encoder ID
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <input type="text" style="border: 1px solid black" value="{{ $daycare->encoder_id }}">
                    </td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
</body>

</html>
