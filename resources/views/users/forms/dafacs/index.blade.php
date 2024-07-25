@extends('layouts.app')

@section('title')
    Dafac Records
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold">DAFAC RECORDS</span>
                            <a href="{{ route('dafacs.create') }}" class="btn btn-primary btn-sm fw-bold">
                                CREATE DATA
                            </a>
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
                                                @foreach ($dafac->familyMembers as $member)
                                                    <div class="border p-2 mb-2">
                                                        <strong>Name:</strong> {{ $member->family_member_name }}<br>
                                                        <strong>Relationship:</strong>
                                                        {{ $member->relationship_to_head }}<br>
                                                        <strong>Age:</strong> {{ $member->age }}<br>
                                                        <strong>Gender:</strong> {{ $member->gender }}<br>
                                                        <strong>Education:</strong> {{ $member->education }}<br>
                                                        <strong>Occupational Skills:</strong>
                                                        {{ $member->occupational_skills }}<br>
                                                        <strong>Remarks:</strong> {{ $member->remarks }}
                                                    </div>
                                                @endforeach
                                            </td>

                                            {{-- Actions --}}
                                            <td>
                                                <a href="{{ route('dafacs.edit', $dafac->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('dafacs.destroy', $dafac->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash me-1"></i>Delete
                                                    </button>
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
        // Highlight the active link in the navigation
        var activeLink = document.getElementById('forms-svg');
        if (activeLink) {
            activeLink.classList.add('active-svg');
        }
    </script>
@endsection
