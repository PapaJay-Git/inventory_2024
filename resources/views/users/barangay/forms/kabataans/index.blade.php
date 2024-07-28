@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Kabataans
@endsection

@section('content')
    @php
        $data_name = 'kabataans';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span
                                class="mx-1 fw-bold">{{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}
                                Kabataans</span>
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
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Age</th>
                                        <th>Position</th>
                                        <th>Barangay</th>
                                        <th>Home Address</th>
                                        <th>Gender</th>
                                        <th>Religion</th>
                                        <th>Mobile Phone</th>
                                        <th>City/Municipality</th>

                                        <!-- Educational Background -->
                                        <th>Education</th>

                                        <!-- Emergency Contact Information -->
                                        <th>Emergency Contact</th>

                                        <!-- Actions -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kabataans as $kabataan)
                                        <tr>
                                            <td>{{ $kabataan->id }}</td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>First Name:</strong> {{ $kabataan->first_name }}<br>
                                                    <strong>Middle Name:</strong> {{ $kabataan->middle_name }}<br>
                                                    <strong>Last Name:</strong> {{ $kabataan->last_name }}<br>
                                                    <strong>Nickname:</strong> {{ $kabataan->nickname }}<br>
                                                </div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($kabataan->date_of_birth)->format('Y-m-d') }}</td>
                                            <td>{{ $kabataan->age }}</td>
                                            <td>{{ $kabataan->position }}</td>
                                            <td>{{ $kabataan->barangay }}</td>
                                            <td>{{ $kabataan->home_address }}</td>
                                            <td>{{ $kabataan->gender }}</td>
                                            <td>{{ $kabataan->religion }}</td>
                                            <td>{{ $kabataan->mobile_phone }}</td>
                                            <td>{{ $kabataan->city_municipality }}</td>

                                            <!-- Educational Background -->
                                            <td>

                                                <div class="border p-2 mb-2 d-inline-block">
                                                    @if ($kabataan->post_graduate_course)
                                                        <strong>Post Graduate
                                                            Course:</strong>{{ $kabataan->post_graduate_course }}<br>
                                                    @endif
                                                    @if ($kabataan->college_course)
                                                        <strong>College Course:</strong>{{ $kabataan->college_course }}<br>
                                                    @endif
                                                    @if ($kabataan->high_school)
                                                        <strong>High School:</strong> {{ $kabataan->high_school }}<br>
                                                    @endif
                                                    @if ($kabataan->elementary)
                                                        <strong>Elementary:</strong> {{ $kabataan->elementary }}<br>
                                                    @endif
                                                    @if ($kabataan->other_education)
                                                        <strong>Other Education:</strong>
                                                        {{ $kabataan->other_education }}<br>
                                                    @endif
                                                </div>
                                                <div class="border p-2 mb-2 d-inline-block">
                                                    @if ($kabataan->post_graduate_course)
                                                        <strong>Year Taken:</strong>{{ $kabataan->post_graduate_year }}<br>
                                                    @endif
                                                    @if ($kabataan->college_course)
                                                        <strong>Year Taken:</strong> {{ $kabataan->college_year }}<br>
                                                    @endif
                                                    @if ($kabataan->high_school)
                                                        <strong>Year Taken:</strong> {{ $kabataan->high_school_year }}<br>
                                                    @endif
                                                    @if ($kabataan->elementary)
                                                        <strong>Year Taken:</strong> {{ $kabataan->elementary_year }}<br>
                                                    @endif
                                                    @if ($kabataan->other_education)
                                                        <strong>Year Taken:</strong> {{ $kabataan->other_education_year }}
                                                    @endif
                                                </div>
                                            </td>

                                            <!-- Emergency Contact Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Name:</strong> {{ $kabataan->emergency_contact_name }}<br>
                                                    <strong>Address:</strong>
                                                    {{ $kabataan->emergency_contact_address }}<br>
                                                    <strong>Relationship:</strong>
                                                    {{ $kabataan->emergency_contact_relationship }}<br>
                                                    <strong>Phone:</strong> {{ $kabataan->emergency_contact_phone }}
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td>
                                                @php
                                                    $data_id = $kabataan->id;
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
