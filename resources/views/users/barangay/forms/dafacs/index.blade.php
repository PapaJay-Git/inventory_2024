@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Dafac Records
@endsection

@section('content')

    @php
        $data_name = 'dafacs';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold">
                                {{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}
                                DAFAC
                                RECORDS
                            </span>
                            @include('users.barangay.forms.includes.header_buttons')
                        </span>
                    </div>

                    <div class="card-body overflow-hidden">
                        <div class="mt-5">

                            {{-- Display session status messages --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Display validation errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- DataTable with all DAFAC records --}}
                            <table id='myTable' class='stripe'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Region</th>
                                        <th>Province</th>
                                        <th>City/Municipality</th>
                                        <th>Barangay Evacuation Site</th>
                                        <th>Serial No</th>
                                        <th>Head of the Family</th>
                                        <th>Occupation & Monthly Income</th>
                                        <th>4Ps Beneficiary & Ethnicity</th>
                                        <th>Housing, Code, Health & Registry Info</th>
                                        <th>Barngay Captain and LSWDO</th>
                                        <th>Family Members</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dafacs as $dafac)
                                        <tr>
                                            {{-- Unique ID of the record --}}
                                            <td>{{ $dafac->id }}</td>

                                            {{-- Region --}}
                                            <td>{{ $dafac->region }}</td>

                                            {{-- Province or District --}}
                                            <td>{{ $dafac->province_district }}</td>

                                            {{-- City/Municipality --}}
                                            <td>{{ $dafac->city_municipality_barangay }}</td>

                                            {{-- Barangay Evacuation Site --}}
                                            <td>{{ $dafac->barangay_evacuation_center_site }}</td>

                                            {{-- Serial Number --}}
                                            <td>{{ $dafac->serial_no }}</td>

                                            {{-- Head of Family --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Full Name:</strong> {{ $dafac->head_of_family_surname }},
                                                    {{ $dafac->head_of_family_first_name }}
                                                    {{ $dafac->head_of_family_middle_name }}<br>
                                                    <strong>Sex:</strong> {{ $dafac->sex }}<br>
                                                    <strong>Age:</strong> {{ $dafac->age }}<br>
                                                    <strong>Date of Birth:</strong>
                                                    {{ \Carbon\Carbon::parse($dafac->date_of_birth)->format('Y-m-d') }}
                                                </div>
                                            </td>

                                            {{-- Occupation and Income --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Occupation:</strong> {{ $dafac->occupation }}<br>
                                                    <strong>Monthly Income:</strong> {{ $dafac->monthly_net_income }}
                                                </div>
                                            </td>

                                            {{-- 4Ps Beneficiary and Indigenous People --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>4Ps Beneficiary:</strong>
                                                    {{ $dafac->is_4ps_beneficiary ? 'Yes' : 'No' }}<br>
                                                    <strong>Indigenous People:</strong>
                                                    {{ $dafac->is_ip ? 'Yes' : 'No' }}<br>
                                                    <strong>Ethnicity:</strong> {{ $dafac->type_of_ethnicity }}
                                                </div>
                                            </td>

                                            {{-- Ethnicity and Housing Info --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Housing Type:</strong> {{ $dafac->housing_type }}<br>
                                                    <strong>Code:</strong> {{ $dafac->code }}<br>
                                                    <strong>Health Condition:</strong> {{ $dafac->health_condition }}<br>
                                                    <strong>DAFAC Date Registered:</strong>
                                                    {{ \Carbon\Carbon::parse($dafac->date_registered)->format('Y-m-d') }}
                                                </div>
                                            </td>

                                            {{-- barangay captain and lswdo --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Barangay Captain:</strong>
                                                    {{ $dafac->name_of_brg_captain }}<br>
                                                    <strong>Name of LSWDO:</strong> {{ $dafac->name_of_lswdo }}<br>
                                                </div>
                                            </td>

                                            {{-- Family Members --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    {{ count($dafac->familyMembers ?? []) }}
                                                    {{-- @foreach ($dafac->familyMembers as $member)
                                                        <strong>Name:</strong> {{ $member->family_member_name }}<br>
                                                        <strong>Relationship:</strong>
                                                        {{ $member->relationship_to_head }}<br>
                                                        <strong>Age:</strong> {{ $member->age }}<br>
                                                        <strong>Gender:</strong> {{ $member->gender }}<br>
                                                        <strong>Education:</strong> {{ $member->education }}<br>
                                                        <strong>Occupational Skills:</strong>
                                                        {{ $member->occupational_skills }}<br>
                                                        <strong>Remarks:</strong> {{ $member->remarks }}
                                                    @endforeach --}}
                                                </div>
                                            </td>

                                            {{-- Actions --}}
                                            <td>
                                                @php
                                                    $data_id = $dafac->id;
                                                @endphp
                                                @include('users.barangay.forms.includes.action_buttons')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Highlight the active link in the navigation
        var activeLink = document.getElementById('forms-svg');
        if (activeLink) {
            activeLink.classList.add('active-svg');
        }
    </script>
@endsection
