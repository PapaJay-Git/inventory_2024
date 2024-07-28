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
            font-size: .90rem;
        }

        .text-xl {
            font-size: .70rem;
        }

        .text-md {
            font-size: .60rem;
        }

        .text-sm {
            font-size: .50rem;
        }

        /* Font Size */
        .text-xs {
            font-size: .40rem;
        }

        .text-xxs {
            font-size: .30rem;
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
            width: 96%;
            font-size: 0.5rem;
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
                    <th colspan="12" class="text-start font-bold text-3xl ">MEMBERSHIP FORM</th>
                </tr>
            </thead>
            <tbody class="text-xl">
                <tr>
                    <td colspan="2">LAST NAME:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->last_name }}">
                    </td>
                    <td colspan="1">DATE:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->date }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">FIRST NAME:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->first_name }}">
                    </td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="2">MIDDLE NAME:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->middle_name }}">
                    </td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="2">CITY ADDRESS:</td>
                    <td colspan="9" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->city_address }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="3">PROVINCIAL ADDRESS:</td>
                    <td colspan="8" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->provincial_address }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">DATE OF BIRTH:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->date_of_birth }}">
                    </td>
                    <td colspan="2">BIRTH PLACE:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->birth_place }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">CIVIL STATUS:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->civil_status }}">
                    </td>
                    <td colspan="1">CITIZENSHIP:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->citizenship }}">
                    </td>
                    <td colspan="1">RELIGION:</td>
                    <td colspan="2" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->religion }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">MOBILE NO.:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->mobile_number }}">
                    </td>
                    <td colspan="1">OCCUPATION:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->occupation }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">NAME OF COMPANY:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->name_of_company }}">
                    </td>
                    <td colspan="2">COMPANY ADDRESS:</td>
                    <td colspan="4" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->company_address }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">EDUCATIONAL ATTAINMENT:</td>
                    <td colspan="9" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->educational_attainment }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">NAME OF SPOUSE:</td>
                    <td colspan="3" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->spouse_name }}">
                    </td>
                    <td colspan="1">OCCUPATION:</td>
                    <td colspan="5" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->spouse_occupation }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">NUMBER OF CHILDREN:</td>
                    <td colspan="1" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->number_of_children }}">
                    </td>
                    <td colspan="4">OTHER ORGANIZATION'S MEMBERSHIP:</td>
                    <td colspan="4" class="border-bottom-black">
                        <input type="text" value="{{ $kababaihan->other_organizations_membership }}">
                    </td>
                    <td colspan="1"></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <hr>
        <h5>Submitted ID's</h5>
        <div>
            @foreach ($images_path as $image_path)
                <img src="{{ $image_path }}" alt="image"
                    style="width: 100%; max-width: 200px; margin-bottom: 10px;"><br>
            @endforeach
        </div>
    </div>
</body>

</html>
