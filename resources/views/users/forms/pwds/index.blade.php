@extends('layouts.app')

@section('title')
    Person with Disability (Pwd)
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold">Person with Disability (Pwd)</span>
                            <a href="/pwds/create" class="btn btn-primary btn-sm fw-bold">
                                CREATE DATA
                            </a>
                        </span>
                    </div>

                    <div class="card-body overflow-hidden">
                        <div class="mt-5">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @error('error')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

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
                                            <td>{{ \Carbon\Carbon::parse($pwd->date_applied)->format('Y-m-d') }}
                                            </td>

                                            <!-- Personal Information -->
                                            <td>
                                                {{ $pwd->last_name }}, {{ $pwd->first_name }}
                                                {{ $pwd->middle_name }} {{ $pwd->suffix }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($pwd->date_of_birth)->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $pwd->sex }}</td>
                                            <td>{{ $pwd->civil_status }}</td>
                                            <td>
                                                @foreach (json_decode($pwd->type_of_disabilities, true) as $disability)
                                                    {{ $disability }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $pwd->cause_of_disability == 'Others' ? $pwd->cause_of_disability_others : $pwd->cause_of_disability }}
                                            </td>

                                            <!-- Address Information -->
                                            <td>
                                                {{ $pwd->house_no_street }}, {{ $pwd->barangay }},<br>
                                                {{ $pwd->municipality }}, {{ $pwd->province }},<br>
                                                {{ $pwd->region }}
                                            </td>

                                            <!-- Contact Information -->
                                            <td>
                                                Landline: {{ $pwd->landline_no }}<br>
                                                Mobile: {{ $pwd->mobile_no }}<br>
                                                Email: {{ $pwd->email_address }}
                                            </td>

                                            <!-- Educational and Employment Information -->
                                            <td>
                                                {{ $pwd->educational_attainment }}
                                            </td>
                                            <td>
                                                Status: {{ $pwd->status_of_employment }} <br>
                                                Type: {{ $pwd->types_of_employment }} <br>
                                                Category: {{ $pwd->category_of_employment }} <br>
                                            </td>
                                            <td>{{ $pwd->occupation == 'Others' ? $pwd->occupation_others : $pwd->occupation }}
                                            </td>

                                            <!-- Organization Information -->
                                            <td>
                                                Org: {{ $pwd->organization_affiliated }}<br>
                                                Contact: {{ $pwd->contact_person }}<br>
                                                Office: {{ $pwd->office_address }}<br>
                                                Tel No: {{ $pwd->office_tel_no }}
                                            </td>

                                            <!-- Identification Numbers -->
                                            <td>
                                                SSS No: {{ $pwd->sss_no }}<br>
                                                GSIS No: {{ $pwd->gsis_no }}<br>
                                                PAGIBIG No: {{ $pwd->pagibig_no }}<br>
                                                PSN No: {{ $pwd->psn_no }}<br>
                                                PhilHealth No: {{ $pwd->philhealth_no }}
                                            </td>

                                            <!-- Family Information -->
                                            <td>
                                                Father: {{ $pwd->father_last_name }},
                                                {{ $pwd->father_first_name }}
                                                {{ $pwd->father_middle_name }}<br>
                                                Mother: {{ $pwd->mother_last_name }},
                                                {{ $pwd->mother_first_name }}
                                                {{ $pwd->mother_middle_name }}<br>
                                                Guardian: {{ $pwd->guardian_last_name }},
                                                {{ $pwd->guardian_first_name }}
                                                {{ $pwd->guardian_middle_name }}
                                            </td>

                                            <!-- Form Fill-up Information -->
                                            <td>
                                                Accomplished By: {{ $pwd->accomplished_by }}<br>
                                                Last Name: {{ $pwd->accomplished_by_last_name }}<br>
                                                First Name: {{ $pwd->accomplished_by_first_name }}<br>
                                                Middle Name: {{ $pwd->accomplished_by_middle_name }}
                                            </td>

                                            <!-- Certification Information -->
                                            <td>
                                                Certifying Physician: {{ $pwd->name_of_certifying_physician }}<br>
                                                License No: {{ $pwd->license_no }}<br>
                                                Processing Officer: {{ $pwd->processing_officer }}<br>
                                                Approving Officer: {{ $pwd->approving_officer }}<br>
                                                Encoder: {{ $pwd->encoder }}<br>
                                                Reporting Unit/Office Section:
                                                {{ $pwd->name_of_reporting_unit_office_section }}<br>
                                                Control No: {{ $pwd->control_no }}
                                            </td>

                                            <!-- Actions -->
                                            <td>
                                                <a href="{{ route('pwds.edit', $pwd->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('pwds.destroy', $pwd->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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
