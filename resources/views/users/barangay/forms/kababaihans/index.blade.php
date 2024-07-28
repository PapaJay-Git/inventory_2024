@extends('layouts.app')

@section('title')
    {{ isset($barangay) ? ucwords(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }} Kababaihan Records
@endsection

@section('content')
    @php
        $data_name = 'kababaihans';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span
                                class="mx-1 fw-bold">{{ isset($barangay) ? strtoupper(str_replace('_', ' ', "Barangay $barangay  - ")) : '' }}Kababaihan
                                Records</span>
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
                                        <th>Date</th>
                                        <th>Full Name</th>
                                        <th>Date of Birth</th>
                                        <th>City Address</th>
                                        <th>Provincial Address</th>
                                        <th>Civil Status</th>
                                        <th>Citizenship</th>
                                        <th>Religion</th>
                                        <th>Mobile Number</th>
                                        <th>Occupation</th>
                                        <th>Educational Attainment</th>
                                        <th>Spouse Name</th>
                                        <th>Number of Children</th>
                                        <th>Emergency Contact</th>
                                        <th>Pictures of ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kababaihans as $kababaihan)
                                        <tr>
                                            <td>{{ $kababaihan->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($kababaihan->date)->format('Y-m-d') }}</td>
                                            <td>{{ $kababaihan->last_name }}, {{ $kababaihan->first_name }}
                                                {{ $kababaihan->middle_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($kababaihan->date_of_birth)->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $kababaihan->city_address }}</td>
                                            <td>{{ $kababaihan->provincial_address }}</td>
                                            <td>{{ $kababaihan->civil_status }}</td>
                                            <td>{{ $kababaihan->citizenship }}</td>
                                            <td>{{ $kababaihan->religion }}</td>
                                            <td>{{ $kababaihan->mobile_number }}</td>
                                            <td>{{ $kababaihan->occupation }}</td>
                                            <td>{{ $kababaihan->educational_attainment }}</td>
                                            <td>{{ $kababaihan->spouse_name }}</td>
                                            <td>{{ $kababaihan->number_of_children }}</td>
                                            <td>
                                                <div class="border p-2 mb-2">
                                                    <strong>Contact Name:</strong>
                                                    {{ $kababaihan->emergency_contact_name }}<br>
                                                    <strong>Contact Number:</strong>
                                                    {{ $kababaihan->emergency_contact_number }}
                                                </div>
                                            </td>
                                            <td>
                                                @if ($kababaihan->image_paths)
                                                    <ul>
                                                        @foreach (json_decode($kababaihan->image_paths, true) as $path)
                                                            <li><a href="{{ config('app.kababaihan_images_path') . $path }}"
                                                                    target="_blank">View Image</a></li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    No Images
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $data_id = $kababaihan->id;
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
