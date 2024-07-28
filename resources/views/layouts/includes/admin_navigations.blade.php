<nav class="bg-primary shadow-sm fixed-top">
    <div class="container d-flex flex-column flex-md-row justify-content-md-between py-1 py-md-3">
        <a class="fw-bold text-white d-flex align-items-start flex-column gap-2 bebas-font fs-2"
            href="{{ url('/') }}">
            <span style="height:50px">
                <img src="{{ asset('logos/bayan_ng_paniqui.png') }}" class="h-100 w-auto rounded-circle">
                <img src="{{ asset('logos/para_sa_bayan.png') }}" class="h-100 w-auto rounded-circle">
                <img src="{{ asset('logos/dswd.png') }}" class="h-100 w-auto">
            </span>
            ADMIN
        </a>

        <div class="px-2 px-md-0 pt-4 pt-md-0">
            <ul
                class="d-flex flex-row list-unstyled justify-content-between justify-content-md-end gap-2 gap-sm-3 h-100 align-items-center ms-auto w-100">
                <li class="nav-item dropdown ">
                    <a class="nav-link fw-bold text-white d-flex justify-content-center align-items-center flex-column"
                        href="{{ url('/') }}">
                        <img src="{{ asset('svgs/home.svg') }}" alt="HOME" class="svg-nav" id="home-svg" />

                        <small>HOME</small>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link fw-bold text-white d-flex justify-content-center align-items-center flex-column"
                        href="{{ url('/barangay-accounts') }}">
                        <img src="{{ asset('svgs/accounts.svg') }}" alt="ACCOUNTS" class="svg-nav" id="barangay-svg" />

                        <small>ACCOUNTS</small>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown"
                        class="nav-link  fw-bold text-white d-flex justify-content-center align-items-center flex-column"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        <img src="{{ asset('svgs/forms.svg') }}" alt="FORMS" class="svg-nav" id="forms-svg" />
                        <small>FORMS</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-primary px-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/daycares">
                            Daycares
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/kabataans">
                            Kabataans
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/kababaihans">
                            Kababaihans
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/solo_parents">
                            Solo - Parents
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/pwds">
                            Person with Disabilit (PWDs)
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/forms/dafacs">
                            Disaster Assistance Family Cards (DAFAC)
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown"
                        class="nav-link  fw-bold text-white d-flex justify-content-center align-items-center flex-column"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        <img src="{{ asset('svgs/profile.svg') }}" alt="PROFILE" class="svg-nav" id="profile-svg" />
                        <small>PROFILE</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-primary px-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item fw-bold text-white bg-primary" href="/password">
                            PASSWORD
                        </a>
                        <a class="dropdown-item fw-bold text-white bg-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            LOGOUT
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
