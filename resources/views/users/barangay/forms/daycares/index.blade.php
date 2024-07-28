@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Daycares
@endsection

@section('content')
    @php
        $data_name = 'daycares';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span
                                class="mx-1 fw-bold">{{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}
                                DAYCARES</span>
                            @include('users.barangay.forms.includes.header_buttons')
                        </span>
                    </div>

                    <div class="card-body overflow-hidden">
                        <div class="mt-5">

                            @if (session('status'))
                                <div class="alert alert-success " role="alert">
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
                                        <th>ECCDF ID</th>
                                        <th>Facility Address</th>
                                        <th>Facility Name</th>
                                        <th>Service Provider</th>
                                        <th>Child Info</th>
                                        <th>Home Address</th>
                                        <th>Religion & Ethnicity</th>
                                        <th>Breastfeeding, Supplementary Feeding and more</th>
                                        <th>Disabilities</th>
                                        <th>ECCD Experiences</th>
                                        <th>Attendance & Session Info</th>
                                        <th>Additional Info</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daycares as $daycare)
                                        <tr>
                                            <td>{{ $daycare->id }}</td>
                                            <td>{{ $daycare->eccdfid }}</td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Street Address:</strong>
                                                    {{ $daycare->facility_street_address }}<br>
                                                    <strong>Barangay:</strong> {{ $daycare->facility_barangay }}<br>
                                                    <strong>City/Municipality:</strong>
                                                    {{ $daycare->facility_city_municipality }}<br>
                                                    <strong>Province:</strong> {{ $daycare->facility_province }}<br>
                                                    <strong>Region:</strong> {{ $daycare->facility_region }}
                                                </div>
                                            </td>
                                            <td>{{ $daycare->facility_name }}</td>
                                            <td>{{ $daycare->service_provider }}</td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Name:</strong> {{ $daycare->first_name }}
                                                    {{ $daycare->middle_name }} {{ $daycare->last_name }}<br>
                                                    <strong>Nickname:</strong> {{ $daycare->nickname }}<br>
                                                    <strong>Sex:</strong> {{ $daycare->sex }}<br>
                                                    <strong>Born:</strong>
                                                    {{ \Carbon\Carbon::parse($daycare->date_of_birth)->format('Y-m-d') }}<br>
                                                    <strong>Place:</strong> {{ $daycare->birthplace }}<br>
                                                    <strong>Registered:</strong>
                                                    {{ \Carbon\Carbon::parse($daycare->birth_registered)->format('Y-m-d') }}<br>
                                                    <strong>Ext:</strong> {{ $daycare->ext }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Street Address:</strong>
                                                    {{ $daycare->home_street_address }}<br>
                                                    <strong>Barangay:</strong> {{ $daycare->home_barangay }}<br>
                                                    <strong>City/Municipality:</strong>
                                                    {{ $daycare->home_city_municipality }}<br>
                                                    <strong>Province:</strong> {{ $daycare->home_province }}<br>
                                                    <strong>Region:</strong> {{ $daycare->home_region }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Religion:</strong> {{ $daycare->religion }}<br>
                                                    <strong>Ethnicity:</strong> {{ $daycare->ethnicity }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Breastfeeding:</strong>
                                                    {{ $daycare->breastfeeding ? 'Yes' : 'No' }}<br>
                                                    <strong>Kind of Breastfeeding:</strong>
                                                    {{ $daycare->kind_of_breastfeeding }}<br>
                                                    <strong>Months of Breastfeeding:</strong>
                                                    {{ $daycare->breastfed_for_months }}<br>
                                                    <strong>Supplementary Feeding:</strong>
                                                    {{ $daycare->supplementary_feeding ? 'Yes' : 'No' }}<br>
                                                    <strong>Days of Supplementary Feeding:</strong>
                                                    {{ $daycare->supplementary_feeding_for_days }}<br>
                                                    <strong>Listahan Identified:</strong>
                                                    {{ $daycare->listahanan_identified ? 'Yes' : 'No' }}<br>
                                                    <strong>Pantawid Beneficiary:</strong>
                                                    {{ $daycare->pantawid_beneficiary ? 'Yes' : 'No' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    {{ count($daycare->disabilities ?? []) }}
                                                    {{-- @foreach ($daycare->disabilities as $disability)
                                                        <div>
                                                            <strong>Disability:</strong> {{ $disability->disability }}<br>
                                                            <strong>Cause:</strong> {{ $disability->cause }}
                                                        </div>
                                                    @endforeach --}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    {{ count($daycare->eccdExperiences ?? []) }}
                                                    {{-- @foreach ($daycare->eccdExperiences as $experience)
                                                        <div>
                                                            <strong>Service Type:</strong>
                                                            {{ $experience->service_type }}<br>
                                                            <strong>Service:</strong> {{ $experience->service }}<br>
                                                            <strong>From:</strong>
                                                            {{ $experience->from_date ? \Carbon\Carbon::parse($experience->from_date)->format('Y-m-d') : 'N/A' }}<br>
                                                            <strong>To:</strong>
                                                            {{ $experience->to_date ? \Carbon\Carbon::parse($experience->to_date)->format('Y-m-d') : 'N/A' }}
                                                        </div>
                                                    @endforeach --}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Participation Fee Paid:</strong>
                                                    {{ $daycare->participation_fee_paid ? 'Yes' : 'No' }}<br>
                                                    <strong>Participation Amount:</strong>
                                                    {{ $daycare->participation_fee_amount }}<br>
                                                    <strong>Parents Counterpart:</strong>
                                                    {{ $daycare->parents_counterpart }}<br>
                                                    <strong>Attendance Status:</strong>
                                                    {{ $daycare->attendance_status }}<br>
                                                    <strong>Scheduled Session:</strong>
                                                    {{ $daycare->scheduled_session }}<br>
                                                    <strong>School Year:</strong> {{ $daycare->school_year }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Accomplished By:</strong> {{ $daycare->accomplished_by }}<br>
                                                    <strong>Name of EECD Service Provider:</strong>
                                                    {{ $daycare->name_of_eccd_service_provider }}<br>
                                                    <strong>Date Accomplished:</strong>
                                                    {{ \Carbon\Carbon::parse($daycare->date_accomplished)->format('Y-m-d') }}<br>
                                                    <strong>Encoder ID:</strong> {{ $daycare->encoder_id }}
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $data_id = $daycare->id;
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
