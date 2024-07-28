<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAFAC PDF</title>
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

        .border-e-1 {
            border-right: 1px;
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

        .border-b {
            border-width: 0;
            border-bottom-width: 1px;
            border-style: solid;
        }

        .border-t {
            border-width: 0;
            border-top-width: 1px;
            border-style: solid;
        }

        /* White Space */
        .whitespace-nowrap {
            white-space: nowrap;
        }

        .whitespace-wrap {
            white-space: wrap;
        }

        .text-3xl {
            font-size: 1.5rem;
        }

        .text-2xl {
            font-size: 1.2rem;
        }

        .text-xl {
            font-size: 1.1rem;
        }

        .text-md {
            font-size: 1rem;
        }

        .text-sm {
            font-size: .90rem;
        }

        /* Font Size */
        .text-xs {
            font-size: .80rem;
        }

        .text-xxs {
            font-size: .70rem;
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
            padding: 3px;
            margin: 2px;
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
            transform: scale(1);
            height: 1rem;
        }

        input[type="text"] {
            height: 1rem;
            width: 93%;
            font-size: 0.80rem;
            margin: auto;
            display: block;
            border: 0px;
            overflow: hidden;
        }

        .pe-1 {
            padding-right: 15px !important;
        }

        td {
            overflow: hidden;
        }

        .text-uppercase {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="font-mono whitespace-wrap">
        <table>
            <thead>
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

            </thead>
            <tbody>

                <tr>
                    <td class="px-1 text-start text-uppercase " colspan="12">
                        <img src="{{ $base64Logo }}" style="height: 80px; widtd: 80px" class="inline-block item">
                        <div class="inline-block item ">
                            <span class="text-2xl"> Department of Social Welfare and
                                Development</span><br>
                            <span class="text-3xl font-bold">Disaster Assistance Family Access Card (DAFAC)</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-md text-start">
                        Region:
                    </td>
                    <td colspan="5" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black" value="{{ $dafac->region }}">
                    </td>
                    <td colspan="1" class="text-md text-start">
                        <span>Serial No.</span>
                    </td>
                    <td colspan="3" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black" value="{{ $dafac->serial_no }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-md text-start">
                        <span>Province/District:</span>
                    </td>
                    <td colspan="5" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->province_district }}">
                    </td>
                    <td colspan="4" class="text-md text-start font-bold">
                        <span>Social Worker's Copy</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-md text-start">
                        <span>City/Mun/Brgy:</span>
                    </td>
                    <td colspan="5" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->city_municipality_barangay }}">
                    </td>
                    <td colspan="4" class="text-md text-start"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-md text-start">
                        <span>Barangay/Evacuation Center/Site:</span>
                    </td>
                    <td colspan="4" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->barangay_evacuation_center_site }}">
                    </td>
                    <td colspan="4" class="text-md text-start"></td>
                </tr>
                <tr>
                    <td colspan="12"><br></td>
                </tr>
                <tr>
                    <td colspan="12" class="text-xl font-bold text-start text-uppercase">
                        <span>Head of the Family</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="2" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->head_of_family_surname }}">
                        <span>Surname</span>
                    </td>
                    <td colspan="3" rowspan="2" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->head_of_family_first_name }}">
                        <span>First Name</span>
                    </td>
                    <td colspan="2" rowspan="2" class="text-md text-start">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->head_of_family_middle_name }}">
                        <span>Middle Name</span>
                    </td>
                    <td colspan="2" rowspan="1" class="text-md text-end">
                        <input type="checkbox" {{ $dafac->sex == 'Male' ? 'checked' : '' }}> M
                        <input type="checkbox" {{ $dafac->sex == 'Female' ? 'checked' : '' }}> F
                    </td>
                    <td colspan="1" rowspan="1" class="text-md text-start">
                        <input type="text" style="border: 1px solid black; width: 50%"
                            value="{{ $dafac->age }}">
                    </td>
                    <td colspan="1" rowspan="1" class="text-md text-start">
                        <span>Age</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="12" class="text-md text-start"></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-md text-start ">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->date_of_birth }}">
                        <span>Date of Birth</span>
                    </td>
                    <td colspan="4" class="text-md text-start ">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->occupation }}">
                        <span>Occupation</span>
                    </td>
                    <td colspan="4" class="text-md text-start ">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->monthly_net_income }}">
                        <span>Monthly Net Income</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="12"><br></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-md text-start ">
                        <input type="checkbox" {{ $dafac->is_4ps_beneficiary == true ? 'checked' : '' }}>
                        <span>4Ps Beneficiary</span>
                    </td>
                    <td colspan="4" class="text-md text-start ">
                        <input type="checkbox" {{ $dafac->is_indigenous_people == true ? 'checked' : '' }}>
                        <span>IP - Type of Ethnicity</span>
                    </td>
                    <td colspan="3" class="text-md text-start ">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->type_of_ethnicity }}">
                    </td>
                </tr>

                <tr>
                    <td colspan="12"><br></td>
                </tr>
                <tr class="text-md text-center">
                    <td colspan="2" class="border-1 border-black">Family Members</td>
                    <td colspan="2" class="border-1 border-black">Relation to Family Head</td>
                    <td colspan="1" class="border-1 border-black">Age</td>
                    <td colspan="1" class="border-1 border-black">Gender</td>
                    <td colspan="2" class="border-1 border-black">Educ.</td>
                    <td colspan="2" class="border-1 border-black">Occupational Skills</td>
                    <td colspan="2" class="border-1 border-black">Remarks</td>
                </tr>
                @for ($i = 0; $i < 7; $i++)
                    <tr class="text-md text-center">
                        <td colspan="2" class="border-1 border-black">
                            <input type="text"
                                value="{{ $dafac->familyMembers[$i]['family_member_name'] ?? '' }}">
                        </td>
                        <td colspan="2" class="border-1 border-black">
                            <input type="text"
                                value="{{ $dafac->familyMembers[$i]['relationship_to_head'] ?? '' }}">
                        </td>
                        <td colspan="1" class="border-1 border-black">
                            <input type="text" value="{{ $dafac->familyMembers[$i]['age'] ?? '' }}">
                        </td>
                        <td colspan="1" class="border-1 border-black">
                            <input type="text" value="{{ $dafac->familyMembers[$i]['gender'] ?? '' }}">
                        </td>
                        <td colspan="2" class="border-1 border-black">
                            <input type="text" value="{{ $dafac->familyMembers[$i]['education'] ?? '' }}">
                        </td>
                        <td colspan="2" class="border-1 border-black">
                            <input type="text"
                                value="{{ $dafac->familyMembers[$i]['occupational_skills'] ?? '' }}">
                        </td>
                        <td colspan="2" class="border-1 border-black">
                            <input type="text" value="{{ $dafac->familyMembers[$i]['remarks'] ?? '' }}">
                        </td>
                    </tr>
                @endfor
                <tr>
                    <td colspan="12"><br></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-md text-start border-black border-1">
                        <div>
                            <input type="checkbox" id="house_lot_owner"
                                {{ $dafac->housing_type == 'House & lot owner' ? 'checked' : '' }}>
                            <label for="house_lot_owner">House & lot owner</label><br>
                            <input type="checkbox" id="rented_house_lot"
                                {{ $dafac->housing_type == 'Rented house & lot' ? 'checked' : '' }}>
                            <label for="rented_house_lot">Rented house & lot</label><br>
                            <input type="checkbox" id="house_owner_lot_renter"
                                {{ $dafac->housing_type == 'House owner & lot renter' ? 'checked' : '' }}>
                            <label for="house_owner_lot_renter">House owner & lot renter</label><br>
                            <input type="checkbox" id="house_owner_rent_free_owner_consent"
                                {{ $dafac->housing_type == 'House owner - rent-free lot with owners consent' ? 'checked' : '' }}>
                            <label for="house_owner_rent_free_owner_consent">House owner, rent-free lot with owner's
                                consent</label><br>
                            <input type="checkbox" id="house_owner_rent_free_no_consent"
                                {{ $dafac->housing_type == 'House owner - rent-free lot without consent of the owner' ? 'checked' : '' }}>
                            <label for="house_owner_rent_free_no_consent">House owner, rent-free lot without consent of
                                the owner</label><br>
                            <input type="checkbox" id="rent_free_house_owner_consent"
                                {{ $dafac->housing_type == 'Rent-free house & lot with owners consent' ? 'checked' : '' }}>
                            <label for="rent_free_house_owner_consent">Rent-free house & lot with owner's
                                consent</label><br>
                            <input type="checkbox" id="rent_free_house_no_owner_consent"
                                {{ $dafac->housing_type == 'Rent-free house & lot without owners consent' ? 'checked' : '' }}>
                            <label for="rent_free_house_no_owner_consent">Rent-free house & lot without owner's
                                consent</label>
                        </div>
                    </td>

                    <td colspan="6" class="text-md text-start border-black border-1">
                        <label for="code">Code:</label>
                        <span><b>A</b> - Older Person <b>B</b> - Lactating Mother <b>C</b> - PWD</span><br><br>

                        <hr>

                        <label for="housing_condition">Housing Condition:</label><br>
                        <input type="checkbox" id="partially_damaged"
                            {{ $dafac->housing_condition == 'Partially Damaged' ? 'checked' : '' }}>
                        <label for="partially_damaged">Partially Damaged</label><br>
                        <input type="checkbox" id="totally_damaged"
                            {{ $dafac->housing_condition == 'Totally Damaged' ? 'checked' : '' }}>
                        <label for="totally_damaged">Totally Damaged</label><br><br>

                        <hr>

                        <label for="health_condition">Health Condition:</label><br>
                        <span>01 - Dead</span><br>
                        <span>02 - Injured</span><br>
                        <span>03 - Missing</span><br>
                        <span>04 - With Illness</span>
                    </td>
                </tr>
                <td colspan="12"><br></td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="4" class="border-black border-1">

                    </td>
                    <td colspan="1"></td>
                    <td colspan="4" class="text-md text-center">
                        <input type="text" style="border-bottom: 1px solid black">
                        <label for="signature_family_head">Signature/Thumbmark of Family Head</label>
                        <br>
                        <br>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="4" class="text-md text-center">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->name_of_brg_captain }}">
                        <label for="signature_brg_captain">Name/Signature of Brgy. Captain</label>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="4" class="text-md text-center">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->date_registered }}">
                        <label for="date_registered">Date Registered</label>
                        <br>
                        <br>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="4" class="text-md text-center">
                        <input type="text" style="border-bottom: 1px solid black"
                            value="{{ $dafac->name_of_lswdo }}">
                        <label for="signature_lswdo">Name/Signature of LSWDO</label>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"></td>
                </tr>
                <tr>
                    <td colspan="10"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
