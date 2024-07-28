@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Person with Disability (Pwd)
@endsection

@section('content')
    @php
        $data_name = 'pwds';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span
                                class="mx-1 fw-bold">{{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}
                                Person
                                with Disability (Pwd)</span>
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
                                        <th>Application Type</th>
                                        <th>Disability Number</th>
                                        <th>Photo</th>
                                        <th>Date Applied</th>

                                        <!-- Personal Information -->
                                        <th>Full Name</th>
                                        <th>Date of Birth</th>
                                        <th>Sex</th>
                                        <th>Civil Status</th>
                                        <th>Type of Disability</th>
                                        <th>Cause of Disability</th>

                                        <!-- Address Information -->
                                        <th>Address</th>

                                        <!-- Contact Information -->
                                        <th>Contact Info</th>

                                        <!-- Educational and Employment Information -->
                                        <th>Educational Attainment</th>
                                        <th>Employment Information</th>
                                        <th>Occupation</th>

                                        <!-- Organization Information -->
                                        <th>Organization Info</th>

                                        <!-- Identification Numbers -->
                                        <th>ID Numbers</th>

                                        <!-- Family Information -->
                                        <th>Family Info</th>

                                        <!-- Form Fill-up Information -->
                                        <th>Accomplished By</th>

                                        <!-- Certification Information -->
                                        <th>Certification Info</th>

                                        <!-- Actions -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pwds as $pwd)
                                        <tr>
                                            <td>{{ $pwd->id }}</td>
                                            <td>{{ $pwd->application_type }}</td>
                                            <td>{{ $pwd->disability_number }}</td>
                                            <td>
                                                @if ($pwd->pwd_photo)
                                                    <img src="{{ config('app.pwd_images_path') . $pwd->pwd_photo }}"
                                                        alt="Photo"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    No Photo
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($pwd->date_applied)->format('Y-m-d') }}</td>

                                            <!-- Personal Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Full Name:</strong> {{ $pwd->last_name }},
                                                    {{ $pwd->first_name }} {{ $pwd->middle_name }} {{ $pwd->suffix }}
                                                </div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($pwd->date_of_birth)->format('Y-m-d') }}</td>
                                            <td>{{ $pwd->sex }}</td>
                                            <td>{{ $pwd->civil_status }}</td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Type of Disability:</strong><br>
                                                    @foreach (json_decode($pwd->type_of_disabilities, true) as $disability)
                                                        {{ $disability }}<br>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Cause of Disability:</strong><br>
                                                    {{ $pwd->cause_of_disability == 'Others' ? $pwd->cause_of_disability_others : $pwd->cause_of_disability }}
                                                </div>
                                            </td>

                                            <!-- Address Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Address:</strong><br>
                                                    {{ $pwd->house_no_street }}, {{ $pwd->barangay }},<br>
                                                    {{ $pwd->municipality }}, {{ $pwd->province }},<br>
                                                    {{ $pwd->region }}
                                                </div>
                                            </td>

                                            <!-- Contact Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Landline:</strong> {{ $pwd->landline_no }}<br>
                                                    <strong>Mobile:</strong> {{ $pwd->mobile_no }}<br>
                                                    <strong>Email:</strong> {{ $pwd->email_address }}
                                                </div>
                                            </td>

                                            <!-- Educational and Employment Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Educational Attainment:</strong>
                                                    {{ $pwd->educational_attainment }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Status:</strong> {{ $pwd->status_of_employment }}<br>
                                                    <strong>Type:</strong> {{ $pwd->types_of_employment }}<br>
                                                    <strong>Category:</strong> {{ $pwd->category_of_employment }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Occupation:</strong>
                                                    {{ $pwd->occupation == 'Others' ? $pwd->occupation_others : $pwd->occupation }}
                                                </div>
                                            </td>

                                            <!-- Organization Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Organization:</strong> {{ $pwd->organization_affiliated }}<br>
                                                    <strong>Contact Person:</strong> {{ $pwd->contact_person }}<br>
                                                    <strong>Office Address:</strong> {{ $pwd->office_address }}<br>
                                                    <strong>Tel No:</strong> {{ $pwd->office_tel_no }}
                                                </div>
                                            </td>

                                            <!-- Identification Numbers -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>SSS No:</strong> {{ $pwd->sss_no }}<br>
                                                    <strong>GSIS No:</strong> {{ $pwd->gsis_no }}<br>
                                                    <strong>PAGIBIG No:</strong> {{ $pwd->pagibig_no }}<br>
                                                    <strong>PSN No:</strong> {{ $pwd->psn_no }}<br>
                                                    <strong>PhilHealth No:</strong> {{ $pwd->philhealth_no }}
                                                </div>
                                            </td>

                                            <!-- Family Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Father:</strong> {{ $pwd->father_last_name }},
                                                    {{ $pwd->father_first_name }} {{ $pwd->father_middle_name }}<br>
                                                    <strong>Mother:</strong> {{ $pwd->mother_last_name }},
                                                    {{ $pwd->mother_first_name }} {{ $pwd->mother_middle_name }}<br>
                                                    <strong>Guardian:</strong> {{ $pwd->guardian_last_name }},
                                                    {{ $pwd->guardian_first_name }} {{ $pwd->guardian_middle_name }}
                                                </div>
                                            </td>

                                            <!-- Form Fill-up Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Accomplished By:</strong> {{ $pwd->accomplished_by }}<br>
                                                    <strong>Last Name:</strong> {{ $pwd->accomplished_by_last_name }}<br>
                                                    <strong>First Name:</strong> {{ $pwd->accomplished_by_first_name }}<br>
                                                    <strong>Middle Name:</strong> {{ $pwd->accomplished_by_middle_name }}
                                                </div>
                                            </td>

                                            <!-- Certification Information -->
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Certifying Physician:</strong>
                                                    {{ $pwd->name_of_certifying_physician }}<br>
                                                    <strong>License No:</strong> {{ $pwd->license_no }}<br>
                                                    <strong>Processing Officer:</strong> {{ $pwd->processing_officer }}<br>
                                                    <strong>Approving Officer:</strong> {{ $pwd->approving_officer }}<br>
                                                    <strong>Encoder:</strong> {{ $pwd->encoder }}<br>
                                                    <strong>Reporting Unit/Office Section:</strong>
                                                    {{ $pwd->name_of_reporting_unit_office_section }}<br>
                                                    <strong>Control No:</strong> {{ $pwd->control_no }}
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td>
                                                @php
                                                    $data_id = $pwd->id;
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
