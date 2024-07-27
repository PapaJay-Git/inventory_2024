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
            width: auto;
            font-size: 0.40rem;
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
    <table class="font-mono whitespace-wrap">
        <table class="container border-black border-1">
            <thead class="pb-4">
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
                    <th class="font-bold text-start" colspan="4" rowspan="2">
                        <img src="{{ $base64Logo }}" alt="Logo" style="height: 40px; width: 40px" class="item">

                        <span class="text-xs item">
                            <span>Republic of the Philippines</span><br>
                            <span>Department of Social Welfare and Development</span><br>
                            <span>Early Childhood Care and Development</span>
                        </span>
                    </th>
                    <th class="font-bold text-start text-2xl" colspan="5" rowspan="2">
                        Child Information Sheet
                    </th>
                    <th colspan="1">

                    </th>
                    <th class="font-bold text-center text-xs border-1 border-black" colspan="2" rowspan="1">
                        <input type="text">
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
                        <input type="text" class="w-full">
                    </td>

                    <td colspan="1" class="text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="1">

                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="font-bold text-sm">
                    </td>

                    <td colspan="1" class="text-sm">
                        Region
                    </td>
                    <td colspan="3" class="text-sm">
                        Province
                    </td>
                    <td colspan="2" class="text-sm">
                        City/Municipality
                    </td>
                    <td colspan="3" class="text-sm">
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
                        <input type="text">
                    </td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>3. Service Provider*</label>
                    </td>
                    <td colspan="5" class="text-sm border-1 border-black">
                        <input type="text">
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
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>

                    <td colspan="1" class="font-bold text-sm">
                        <label>4b. Nickname</label>
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">
                        <input type="text">
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
                    <td colspan="1" class="text-sm">Middle Name*</td>
                    <td colspan="1" class="text-sm">Ext.(Jr.Sr.)</td>
                    <td colspan="5">

                    </td>
                </tr>
                <tr>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-sm">
                        <label class="font-bold">5. Sex*: </label>
                    </td>
                    <td colspan="2" class="text-sm">
                        <input type="radio"> Male
                        <input type="radio"> Female
                    </td>
                    <td colspan="1" class="text-sm font-bold">
                        <label class="font-bold">
                            6a. Birth Order*
                        </label>
                    </td>
                    <td colspan="2" class="font-bold text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>6b. No. of siblings*</label>
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>7. Date of Birth*</label>
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        <input type="text">
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
                        <input type="text">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>7a. Birth Registered</label>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="font-bold text-sm border-1 border-black">
                        <input type="text">
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
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
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
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2"></td>
                    <td colspan="1" class="font-bold text-sm">
                        <label>11. Ethnicity</label>
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
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
                        <input type="checkbox"> Breastfeeding
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
                        <input type="checkbox"> Exclusive
                        <input type="checkbox"> Mixed
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">1. <input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="5" class="text-sm">
                        Breastfed for
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">2. <input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        months
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="text-sm border-1 border-black">3. <input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-sm">
                        <input type="checkbox"> Supplementary Feeding - supplemented for
                    </td>
                    <td colspan="3" class="text-sm border-1 border-black">4. <input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm border-1 border-black">
                        <input type="text">
                    </td>
                    <td colspan="1" class="font-bold text-sm border-1 border-black">
                        days
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="text-sm border-1 border-black">5. <input type="text"></td>
                    <td colspan="3" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-sm">
                        <input type="checkbox"> Child have Disability/Impairment
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
                        <input type="text">
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
                    <td colspan="1"></td>
                    <td colspan="4" class="text-sm">
                        <input type="checkbox"> Listahanan Identified
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="4" class="text-sm">
                        <input type="checkbox"> Pantawid Beneficiary
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="4" class="font-bold text-sm">
                        Household ID:<br>
                        <input type="text" style="border: 1px solid black">
                    </td>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold text-sm">
                        15a. Participation Fee
                    </td>
                    <td colspan="3" class="font-bold text-sm">
                        17. Scheduled Session*
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="2" class="text-sm">
                        <input type="checkbox"> Paid amount of:
                        <input type="text" style="border: 1px solid black">
                    </td>
                    <td colspan="3" class="text-sm">
                        <input type="checkbox"> Morning Session<br>
                        <input type="checkbox"> Afternoon Session
                    </td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="2" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
                    <td colspan="1" class="text-sm border-1 border-black"><input type="text"></td>
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
                        <input type="checkbox"> Cash<br>
                        <input type="checkbox"> In Kind<br>
                        <input type="checkbox"> None<br>
                    </td>
                    <td colspan="2" class="text-sm">
                        <input type="checkbox"> Continuing<br>
                        <input type="checkbox"> Dropped Out<br>
                        <input type="checkbox"> Graduated<br>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3" class="font-bold text-sm">
                        Accomplished By* <br>
                        <input type="text" style="border: 1px solid black">
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="3" class="font-bold text-sm">
                        <input type="text">
                        <hr>
                        Name and Signature of ECCD Service Provider
                        <br>
                        <br>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold text-sm">
                        16. School Year* <br>
                        <input type="text" style="border: 1px solid black">

                    </td>
                    <td colspan="3" class="text-sm">
                        If drop out, reason:<br>
                        <input type="checkbox"> Illness<br>
                        <input type="checkbox"> Transfer of Residence<br>
                        <input type="checkbox"> Others (specify):<br>
                        <input type="text" style="border: 1px solid black">
                    </td>
                    <td colspan="1" class="font-bold text-sm">
                        Date Accomplished*
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <input type="text" style="border: 1px solid black">
                    </td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="6" class="font-bold text-sm"></td>
                    <td colspan="1" class="font-bold text-sm">
                        Encoder ID
                    </td>
                    <td colspan="2" class="font-bold text-sm">
                        <input type="text" style="border: 1px solid black">
                    </td>
                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>
</body>

</html>
