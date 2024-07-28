@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Solo Parents
@endsection

@section('content')
    @php
        $data_name = 'solo_parents';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span
                                class="mx-1 fw-bold">{{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}
                                SOLO PARENTS</span>
                            @include('users.barangay.forms.includes.header_buttons')
                        </span>
                    </div>

                    <div class="card-body overflow-hidden">
                        <div class="mt-5">

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
                            <table id='myTable' class='stripe'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Case Number</th>
                                        <th>Full Name</th>
                                        <th>Philsys Card Number</th>
                                        <th>Sex</th>
                                        <th>Date of Birth</th>
                                        <th>Age</th>
                                        <th>Place of Birth</th>
                                        <th>Address</th>
                                        <th>Educational Attainment & Civil Status</th>
                                        <th>Occupation & Employment Status</th>
                                        <th>Monthly Income</th>
                                        <th>Contact Info</th>
                                        <th>Additional Info</th>
                                        <th>Emergency Contact</th>
                                        <th>Identification Details</th>
                                        <th>Household Compositions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soloParents as $soloParent)
                                        <tr>
                                            {{-- ID --}}
                                            <td>{{ $soloParent->id }}</td>

                                            {{-- Case Number --}}
                                            <td>{{ $soloParent->case_number }}</td>

                                            {{-- Full Name --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Full Name:</strong> {{ $soloParent->last_name }},
                                                    {{ $soloParent->first_name }} {{ $soloParent->middle_name }}
                                                    {{ $soloParent->suffix }}
                                                </div>
                                            </td>

                                            {{-- Philsys Card Number --}}
                                            <td>{{ $soloParent->philsys_card_number }}</td>

                                            {{-- Sex --}}
                                            <td>{{ $soloParent->sex }}</td>

                                            {{-- Date of Birth --}}
                                            <td>{{ \Carbon\Carbon::parse($soloParent->date_of_birth)->format('Y-m-d') }}
                                            </td>

                                            {{-- Age --}}
                                            <td>{{ $soloParent->age }}</td>

                                            {{-- Place of Birth --}}
                                            <td>{{ $soloParent->place_of_birth }}</td>

                                            {{-- Address --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Street Address:</strong>
                                                    {{ $soloParent->street_address }}<br>
                                                    <strong>Barangay:</strong> {{ $soloParent->barangay }}<br>
                                                    <strong>City/Municipality:</strong>
                                                    {{ $soloParent->city_municipality }}<br>
                                                    <strong>Province:</strong> {{ $soloParent->province }}<br>
                                                    <strong>Region:</strong> {{ $soloParent->region }}
                                                </div>
                                            </td>

                                            {{-- Educational Attainment & Civil Status --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Educational Attainment:</strong>
                                                    {{ $soloParent->educational_attainment }}<br>
                                                    <strong>Civil Status:</strong> {{ $soloParent->civil_status }}
                                                </div>
                                            </td>

                                            {{-- Occupation & Employment Status --}}
                                            <td>

                                                <div class="border p-2 mb-2">
                                                    <strong>Occupation:</strong> {{ $soloParent->occupation }}<br>
                                                    <strong>Employment Status:</strong>
                                                    {{ $soloParent->status_of_employment }}
                                                </div>
                                            </td>

                                            {{-- Monthly Income --}}
                                            <td>{{ $soloParent->monthly_income }}</td>

                                            {{-- Contact Info --}}
                                            <td>

                                                <div class="border p-2 mb-2">
                                                    <strong>Contact Numbers:</strong>
                                                    {{ $soloParent->contact_numbers }}<br>
                                                    <strong>Email Address:</strong> {{ $soloParent->email_address }}
                                                </div>
                                            </td>

                                            {{-- Additional Info --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Pantawid Beneficiary:</strong>
                                                    {{ $soloParent->pantawid_beneficiary ? 'Yes' : 'No' }}<br>
                                                    <strong>Household ID:</strong> {{ $soloParent->household_id }}<br>
                                                    <strong>Indigenous Person:</strong>
                                                    {{ $soloParent->indigenous_person ? 'Yes' : 'No' }}<br>
                                                    <strong>Affiliation:</strong> {{ $soloParent->affiliation }}<br>
                                                    <strong>LGBTQ:</strong> {{ $soloParent->lgbtq ? 'Yes' : 'No' }}<br>
                                                    <strong>PWD:</strong> {{ $soloParent->pwd ? 'Yes' : 'No' }}<br>
                                                    <strong>Classification Circumstances:</strong>
                                                    {{ $soloParent->classification_circumstances }}<br>
                                                    <strong>Needs/Problems:</strong> {{ $soloParent->needs_problems }}
                                                </div>
                                            </td>

                                            {{-- Emergency Contact --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Emergency Name:</strong> {{ $soloParent->emergency_name }}<br>
                                                    <strong>Address:</strong> {{ $soloParent->emergency_address }}<br>
                                                    <strong>Number:</strong> {{ $soloParent->emergency_number }}<br>
                                                    <strong>Relationship:</strong>
                                                    {{ $soloParent->emergency_relationship }}
                                                </div>
                                            </td>

                                            {{-- Identification Details --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>SPO Status:</strong> {{ $soloParent->spo_status }}<br>
                                                    <strong>Solo Parent ID Card Number:</strong>
                                                    {{ $soloParent->solo_parent_id_card_number }}<br>
                                                    <strong>Solo Parent Category:</strong>
                                                    {{ $soloParent->solo_parent_category }}<br>
                                                    <strong>Date Issuance:</strong>
                                                    {{ \Carbon\Carbon::parse($soloParent->date_issuance)->format('Y-m-d') }}<br>
                                                    <strong>Beneficiary Code:</strong> {{ $soloParent->beneficiary_code }}
                                                </div>
                                            </td>

                                            {{-- Household Compositions --}}
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    {{ count($soloParent->householdCompositions ?? []) }}
                                                    {{-- @foreach ($soloParent->householdCompositions as $composition)
                                                        <strong>Full Name:</strong> {{ $composition->full_name }}<br>
                                                        <strong>Sex:</strong> {{ $composition->sex }}<br>
                                                        <strong>Relationship:</strong>
                                                        {{ $composition->relationship }}<br>
                                                        <strong>Birthdate:</strong>
                                                        {{ \Carbon\Carbon::parse($composition->birthdate)->format('Y-m-d') }}<br>
                                                        <strong>Age:</strong> {{ $composition->age }}<br>
                                                        <strong>Civil Status:</strong>
                                                        {{ $composition->civil_status }}<br>
                                                        <strong>Educational Attainment:</strong>
                                                        {{ $composition->educational_attainment }}<br>
                                                        <strong>Occupation:</strong> {{ $composition->occupation }}<br>
                                                        <strong>Monthly Income:</strong>
                                                        {{ $composition->monthly_income }}
                                                    @endforeach --}}
                                                </div>
                                            </td>

                                            {{-- Actions --}}
                                            <td>
                                                @php
                                                    $data_id = $soloParent->id;
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
        var activeLink = document.getElementById('forms-svg');
        activeLink.classList.add('active-svg');
    </script>
@endsection
