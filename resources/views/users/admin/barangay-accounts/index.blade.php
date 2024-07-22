@extends('layouts.app')

@section('title')
    Barangay Accounts
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-white blurred-card">
                <div class="card-header bg-light fw-bold">
                    <span class="d-flex justify-content-between">
                        <span class="mx-1 fw-bold">BARANGAY ACCOUNTS</span>
                        <a href="/barangay-accounts/create" class="btn btn-primary btn-sm fw-bold" >
                            CREATE ACCOUNT
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <div class="mt-5">
                        <table id='myTable' class='stripe'>
                            <thead>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Username</th>
                                    <th scope='col'>Barangay Name</th>
                                    <th scope='col'>PSGC Barangay</th>
                                    <th scope='col'>Actions</th>
                                </tr>
                            </thead>
                            <tbody >

                            </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var activeLink = document.getElementById('barangay-svg');

    activeLink.classList.add('active-svg');
</script>
@endsection
