@extends('layouts.app')

@section('title')
    Kabataans
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold">Kabataans</span>
                            <a href="/kabataans/create" class="btn btn-primary btn-sm fw-bold">
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

                                                <div class="border p-2 mb-2">
                                                    @if ($kabataan->post_graduate_course)
                                                        <strong>Post Graduate Course:</strong>
                                                        {{ $kabataan->post_graduate_course }}<br>
                                                        <strong>Year Taken:</strong>
                                                        {{ $kabataan->post_graduate_year }}<br>
                                                    @endif
                                                    @if ($kabataan->college_course)
                                                        <strong>College Course:</strong>
                                                        {{ $kabataan->college_course }}<br>
                                                        <strong>Year Taken:</strong> {{ $kabataan->college_year }}<br>
                                                    @endif
                                                    @if ($kabataan->high_school)
                                                        <strong>High School:</strong> {{ $kabataan->high_school }}<br>
                                                        <strong>Year Taken:</strong> {{ $kabataan->high_school_year }}<br>
                                                    @endif
                                                    @if ($kabataan->elementary)
                                                        <strong>Elementary:</strong> {{ $kabataan->elementary }}<br>
                                                        <strong>Year Taken:</strong> {{ $kabataan->elementary_year }}<br>
                                                    @endif
                                                    @if ($kabataan->other_education)
                                                        <strong>Other Education:</strong>
                                                        {{ $kabataan->other_education }}<br>
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
                                                <a href="{{ route('kabataans.edit', $kabataan->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('kabataans.destroy', $kabataan->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this data?')">
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
        var activeLink = document.getElementById('forms-svg');
        activeLink.classList.add('active-svg');
    </script>
@endsection
