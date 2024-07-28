<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabataan Registration Form</title>
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
        .border-b-1 {
            border-width: 0;
            border-bottom-width: 1px;
            border-style: solid;
        }

        .border-bottom-black {
            border-bottom: solid 1px black !important;
        }

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
            font-size: .80rem;
        }

        .text-xl {
            font-size: .60rem;
        }

        .text-md {
            font-size: .50rem;
        }

        .text-sm {
            font-size: .40rem;
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
            transform: scale(.3);
            height: .6rem;
        }

        input[type="text"] {
            height: .5rem;
            width: 94%;
            font-size: 0.5rem;
            margin: none;
            display: block;
            border: 0px;
            overflow: hidden;
        }

        .pe-1 {
            padding-right: 15px !important;
        }

        .ps-1 {
            padding-left: 10px !important;
        }

        td {
            overflow: hidden;
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
                <tr>
                    <th colspan="12" class="text-center font-bold text-3xl ">
                        <span class="border-bottom-black">REGISTRATION FORM</span>
                    </th>
                </tr>

            </thead>
            <tbody class="text-xl">
                <!-- Personal Information Section -->
                <tr>
                    <td colspan="12" class="text-start font-bold text-2xl">PERSONAL INFORMATION</td>
                </tr>
                <tr>
                    <td colspan="2">Name:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->first_name }}">
                    </td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->middle_name }}">
                    </td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->last_name }}">
                    </td>
                    <td colspan="1" class="text-center">Nickname:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->nickname }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">First Name</td>
                    <td colspan="2">M.I.</td>
                    <td colspan="2">Surname</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2">Date of Birth:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->date_of_birth }}">
                    </td>
                    <td colspan="1" class="ps-1">Gender:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->gender }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Age:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->age }}">
                    </td>
                    <td colspan="1" class="ps-1">Religion:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->religion }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Position:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->position }}">
                    </td>
                    <td colspan="1" class="ps-1">Mobile Phone:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->mobile_phone }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Barangay:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->barangay }}">
                    </td>
                    <td colspan="1" class="ps-1">City/Municipality:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->city_municipality }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Home Address:</td>
                    <td colspan="9" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->home_address }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="12"><br></td>
                </tr>

                <!-- Educational Attainment Section -->
                <tr>
                    <td colspan="12" class="text-start font-bold text-2xl">EDUCATIONAL ATTAINMENT</td>
                </tr>
                <tr>
                    <td colspan="3">Post Graduate Degree/ Course:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->post_graduate_course }}">
                    </td>
                    <td colspan="1">Year Taken:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->post_graduate_year }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">College Degree/Course:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->college_course }}">
                    </td>
                    <td colspan="1">Year Taken:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->college_year }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">High School:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->high_school }}">
                    </td>
                    <td colspan="1">Year Taken:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->high_school_year }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">Elementary:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->elementary }}">
                    </td>
                    <td colspan="1">Year Taken:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->elementary_year }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">Others:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->other_education }}">
                    </td>
                    <td colspan="1">Year Taken:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->other_education_year }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="12"><br></td>
                </tr>

                <!-- Emergency Contact Information Section -->
                <tr>
                    <td colspan="12" class="text-start font-bold text-xl">
                        <span class="border-bottom-black">In case of emergency, please notify:</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Name:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->emergency_contact_name }}">
                    </td>
                    <td colspan="1" class="ps-1">Relationship:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->emergency_contact_relationship }}">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Address:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->emergency_contact_address }}">
                    </td>
                    <td colspan="1" class="ps-1">Phone No:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kabataan->emergency_contact_phone }}">
                    </td>
                    <td></td>
                </tr>
            </tbody>

        </table>
    </div>
</body>

</html>
