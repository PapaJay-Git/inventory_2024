@extends('layouts.app')

@section('title')
    Barangay {{ str_replace('_', ' ', $id) }} Forms
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow bg-white blurred-card">
                    <div class="card-header bg-light fw-bold d-flex justify-content-between">
                        <span class="d-flex justify-content-between">
                            <span class="mx-1 fw-bold text-uppercase">Barangay {{ str_replace('_', ' ', $id) }} Forms</span>
                        </span>
                        <a href="/" class="btn btn-primary btn-sm fw-bold">
                            BACK HOME
                        </a>
                    </div>

                    <div class="card-body">
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
                                        <th scope='col'>ID</th>
                                        <th scope='col'>Barangay Name</th>
                                        <th scope='col'>PSGC Barangay</th>
                                        <th scope='col'>Number of Data</th>
                                        <th scope='col'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                        <tr>
                                            <td class="text-start text-nowrap">{{ $form->id }}</td>
                                            <td class="text-start text-nowrap fw-bold text-uppercase">{{ $form->name }}
                                            </td>
                                            <td class="text-start text-nowrap text-uppercase">{{ $form->psgc_barangay }}
                                            </td>
                                            <td class="text-start text-nowrap text-uppercase">{{ $form->data_count }}</td>
                                            <td class="d-flex flex-row gap-1 align-items-center">
                                                <a href="{{ "/admin_$id?id=$form->id" }}"
                                                    class="btn btn-sm fw-bold btn-primary m-1 text-nowrap text-uppercase">Check
                                                    {{ str_replace('_', ' ', $id) }}</a>
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
