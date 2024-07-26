<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        /* .min-w-full {
                min-width: 100%;
        } */

        table {
            width: 100%;
            max-width: 8.5in; /* Set the maximum width to 8.5 inches for letter size paper */
            border-collapse: collapse;
        }
        .font-mono {
            font-family: monospace;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .mt-1{
        margin-top: 3px;
    }
    .mt-2{
        margin-top: 6px;
    }
    .mt-3{
        margin-top: 9px;
    }
    .mt-4{
        margin-top: 12px;
    }
    .mt-5{
        margin-top: 15px;
    }
    .mt-20px{
        margin-top: 20px;
    }
    .pb-1{
        padding-bottom: 3px;
    }
    .pb-2{
        padding-bottom: 6px;
    }

    .d-inline-block {
        display: inline-block;
    }

    .px-3{
        padding: 0 3px;
    }
    .item {
        display: inline-block; /* Make items inline-block to respect text-align */
        vertical-align: middle; /* Center items vertically */
        line-height: normal; /* Reset line-height to avoid extra spacing */
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
            border-color: #000; /* black color */
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

        .text-2xl {
            font-size: 1.13rem;
        }
        .text-xl {
            font-size: .93rem;
        }
        .text-md {
            font-size: .83rem;
        }
        .text-sm {
            font-size: .73rem;
        }

            /* Font Size */
        .text-xs {
            font-size: .63rem;
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
            margin-top: 50px;
        }
        .container td {
            border: 1px solid black;
            padding: 1px;
            vertical-align: top;
        }

        .text-end{
            text-align: right;
        }
        .text-start{
            text-align: left;
        }

        input[type="radio"], input[type="checkbox"] {
            transform: scale(.5);
            height: .8rem;
        }

        input[type="text"] {
            height:  .5rem;
            width: auto;
            font-size: 0.40rem;
            margin: auto;
            display: block;
        }
        .pe-1{
            padding-left: 5px;
        }
        td{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <table class="min-w-full font-mono whitespace-nowrap" >
        <thead class="pb-4">
            <tr>
                <th class="px-1 font-bold text-center" colspan="12">
                    <img  src="{{ $base64Logo }}" style="height: 60px; width: 60px" class="inline-block">
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

                    <input type="radio" name="application_type" value="new">
                    <label>New Applicant</label>

                    <input type="radio" name="application_type" value="renewal">
                    <label>Renewal</label>
                </td>
                <td colspan="2" class="text-xs text-center">
                    Place 1"x"1 <br>Photo Here
                </td>
            </tr>


            <tr>
                <td colspan="6" class="font-bold text-sm">
                    <label>2. PERSON WITH DISABILITY NUMBER (RA-PPMM-BBB-NNNNNNN)</label>
                    <input type="text">
                </td>
                <td colspan="4" class="font-bold text-sm">
                    <label>3. DATE APPLIED: (mm/dd/yyyy)</label>
                    <input type="text">
                </td>
                <td colspan="2" rowspan="3" class="text-sm">

                </td>
            </tr>

            <tr>
                <td colspan="10" class="font-bold text-sm">
                    <label>4. PERSONAL INFORMATION</label>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>LAST NAME</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>FIRST NAME</label>
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>MIDDLE NAME</label>
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>SUFFIX</label>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="6" class="font-bold text-sm">
                    <label>5. DATE OF BIRTH: (mm/dd/yyyy)</label>
                    <input type="text">
                </td>
                <td colspan="6" class="text-sm">
                    <label class="font-bold">6. SEX: </label><br>
                    <input type="radio"> MALE <input type="radio"> FEMALE
                </td>
            </tr>
            <tr>
                <td colspan="12" class="text-sm">
                    <label class="font-bold">7. CIVIL STATUS:</label><br>
                    <input type="radio"> Single
                    <input type="radio"> Separated
                    <input type="radio"> Cohabitation (Live-in)
                    <input type="radio"> Married
                    <input type="radio"> Widow/er
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
                    <input type="checkbox"> Deaf or Hard of Hearing<br>
                    <input type="checkbox"> Intellectual Disability<br>
                    <input type="checkbox"> Learning Disability<br>
                    <input type="checkbox"> Mental Disability<br>
                    <input type="checkbox"> Physical Disability (Orthopedic)<br>
                </td>
                <td colspan="3" class="text-xs">
                    <input type="checkbox"> Psychosocial Disability<br>
                    <input type="checkbox"> Speech and Language Impairment<br>
                    <input type="checkbox"> Visual Disability<br>
                    <input type="checkbox"> Cancer (RA11215)<br>
                    <input type="checkbox"> Rare Disease(RA10747)<br>
                </td>

                <td colspan="3" class="text-xs">
                    <input type="checkbox"> <span class="font-bold">Congenital/Inborn</span><br>
                    <input type="checkbox"> ADHD<br>
                    <input type="checkbox"> Cerebral Palsy<br>
                    <input type="checkbox"> Down Syndrome<br>
                    <input type="checkbox"> Others<br>
                    <input type="text">
                </td>
                <td colspan="3" class="text-xs">
                    <input type="checkbox"> <span class="font-bold">Acquired</span><br>
                    <input type="checkbox"> Chronic Illness<br>
                    <input type="checkbox"> Cerebral Palsy<br>
                    <input type="checkbox"> Injury<br>
                    <input type="checkbox"> Others<br>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="12" class="font-bold text-sm">
                    <label>10. RESIDENCE ADDRESS</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="font-bold text-sm">
                    <label>House No. and Street</label>
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>Barangay</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Municipality/City</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Province</label>
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>Region</label>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="12" class="font-bold text-sm">
                    <label>11. CONTACT DETAILS</label>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="font-bold text-sm">
                    <label>Landline No.</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Mobile No.</label>
                    <input type="text">
                </td>
                <td colspan="5" class="font-bold text-sm">
                    <label>E-mail Address</label>
                    <input type="text">
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
                    <input type="radio"> None<br>
                    <input type="radio"> Kindergarten<br>
                    <input type="radio"> Elementary<br>
                    <input type="radio"> Mental Disability<br>
                    <input type="radio"> Junior High<br>
                </td>
                <td colspan="4" class="text-xs">
                    <input type="radio"> Senior High<br>
                    <input type="radio"> College<br>
                    <input type="radio"> Visual Disability<br>
                    <input type="radio"> Vocational<br>
                    <input type="radio"> Post Graduate<br>
                </td>
                    <td colspan="5" rowspan="3" class="text-xs">
                        <div><input type="radio"> Managers</div>
                        <div><input type="radio"> Professionals</div>
                        <div><input type="radio"> Technicians and Associate Professionals</div>
                        <div><input type="radio"> Clerical Support Workers</div>
                        <div><input type="radio"> Service and Sales Workers</div>
                        <div><input type="radio"> Skilled Agricultural, Forestry and<br> Fishery Workers</div>
                        <div><input type="radio"> Craft and Related Trade Workers</div>
                        <div><input type="radio"> Plant and Machine Operators and Assemblers</div>
                        <div><input type="radio"> Elementary Occupations</div>
                        <div><input type="radio"> Armed Forces Occupations</div>
                        <div><input type="radio"> Others, specify:</div>
                        <div><input type="text"></div>
                    </td>
            </tr>
            <tr>
                <td colspan="3" class="text-xs">
                    <label class="font-bold">13. STATUS OF EMPLOYMENT:</label>
                    <div >
                        <div><input type="radio"> Employed</div>
                        <div><input type="radio"> Unemployed</div>
                        <div><input type="radio"> Self-employed</div>
                    </div>
                </td>

                <td colspan="4" rowspan="2" class="text-xs">
                    <label class="font-bold">13 b. TYPES OF EMPLOYMENT:</label>
                    <div>
                        <div><input type="radio"> Permanent / Regular</div>
                        <div><input type="radio"> Seasonal</div>
                        <div><input type="radio"> Casual</div>
                        <div><input type="radio"> Emergency</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3"  class="text-xs">
                    <label class="font-bold">13 a. CATEGORY OF EMPLOYMENT:</label>
                    <div>
                        <div><input type="radio"> Government</div>
                        <div><input type="radio"> Private</div>
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
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Contact Person:</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Office Address:</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>Tel. Nos.:</label>
                    <input type="text">
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
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>GSIS NO.:</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>PAG-IBIG NO.:</label>
                    <input type="text">
                </td>
                <td colspan="3" class="font-bold text-sm">
                    <label>PSN NO.:</label>
                    <input type="text">
                </td>
                <td colspan="2" class="font-bold text-sm">
                    <label>PhilHealth NO.:</label>
                    <input type="text">
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
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>MOTHER'S NAME:</label>
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>GUARDIAN'S NAME :</label>
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
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
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio">
                    <label>Applicant</label>
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio">
                    <label>Guardian</label>
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <input type="radio">
                    <label>Representative</label>
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
                <td colspan="3">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>19. NAME OF CERTIFYING PHYSICIAN:</label><br>
                    <label>LICENSE NO.:</label>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>20. PROCESSING OFFICER:</label><br>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>21. APPROVING OFFICER:</label>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>22. ENCODER</label>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>23. NAME OF REPORTING UNIT <br>(OFFICE/SECTION)</label>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="font-bold text-sm">
                    <label>24. CONTROL N0.</label>
                </td>
                <td colspan="9">
                    <input type="text">
                </td>
            </tr>


        </tbody>
    </table>
</td>
</body>
</html>
