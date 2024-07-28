@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('Dashboard') }}</div>

                    <div class="card-body row">
                        @foreach ($counts as $count)
                            <div class="col-md-6 col-lg-4">
                                <a class="card shadow p-3 mb-5 bg-primary text-white rounded" role="button"
                                    href="/{{ $startingURL . $count['url'] }}">
                                    <span class="card-body">
                                        <h5 class="card-title text-center fw-bold">
                                            {{ $count['name'] }}
                                        </h5>
                                        <p class="card-text text-center">
                                            {{ $count['count'] }}
                                        </p>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var activeLink = document.getElementById('home-svg');

        activeLink.classList.add('active-svg');
    </script>
@endsection
