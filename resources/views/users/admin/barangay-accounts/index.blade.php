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
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Barangay Name</th>
                                    <th scope='col'>PSGC Barangay</th>
                                    <th scope='col'>Account Username</th>
                                    <th scope='col'>Actions</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($barangays as $barangay)
                                    <tr>
                                        <td class="text-start text-nowrap">{{ $barangay->id  }}</td>
                                        <td class="text-start text-nowrap fw-bold text-uppercase">{{ $barangay->name  }}</td>
                                        <td class="text-start text-nowrap text-uppercase">{{ $barangay->psgc_barangay  }}</td>
                                        <td class="text-start text-nowrap text-uppercase">{{ $barangay->username  }}</td>
                                        <td class="d-flex flex-row gap-1 align-items-center">
                                            <a href="{{ "/barangay-accounts/$barangay->id/edit"  }}" class="btn btn-sm fw-bold btn-primary m-1 text-nowrap">Edit</a>
                                            <form action="/barangay-accounts/{{ $barangay->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this barangay?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold text-nowrap">Delete</button>
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
    var activeLink = document.getElementById('barangay-svg');

    activeLink.classList.add('active-svg');
</script>
@endsection
