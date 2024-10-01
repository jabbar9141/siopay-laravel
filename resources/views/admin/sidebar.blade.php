<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('landing/assets/img/gallery/siopay.png') }}" height="45" alt="siopay_logo" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m1.5 10.5l9-9l9 9" />
                                <path
                                    d="M3.5 8.5v8a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-8" />
                            </g>
                        </svg>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                {{-- || optional(auth()->user()->admin)->can == 'all'
                    || optional(auth()->user()->admin)->can == 'all' --}}
                @if (Auth::user()->user_type == 'dispatcher')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Pay Bill</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/airtime" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21.33 19.035a2.57 2.57 0 0 1-.884 1.432a5.251 5.251 0 0 1-3.738 1.564h-.325a10.973 10.973 0 0 1-4.205-1.087h-.01c-.305-.142-.62-.284-.925-.457a19.127 19.127 0 0 1-4.185-3.18a18.193 18.193 0 0 1-3.9-5.292A11.692 11.692 0 0 1 2.14 8.572a6.38 6.38 0 0 1 .407-3.708a6.827 6.827 0 0 1 1.148-1.432A2.194 2.194 0 0 1 5.29 2.69a2.51 2.51 0 0 1 1.687.935c.457.497 1.015 1.015 1.473 1.493l.63.62c.37.328.599.786.64 1.28c0 .453-.167.89-.468 1.229a9.141 9.141 0 0 1-.62.68l-.203.213c-.118.11-.208.246-.264.397c-.05.147-.07.302-.06.457c.161.431.414.823.74 1.148c.509.69 1.017 1.29 1.535 1.94a12.9 12.9 0 0 0 3.29 2.733c.127.093.273.155.428.182c.134.01.27-.01.396-.06c.355-.209.67-.477.934-.793a2.174 2.174 0 0 1 1.422-.782a2.032 2.032 0 0 1 1.423.61c.203.172.426.406.64.63l.304.314l.315.305l.539.548c.321.285.623.59.904.915c.282.39.409.872.355 1.35m-3.646-6.958a.772.772 0 0 1-.762-.762a4.37 4.37 0 0 0-4.378-4.378a.762.762 0 0 1 0-1.524a5.893 5.893 0 0 1 5.902 5.902a.762.762 0 0 1-.762.762" />
                                <path fill="currentColor"
                                    d="M21.209 11.72a.772.772 0 0 1-.762-.761a7.455 7.455 0 0 0-7.456-7.467a.762.762 0 1 1 0-1.523a8.98 8.98 0 0 1 8.98 8.99a.762.762 0 0 1-.762.762" />
                            </svg>
                            <span class="hide-menu">Airtime VTU</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/internet" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 21q-1.05 0-1.775-.725T9.5 18.5t.725-1.775T12 16t1.775.725t.725 1.775t-.725 1.775T12 21m-5.65-5.65l-2.1-2.15q1.475-1.475 3.463-2.337T12 10t4.288.875t3.462 2.375l-2.1 2.1q-1.1-1.1-2.55-1.725T12 13t-3.1.625t-2.55 1.725M2.1 11.1L0 9q2.3-2.35 5.375-3.675T12 4t6.625 1.325T24 9l-2.1 2.1q-1.925-1.925-4.462-3.012T12 7T6.563 8.088T2.1 11.1" />
                            </svg>
                            <span class="hide-menu">Internet</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/cable" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path
                                        d="M2 20V9a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 2.5L12 6l3.5-3.5" />
                                </g>
                            </svg>
                            <span class="hide-menu">Cable TV</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link flex items-center justify-between text-gray-700 hover:text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-md transition-colors duration-200"
                            href="javascript:void(0)" aria-expanded="false">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="-7.5 -3.5 24 24" class="mr-2">
                                    <path fill="currentColor"
                                        d="M5.708 4.968h1.789a1.5 1.5 0 0 1 1.378 2.09l-3.96 9.243a1.049 1.049 0 0 1-2.012-.413v-6.92L1.45 8.923A1.5 1.5 0 0 1 0 7.423V1.5A1.5 1.5 0 0 1 1.5 0h2.708a1.5 1.5 0 0 1 1.5 1.5z" />
                                </svg>
                                <span class="hide-menu">Utility Bill</span>
                            </div>
                        </a> --}}
                    <li class="sidebar-item">
                        <a href="/dashboard/utilities/electricity"
                            class="sidebar-link flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-md transition-colors duration-200">
                            <span class="hide-menu">Electricity Bill</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/dashboard/utilities/gas"
                            class="sidebar-link flex items-center text-gray-700 hover:text-gray-900 hover:bg-gray-200 px-4 py-2 rounded-md transition-colors duration-200">
                            <span class="hide-menu">Gas Bill</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/prepaid_order" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <rect width="416" height="320" x="48" y="96" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="32" rx="56"
                                    ry="56" />
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="60"
                                    d="M48 192h416M128 300h48v20h-48z" />
                            </svg>
                            <span class="hide-menu">Prepaid Card</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->user_type == 'dispatcher')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Money Transfer</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/eu_fund_trasfer_order" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M16 3C8.832 3 3 8.832 3 16s5.832 13 13 13s13-5.832 13-13S23.168 3 16 3m0 2c2.103 0 4.063.605 5.736 1.633l-.236.566l1.176 1.176l-1.102 1.1L20 8h-2l-2 2.5l1 2.2l1-.7v-1h1l1.1.9L19 13l-4 2h-1v2h1l2-1l1 1h2v-1l.8-1.2L23 14v2h-2v1h2l2 3l1-1v-1h-1v-1h1l.96-.207A10.914 10.914 0 0 1 25 22.305V22h-1.1l-2.4-4l-2.5 1l-3-1l-3 1l-1 3l1 2h2l1-1l1 1v2.95c-.33.03-.662.05-1 .05c-6.065 0-11-4.935-11-11c0-.927.129-1.823.346-2.684L5.9 13H7V9.695c.167-.237.337-.472.521-.695h.899l.437-1.35a11.02 11.02 0 0 1 2.053-1.392L10 9h2l2-2V6h-1l-1 1V5.764A10.927 10.927 0 0 1 16 5m-2 6v2h1v-2z" />
                            </svg>
                            <span class="hide-menu">EU Transfer</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/intl_fund_trasfer_order" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 64 64">
                                <path fill="currentColor"
                                    d="M32 2C15.432 2 2 15.432 2 32l.001.053l-.001.053C2 48.616 15.357 62 31.835 62l.064-.002L32 62c16.568 0 30-13.432 30-30S48.568 2 32 2m28 30c0 2.394-.302 4.717-.866 6.934c-.261-.18-.951.564-1.121-.422c-.213-1.224-1.593-2.074-2.336-1.489s-2.866 2.286-2.971 3.35c-.107 1.063-1.01 2.339-1.433 1.437c-.426-.904-1.698-3.723-1.646-4.467c.052-.744-.586.266-1.538-1.223c-.956-1.489-2.601-.214-3.928-.958c-1.327-.745-2.813-1.755-3.557-2.073c-.741-.32 1.327 2.977 1.593 2.552c.267-.425 1.327.319 1.646.319s1.167.744.637 1.436s-5.253 3.566-5.731 2.818c-.48-.748-3.29-6.541-3.769-6.186c-.478.355 2.973 6.398 3.557 6.77c.582.373 2.335.054 3.183-.318c.85-.372-1.751 4.148-2.864 4.68c-1.114.531-2.016 2.18-1.54 2.924c.478.744.531 3.563-.476 3.936c-1.01.371-1.381.956-1.063 1.648c.317.69-.742 1.859-1.22 2.604c-.479.744-2.335 2.286-2.495 2.712c-.158.426-2.44.319-3.344.319c-.901 0-.212-1.117-.319-2.073c-.104-.958-.9-1.862-.9-2.34c0-.479-.267-1.596-.637-2.127c-.371-.533-.479-1.543-.107-2.127c.373-.586.637-2.286-.104-3.031c-.744-.744-1.594-2.021-1.009-3.031c.584-1.01-.637-.903-1.645-1.383c-1.009-.479-3.079.16-4.14.32c-1.062.159-2.122-.266-2.441-.799c-.318-.531-1.008-1.86-1.715-2.18c-.705-.318-.301-1.701.123-2.232c.426-.531-.424-1.542 0-1.969c.426-.425.69-1.966 1.539-2.303c.85-.336.69-.567.716-1.365c.027-.798.955-.798 1.113-1.223c.16-.426.637-.638 1.595-.638c.955 0 2.572-.559 3.342-.745s2.097-.452 1.99.293c-.106.744-.079 1.594.424 1.594c.505 0 1.195.293 1.991.789c.796.495.822.09.929-.469s1.22-.346 2.372.186s2.723.159 3.225.107c.505-.055.718-1.569.585-2.074c-.134-.505-.929.239-1.433-.08c-.504-.318-1.195.08-1.698-.373c-.505-.451-.585-1.515 0-1.541c.583-.027.876-.213 1.22-.611c.346-.399 1.646-.638 2.15-.24c.503.399 1.248.665 1.697.213c.451-.451-.9-1.328-1.194-1.568c-.292-.239-.053-1.01-.344-1.01c-.293 0-.532.132-.372.505c.159.372-.849 1.036-1.01.665c-.158-.373-.423-1.09-.821-1.09c-.397 0-.928 1.808-.955 2.1c-.027.293-.717.771-1.273.771c-.556 0-.556.639-.265.932c.292.292.079 1.462-.451 1.529c-.531.068-.717-.12-.796-.573c-.079-.451-.61-.398-.637-1.329s-.611-1.382-.982-1.808s-1.327-1.675-1.698-1.116s1.327 1.755 1.777 2.073c.453.319.373 1.01.134 1.17s-.69 1.463-.955 1.568c-.267.106-.52-.396-.52-.396c-.398-.159.556-.638.716-.877c.158-.239-1.671-1.914-2.001-2.393s-1.74.398-2.376.08c-.637-.318-1.593 1.196-1.671 2.073c-.081.878-1.116 1.116-2.071 1.116c-.954 0-1.592-.717-1.272-1.435c.318-.718-.16-1.914.398-1.994c.557-.079 2.147 0 2.466-.877c.318-.877-1.513-1.675-.795-1.834c.715-.16 1.831-1.275 2.627-1.914c.794-.638.874-1.435 1.59-1.491c.718-.055-.158-1.381.479-1.779c.638-.399.796 1.436 1.274 1.436s1.431-.16 2.228.239s1.035-.399 1.354-1.437c.318-1.036 1.114-1.595 2.705-2.392c1.592-.798-1.829.239-2.467-.559c-.637-.798.239-2.553.638-3.792c.398-1.24-1.274 1.239-2.15 2.516c-.877 1.276.239 1.834.158 2.711c-.079.878-1.51 1.914-1.51 1.914c-.637.08-.558-1.196-.876-1.754c-.319-.558-.877-.319-1.753.319c-.876.638-.955-1.515-1.193-2.393c-.237-.876 1.433-1.994 2.218-2.59c.784-.598 2.079-3.471 3.513-5.703c1.434-2.233 3.503-1.117 4.06-.239c.559.876 1.989.318 3.344 1.914c1.354 1.595-.319 2.312-1.829 1.664c-1.515-.648.317 1.606 1.191 2.244c.876.637 1.354-1.436 1.673-1.914c.318-.479 1.511-.239 2.386-1.516c.877-1.276 2.866-1.036 4.002-.896c1.137.141.854-.699.138-1.386c-.53-.508.554-.063 1.83.56C54.476 12.768 60 21.737 60 32m-39.958-9.528c-.264-.273.267-1.348.505-1.667c.24-.319-.664-.213-.609.24c.053.451-.346 1.143-.903 1.329s-1.192.132-.875-.373c.317-.505.026-.957-.213-1.436c-.238-.479 1.326-.771 1.646-1.063c.318-.292-.503-.479-.478-.93c.027-.453.213-.851.529-.904c.319-.053.617-.257.903-.239c.877.054.609 2.047.929 2.686c.318.637 1.221 1.409 1.141 1.966c-.08.559-.25.878-.9.718c-.653-.16-1.698.824-2.098.638c-.399-.187.69-.692.423-.965m-5.718-11.181c.797.398 1.432-.324 1.988-.479c.659-.182 1.035 2.154.399 2.074c-.637-.08-1.353 1.276-2.273 1.196c-.921-.08-.513-.717-1.548-1.674c-.222-.206-.313-.392-.321-.555c.221-.213.441-.427.67-.632c.358-.095.783-.081 1.085.07m24.902 40.141c.743-.159.6-1.573 1.274-1.648c1.433-.159.053 3.828-.477 4.945c-.531 1.117-.745 1.063-1.25.372c-.507-.69-.343-1.808 0-2.339c.342-.533-.291-1.17.453-1.33" />
                            </svg>
                            <span class="hide-menu">Intl Tranfer</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Account</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/profile" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linejoin="round"
                                        d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                                    <circle cx="12" cy="7" r="3" />
                                </g>
                            </svg>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/deposit" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 56 56">
                                <path fill="currentColor"
                                    d="M46.847 8.448A6 6 0 0 1 47.052 10l-.001 6.001l.174.004A6 6 0 0 1 53 22v24a6 6 0 0 1-6 6H9a6 6 0 0 1-6-6V22l.003-.205l.01-.18a6.002 6.002 0 0 1 4.436-6.167l32.05-11.243a6 6 0 0 1 7.348 4.243M47 20H9a2 2 0 0 0-1.995 1.851l-.005.15v24a2 2 0 0 0 1.85 1.994L9 48h38a2 2 0 0 0 1.995-1.85L49 46V22a2 2 0 0 0-1.85-1.994zM37 30a4 4 0 1 1 0 8a4 4 0 0 1 0-8m3.68-21.965l-.048.011L17.957 16h25.094v-6a2 2 0 0 0-.03-.347l-.038-.17a2 2 0 0 0-2.304-1.448" />
                            </svg>
                            <span class="hide-menu">Deposit Funds</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/withdraw" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 56 56">
                                <path fill="currentColor"
                                    d="M46.847 8.448A6 6 0 0 1 47.052 10l-.001 6.001l.174.004A6 6 0 0 1 53 22v24a6 6 0 0 1-6 6H9a6 6 0 0 1-6-6V22l.003-.205l.01-.18a6.002 6.002 0 0 1 4.436-6.167l32.05-11.243a6 6 0 0 1 7.348 4.243M47 20H9a2 2 0 0 0-1.995 1.851l-.005.15v24a2 2 0 0 0 1.85 1.994L9 48h38a2 2 0 0 0 1.995-1.85L49 46V22a2 2 0 0 0-1.85-1.994zM37 30a4 4 0 1 1 0 8a4 4 0 0 1 0-8m3.68-21.965l-.048.011L17.957 16h25.094v-6a2 2 0 0 0-.03-.347l-.038-.17a2 2 0 0 0-2.304-1.448" />
                            </svg>
                            <span class="hide-menu">Withdraw Funds</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/transfer" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 56 56">
                                <path fill="currentColor"
                                    d="M46.847 8.448A6 6 0 0 1 47.052 10l-.001 6.001l.174.004A6 6 0 0 1 53 22v24a6 6 0 0 1-6 6H9a6 6 0 0 1-6-6V22l.003-.205l.01-.18a6.002 6.002 0 0 1 4.436-6.167l32.05-11.243a6 6 0 0 1 7.348 4.243M47 20H9a2 2 0 0 0-1.995 1.851l-.005.15v24a2 2 0 0 0 1.85 1.994L9 48h38a2 2 0 0 0 1.995-1.85L49 46V22a2 2 0 0 0-1.85-1.994zM37 30a4 4 0 1 1 0 8a4 4 0 0 1 0-8m3.68-21.965l-.048.011L17.957 16h25.094v-6a2 2 0 0 0-.03-.347l-.038-.17a2 2 0 0 0-2.304-1.448" />
                            </svg>
                            <span class="hide-menu">Transfer Funds</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/dashboard/add_bank" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 56 56">
                                <path fill="currentColor"
                                    d="M46.847 8.448A6 6 0 0 1 47.052 10l-.001 6.001l.174.004A6 6 0 0 1 53 22v24a6 6 0 0 1-6 6H9a6 6 0 0 1-6-6V22l.003-.205l.01-.18a6.002 6.002 0 0 1 4.436-6.167l32.05-11.243a6 6 0 0 1 7.348 4.243M47 20H9a2 2 0 0 0-1.995 1.851l-.005.15v24a2 2 0 0 0 1.85 1.994L9 48h38a2 2 0 0 0 1.995-1.85L49 46V22a2 2 0 0 0-1.85-1.994zM37 30a4 4 0 1 1 0 8a4 4 0 0 1 0-8m3.68-21.965l-.048.011L17.957 16h25.094v-6a2 2 0 0 0-.03-.347l-.038-.17a2 2 0 0 0-2.304-1.448" />
                            </svg>
                            <span class="hide-menu">Add Bank</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('dispatcher.settings') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            <span class="hide-menu">Settings</span>
                        </a>
                    </li>
                @endif

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard/profile" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linejoin="round"
                                    d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                                <circle cx="12" cy="7" r="3" />
                            </g>
                        </svg>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li> --}}
                @if (Auth::user()->user_type == 'admin' ||
                        Auth::user()->user_type == 'kyc_manager' ||
                        Auth::user()->user_type == 'account_manager')
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (Route::is('allUsers') || Route::is('agent.editSitting') || Route::is('createUser') || Route::is('editUser')) active @endif"
                            href="{{ route('allUsers') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="hide-menu">Manage Users</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('adminIntlFundOrders') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <span class="hide-menu">Manage International Transfers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('adminEUFundOrders') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <span class="hide-menu">Manage EU Transfers</span>
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link @if (Route::is('announcement.*')) 'active' @endif"
                            href="{{ route('announcement.index') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-bullhorn"></i>
                            </span>
                            <span class="hide-menu">Announcements</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (Route::is('admin.settings.*') ||
                                Route::is('eu_fund_rates.index') ||
                                Route::is('intl_funds_rate.index') ||
                                Route::is('transaction_limits.index')) 'active' @endif"
                            href="{{ route('setting.tabs') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-gear"></i>
                            </span>
                            <span class="hide-menu">Setting</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->user_type == 'admin')
                    {{-- <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Support</span>
                    </li> --}}

                    {{-- @if (Auth::user()->user_type == 'admin' && (optional(auth()->user()->admin)->can == 'all' || optional(auth()->user()->admin)->can == 'kyc'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/help" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                        <path
                                            d="M22 11.567c0 5.283-4.478 9.566-10 9.566q-.977.001-1.935-.178c-.459-.087-.688-.13-.848-.105c-.16.024-.388.145-.842.386a6.5 6.5 0 0 1-4.224.657a5.3 5.3 0 0 0 1.087-2.348c.1-.53-.148-1.045-.52-1.422C3.034 16.411 2 14.105 2 11.567C2 6.284 6.478 2 12 2s10 4.284 10 9.567" />
                                        <path
                                            d="M10 9.846C10 8.826 10.895 8 12 8s2 .827 2 1.846c0 .368-.116.71-.317.998C13.085 11.7 12 12.519 12 13.539V14m0 2.5h.009" />
                                    </g>
                                </svg>
                                <span class="hide-menu">Help & Support</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('walk_in_customers.index') }}"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M3 21V3h9v2H5v14h7v2zm13-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                                </svg>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    @endif --}}
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<style>
    .fas.fa-chevron-down {
        float: right;
    }
</style>
