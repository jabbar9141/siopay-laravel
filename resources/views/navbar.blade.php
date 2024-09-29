<!-- Topbar Start -->
<nav class="navbar navbar-expand-lg">
    <div class="md:px-44 w-full p-2 flex justify-between items-center" style="color: black">
        <div>
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/img/gallery/siopay.png') }}" height="45" alt="logo">
            </a>
        </div>

        <!-- Mobile Menu Toggler -->
        <button class="navbar-toggler lg:hidden text-gray-500 focus:outline-none focus:border-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6h16.5m-16.5 6h16.5m-16.5 6h16.5" />
            </svg>
        </button>

        <div class="lg:flex space-x-3 items-center hidden">
            <a href="/">{{ trans('nav.1') }}</a>
            {{-- <a href="{{ route('who_we_are') }}">{{ trans('nav.2') }}</a> --}}
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Payment Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Money Transfer</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Remitance</a></li>
                    <li><a class="dropdown-item" href="{{ route('tup_up_page') }}">Prepaid Card Top-up</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">SEPA Payments</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">QR Payments</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Payment Gateway API</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Digital Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <li><a class="dropdown-item" href="{{ route('spdi_page') }}">Digital Signature</a></li>
                    <li><a class="dropdown-item" href="{{ route('pec_page') }}">PEC</a></li>
                    <li><a class="dropdown-item" href="{{ route('spdi_page') }}">SPID</a></li>
                    <li><a class="dropdown-item" href="https://dash.siodatacheck.com/" target="_blank">ID & AML
                            Verifications</a></li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Utilities
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                    <li><a class="dropdown-item" href="{{ route('electricity') }}">Electricity Bill</a></li>
                    <li><a class="dropdown-item" href="{{ route('gas_page') }}">Gas Bill</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Telephone Bill</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Pagopa</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Road Tax</a></li>
                    <li><a class="dropdown-item" href="{{ route('tup_up_page') }}">VTU</a></li>
                    <li><a class="dropdown-item" href="{{ route('payment_page') }}">Gift Cards</a></li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown9" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Ticket Resale
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown9">
                    <li><a class="dropdown-item" href="{{ route('ticket_resale_page') }}">FlixBus</a></li>
                    <li><a class="dropdown-item" href="{{ route('ticket_resale_page') }}">Tranitalia</a></li>
                </ul>
            </div>
            <a href="{{ route('contact') }}">{{ trans('nav.9') }}</a>
            <div class="nav-item dropdown">
                <a class="dropdown-toggle" href="#" id="langDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if (session('locale') == 'en' || app()->getLocale() == 'en')
                        English
                    @else
                        Italiano
                    @endif
                </a>
                <ul class="dropdown-menu lang-dp" aria-labelledby="langDropdown">
                    <li><a class="dropdown-item" href="{{ route('set-lang', 'en') }}">{!! session('locale') == 'en' || app()->getLocale() == 'en'
                        ? '<i class="fa fa-check text-success"></i> English'
                        : 'English' !!}</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('set-lang', 'it') }}">{!! session('locale') == 'it' || app()->getLocale() == 'it'
                        ? '<i class="fa fa-check text-success"></i> Italiano'
                        : 'Italiano' !!}</a>
                    </li>
                </ul>
            </div>
            @guest
                @if (Route::has('login'))
                    <a class="bg-primary text-white p-2 rounded-full px-3"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown4" class="dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{-- {{ Auth::user()->name }} --}}
                    </a>
                    <ul class="dropdown-menu service-menu dropdown-menu-end" aria-labelledby="navbarDropdown4">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                        </form>
                    </ul>
                </div>
                <a href="{{ route('home') }}">{{ trans('nav.10') }}</a>
            @endguest
        </div>

    </div>
</nav>

<nav class="navbar hidden navbar-expand-lg" style="color: black" id="navbarSupportedContent">
    <div class="block">
        <div>
            <a href="#">{{ trans('nav.1') }}</a>
        </div>
        {{-- <div>
            <a href="{{ route('who_we_are') }}">{{ trans('nav.2') }}</a>
        </div> --}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Payment Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown5">
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Money Transfer</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Remitance</a></li>
                <li><a class="dropdown-item" href="{{ route('tup_up_page') }}">Prepaid Card Top-up</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">SEPA Payments</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">QR Payments</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Payment Gateway API</a>
                </li>
            </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown6" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Digital Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown6">
                <li><a class="dropdown-item" href="{{ route('spdi_page') }}">Digital Signature</a></li>
                <li><a class="dropdown-item" href="{{ route('pec_page') }}">PEC</a></li>
                <li><a class="dropdown-item" href="{{ route('spdi_page') }}">SPID</a></li>
                <li><a class="dropdown-item" href="https://dash.siodatacheck.com/" target="_blank">ID & AML
                        Verifications</a></li>
            </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown7" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Utilities
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown7">
                <li><a class="dropdown-item" href="{{ route('electricity') }}">Electricity Bill</a></li>
                <li><a class="dropdown-item" href="{{ route('gas_page') }}">Gas Bill</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Telephone Bill</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Pagopa</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Road Tax</a></li>
                <li><a class="dropdown-item" href="{{ route('tup_up_page') }}">VTU</a></li>
                <li><a class="dropdown-item" href="{{ route('payment_page') }}">Gift Cards</a></li>
            </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown8" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Ticket Resale
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown8">
                <li><a class="dropdown-item" href="{{ route('ticket_resale_page') }}">FlixBus</a></li>
                <li><a class="dropdown-item" href="{{ route('ticket_resale_page') }}">Tranitalia</a></li>
            </ul>
        </div>
        <div>
            <a href="{{ route('contact') }}">{{ trans('nav.9') }}</a>
        </div>
        <!-- Language Dropdown -->
        <div class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" id="langDropdown2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ session('locale') == 'en' || app()->getLocale() == 'en' ? 'English' : 'Italiano' }}
            </a>
            <ul class="dropdown-menu lang-dp" aria-labelledby="langDropdown2">
                <li><a class="dropdown-item" href="{{ route('set-lang', 'en') }}">{!! session('locale') == 'en' || app()->getLocale() == 'en'
                    ? '<i class="fa fa-check text-success"></i> English'
                    : 'English' !!}</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('set-lang', 'it') }}">{!! session('locale') == 'it' || app()->getLocale() == 'it'
                    ? '<i class="fa fa-check text-success"></i> Italiano'
                    : 'Italiano' !!}</a>
                </li>
            </ul>
        </div>
        <!-- Authentication Links -->
        <div class="mt-3">
            @guest
                @if (Route::has('login'))
                    <a class="bg-primary text-white p-2 rounded-full px-3"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown8" class="dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu service-menu dropdown-menu-end" aria-labelledby="navbarDropdown8">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                        </form>
                    </ul>
                </div>
                <a href="{{ route('home') }}">{{ trans('nav.10') }}</a>
            @endguest
        </div>

    </div>
</nav>
<style>
    .navbar-toggler {
        outline: none;
        border: none;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>
