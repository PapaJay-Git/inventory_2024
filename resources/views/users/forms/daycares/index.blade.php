@extends('layouts.app')

@section('title')
    Daycares
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold">DAYCARES</span>
                            <a href="/daycares/create" class="btn btn-primary btn-sm fw-bold">
                                CREATE DATA
                            </a>
                        </span>
                    </div>

                    <div class="card-body overflow-hidden">
                        <div class="mt-5">

                            @if (session('status'))
                                <div class="alert alert-success " role="alert">
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
                                        <th>ECCDF ID</th>
                                        <th>Facility Address</th>
                                        <th>Facility Name</th>
                                        <th>Service Provider</th>
                                        <th>Child Name</th>
                                        <th>Nickname</th>
                                        <th>Sex</th>
                                        <th>Birth Info</th>
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
                                                {{ $daycare->facility_street_address }},
                                                {{ $daycare->facility_barangay }},<br>
                                                {{ $daycare->facility_city_municipality }},
                                                {{ $daycare->facility_province }},<br>
                                                {{ $daycare->facility_region }}
                                            </td>
                                            <td>{{ $daycare->facility_name }}</td>
                                            <td>{{ $daycare->service_provider }}</td>
                                            <td>
                                                {{ $daycare->first_name }} {{ $daycare->middle_name }}
                                                {{ $daycare->last_name }}<br>
                                                {{ $daycare->ext }}
                                            </td>
                                            <td>{{ $daycare->nickname }}</td>
                                            <td>{{ $daycare->sex }}</td>
                                            <td>
                                                Born:
                                                {{ \Carbon\Carbon::parse($daycare->date_of_birth)->format('Y-m-d') }}<br>
                                                Place: {{ $daycare->birthplace }}<br>
                                                Registered:
                                                {{ \Carbon\Carbon::parse($daycare->birth_registered)->format('Y-m-d') }}
                                            </td>
                                            <td>
                                                {{ $daycare->home_street_address }}, {{ $daycare->home_barangay }},<br>
                                                {{ $daycare->home_city_municipality }}, {{ $daycare->home_province }},<br>
                                                {{ $daycare->home_region }}
                                            </td>
                                            <td>
                                                Religion: {{ $daycare->religion }}<br>
                                                Ethnicity: {{ $daycare->ethnicity }}<br>
                                            </td>
                                            <td>

                                                Breastfeeding: {{ $daycare->breastfeeding ? 'Yes' : 'No' }}<br>
                                                Kind of breastfeeding: {{ $daycare->kind_of_breastfeeding }}<br>
                                                Months of breastfeeding: {{ $daycare->breastfed_for_months }}<br>
                                                Supplementary Feeding:
                                                {{ $daycare->supplementary_feeding ? 'Yes' : 'No' }}<br>
                                                Days of supplmentary feeding:
                                                {{ $daycare->supplementary_feeding_for_days }}<br>
                                                Listahan Identified:
                                                {{ $daycare->listahanan_identified ? 'Yes' : 'No' }}<br>
                                                Pantawid Beneficiary:
                                                {{ $daycare->pantawid_beneficiary ? 'Yes' : 'No' }}<br>

                                            </td>
                                            <td>
                                                @foreach ($daycare->disabilities as $disability)
                                                    <div>{{ $disability->disability }} ({{ $disability->cause }})</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($daycare->eccdExperiences as $experience)
                                                    <div>{{ $experience->service_type }}: {{ $experience->service }}<br>
                                                        ({{ $experience->from_date ? \Carbon\Carbon::parse($experience->from_date)->format('Y-m-d') : 'N/A' }}
                                                        -
                                                        {{ $experience->to_date ? \Carbon\Carbon::parse($experience->to_date)->format('Y-m-d') : 'N/A' }})
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                Participation Fee:
                                                {{ $daycare->participation_fee_paid ? 'Yes' : 'No' }}<br>
                                                Participation Amount: {{ $daycare->participation_fee_amount }}<br>
                                                Parents Counterpart:
                                                {{ $daycare->parents_counterpart }}<br>
                                                Attendance Status: {{ $daycare->attendance_status }}<br>
                                                Scheduled Session: {{ $daycare->scheduled_session }}<br>
                                                School Year: {{ $daycare->school_year }}
                                            </td>
                                            <td>
                                                Accomplished By: {{ $daycare->accomplished_by }}<br>
                                                Name of EECD Service Provider:
                                                {{ $daycare->name_of_eccd_service_provider }}<br>
                                                Date Accomplished:
                                                {{ \Carbon\Carbon::parse($daycare->date_accomplished)->format('Y-m-d') }}<br>
                                                Encoder ID: {{ $daycare->encoder_id }}
                                            </td>
                                            <td>
                                                <a href="{{ route('daycares.edit', $daycare->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('daycares.destroy', $daycare->id) }}" method="POST"
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
