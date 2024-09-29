<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIOPAY - Airtime | Data | Bill Payment" | @yield('page_title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Shipping in italy" name="keywords">
    <meta content="Shipping in italy" name="description">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" href="{{ asset('favicon_io/favicon.ico') }}" type="image/x-icon">

    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <meta name="theme-color" content="#218bff">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('landing2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('landing2/css/style.css') }}" rel="stylesheet">


    <style>
        @media only screen and (max-width: 767px) {

            .table>tbody>tr>td,
            .table>tbody>tr>th,
            .table>tfoot>tr>td,
            .table>tfoot>tr>th,
            .table>thead>tr>td,
            .table>thead>tr>th {
                display: block;
                min-width: 100% !important;
            }

            .table>thead>tr>th {
                display: none;
            }

            .table .filterBody span {
                display: block;
            }
        }

        .headi {
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>


    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Topbar Start -->
    @include('navbar')
    <!-- Navbar End -->

    <!-- Swiper -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 450px;">
                <div class="headi flex items-center h-auto md:h-screen p-5 bg-contain md:bg-cover" style=" background-image: linear-gradient(to right, white 30%, transparent), url('landing/assets/img/gallery/hero.png');">
                    <div class="w-full lg:w-1/2 flex flex-col items-center justify-center">
                        <div class="lg:w-[500px] space-y-3">
                            <h1 class="text-primary text-xl">Secure & Faster</h1>
                            <h1 class="md:text-4xl">The Best Payment <br> & Digital Services Platform</h1>

                            <p class="font-bold text-black">Elevate your business and add value to your offerings by
                                selecting
                                SIOPAY as your
                                payment services and digital service
                                solutions.</p>
                            <span class="fi fi-us"></span>

                            <div class="flex space-x-2">
                                <a href="{{ route('register') }}">
                                    <button
                                        class="bg-primary p-3 hover:bg-transparent hover:text-primary hover:border-2 hover:border-primary text-white rounded-full">Open
                                        Account</button>
                                </a>
                                <a href="{{ route('contact') }}">
                                    <button class="text-primary border-2 font-bold border-primary rounded-full p-3">Get
                                        in
                                        touch</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($announcements) > 0)
                @foreach ($announcements as $index => $announcement)
                    <div class="carousel-item" style="height: 450px;">
                        <div class="headi flex items-center h-auto md:h-screen p-5 bg-contain md:bg-cover" style=" background-image: linear-gradient(to right, white 30%, transparent), url('uploads/announcement/{{ $announcement->image }}');">
                            <div class="w-full lg:w-1/2 flex flex-col items-center justify-center">
                                <div class="lg:w-[500px] space-y-3">
                                    <h1 class="text-primary text-xl">Secure & Faster</h1>
                                    <h1 class="md:text-4xl">{{ $announcement->title }}</h1>

                                    <p class="font-bold text-black">{{ $announcement->description }}</p>
                                    <span class="fi fi-us"></span>

                                    <div class="flex space-x-2">
                                        <a href="{{ route('register') }}">
                                            <button
                                                class="bg-primary p-3 hover:bg-transparent hover:text-primary hover:border-2 hover:border-primary text-white rounded-full">Open
                                                Account</button>
                                        </a>
                                        <a href="{{ route('contact') }}">
                                            <button
                                                class="text-primary border-2 font-bold border-primary rounded-full p-3">Get
                                                in
                                                touch</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach          
            @endif
        </div>
    </div>
    {{-- End Slider --}}

    <div class="h-auto p-5 flex items-center justify-center">

        <div class="w-full px:[30px] md:px-[100px] flex-col-reverse md:flex-row flex items-center justify-between">

            <div class="flex w-full px-5 md:px-0 lg:w-1/2 items-center">
                <div class="w-full space-y-3">
                    <img src="/landing/assets/img/gallery/payment_icon.png" alt="" srcset="">
                    <h1>Payment Service</h1>
                    <p>SIOPAY offers a comprehensive range of payment services tailored to enhance the shopping
                        experience
                        for businesses and their customers. Our services encompass a diverse spectrum, including
                        telephone
                        top-ups, bill payments, Gift Cards, digital content, and account top-ups.</p>
                    <div>
                        <a href="/register" class="bg-primary text-white rounded-full hover:no-underline p-2">Get
                            Started</a>
                    </div>
                </div>
            </div>

            <div>
                <img src="/landing/assets/img/gallery/payment.png" alt="" srcset="">
            </div>

        </div>

    </div>

    <div class="h-auto bg-primary p-5">

        <h1 class="text-white text-center text-3xl">Our Services</h1>


        <div class="grid grid-cols-1 md:grid-cols-2 mt-10 lg:grid-cols-3 gap-8">

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="relative text-primary" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M32 376a56 56 0 0 0 56 56h336a56 56 0 0 0 56-56V222H32Zm66-76a30 30 0 0 1 30-30h48a30 30 0 0 1 30 30v20a30 30 0 0 1-30 30h-48a30 30 0 0 1-30-30ZM424 80H88a56 56 0 0 0-56 56v26h448v-26a56 56 0 0 0-56-56" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>Prepaid Card Top-Up</h1>
                    <p>Prepaid cards for handling your everyday expenses, especially in the realm of online purchases..
                    </p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('tup_up_page') }}">Get Started</a></button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="relative text-primary" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 21q-1.05 0-1.775-.725T9.5 18.5t.725-1.775T12 16t1.775.725t.725 1.775t-.725 1.775T12 21m-5.65-5.65l-2.1-2.15q1.475-1.475 3.463-2.337T12 10t4.288.875t3.462 2.375l-2.1 2.1q-1.1-1.1-2.55-1.725T12 13t-3.1.625t-2.55 1.725M2.1 11.1L0 9q2.3-2.35 5.375-3.675T12 4t6.625 1.325T24 9l-2.1 2.1q-1.925-1.925-4.462-3.012T12 7T6.563 8.088T2.1 11.1" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>Mobile Data/ Airtime Plan</h1>
                    <p>Get Internet Data for at lowest rates across Italy and across the world</p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('tup_up_page') }}">Get Started</a></button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 384 512"
                        class="relative text-primary">
                        <path fill="currentColor"
                            d="M0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V128L256 0H64C28.7 0 0 28.7 0 64m224 192h-64v-64h64zm96 0h-64v-64h32c17.7 0 32 14.3 32 32zm-64 128h64v32c0 17.7-14.3 32-32 32h-32zm-96 0h64v64h-64zm-96 0h64v64H96c-17.7 0-32-14.3-32-32zm0-96h256v64H64zm0-64c0-17.7 14.3-32 32-32h32v64H64z" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>Certified Electronic Signature(PEC)</h1>
                    <p>Enjoy secture mail signatures with our global PEC.</p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('pec_page') }}">Get Started</a></button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg class="text-primary relative" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 36 36">
                        <path fill="currentColor" d="M28 30H16v-8h-2v8H8v-8H6v8a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2v-8h-2Z"
                            class="clr-i-outline clr-i-outline-path-1" />
                        <path fill="currentColor"
                            d="m33.79 13.27l-4.08-8.16A2 2 0 0 0 27.92 4H8.08a2 2 0 0 0-1.79 1.11l-4.08 8.16a2 2 0 0 0-.21.9v3.08a2 2 0 0 0 .46 1.28A4.67 4.67 0 0 0 6 20.13a4.72 4.72 0 0 0 3-1.07a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.72 4.72 0 0 0 6.53-.52a2 2 0 0 0 .47-1.28v-3.09a2 2 0 0 0-.21-.9M30 18.13A2.68 2.68 0 0 1 27.82 17L27 15.88L26.19 17a2.71 2.71 0 0 1-4.37 0L21 15.88L20.19 17a2.71 2.71 0 0 1-4.37 0L15 15.88L14.19 17a2.71 2.71 0 0 1-4.37 0L9 15.88L8.18 17A2.68 2.68 0 0 1 6 18.13a2.64 2.64 0 0 1-2-.88v-3.08L8.08 6h19.84L32 14.16v3.06a2.67 2.67 0 0 1-2 .91"
                            class="clr-i-outline clr-i-outline-path-2" />
                        <path fill="none" d="M0 0h36v36H0z" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>SPDI and digital signatures</h1>
                    <p>Enhance Your Business's Credibility with SIOPAY’S SPDI and digital signature Service</p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('spdi_page') }}">Get Started</a></button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg class="relative text-primary" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 12.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M10.5 16a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0" />
                        <path fill="currentColor"
                            d="M17.526 5.116L14.347.659L2.658 9.997L2.01 9.99V10H1.5v12h21V10h-.962l-1.914-5.599zM19.425 10H9.397l7.469-2.546l1.522-.487zM15.55 5.79L7.84 8.418l6.106-4.878zM3.5 18.169v-4.34A3.008 3.008 0 0 0 5.33 12h13.34a3.009 3.009 0 0 0 1.83 1.83v4.34A3.009 3.009 0 0 0 18.67 20H5.332A3.01 3.01 0 0 0 3.5 18.169" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>Money Transfer</h1>
                    <p>Easy and convenient money transfer services from the comfort of your mobile phone or with our
                        agents.</p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('payment_page') }}">Get Started</a></button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg relative">
                <div
                    class="h-16 w-16 bg-gray-200 rounded-full items-center flex absolute justify-center -top-5 left-1/2 transform -translate-x-1/2">
                    <svg class="relative text-primary" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M848 359.3H627.7L825.8 109c4.1-5.3.4-13-6.3-13H436c-2.8 0-5.5 1.5-6.9 4L170 547.5c-3.1 5.3.7 12 6.9 12h174.4l-89.4 357.6c-1.9 7.8 7.5 13.3 13.3 7.7L853.5 373c5.2-4.9 1.7-13.7-5.5-13.7" />
                    </svg>
                </div>

                <div class="flex flex-col items-center space-y-3">
                    <h1>Bills, Gas & Bus/Train Tickets</h1>
                    <p>Pay Electricity bills, Renew Cable TV subscription, Purchase Bus / Train Tickets & do so much
                        more with
                        SIOPAY.</p>
                    <button class="bg-primary font-bold text-white w-full rounded-full p-2"><a
                            href="{{ route('ticket_resale_page') }}">Get Started</a></button>
                </div>
            </div>

        </div>

    </div>

    <div class="h-screen flex items-center justify-center">

        <div class="w-full px-[30px] md:px-[100px] flex flex-col-reverse md:flex-row gap-4 justify-between">

            <div class="flex w-full md:w-1/2 items-center">
                <div class="w-full space-y-3">
                    <div>
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2m-7 12h-2v-2h2zm1.8-5c-.3.4-.7.6-1.1.8c-.3.2-.4.3-.5.5c-.2.2-.2.4-.2.7h-2c0-.5.1-.8.3-1.1c.2-.2.6-.5 1.1-.8c.3-.1.5-.3.6-.5s.2-.5.2-.7c0-.3-.1-.5-.3-.7s-.5-.3-.8-.3s-.5.1-.7.2q-.3.15-.3.6h-2c.1-.7.4-1.3.9-1.7s1.2-.5 2.1-.5s1.7.2 2.2.6s.8 1 .8 1.7q.15.6-.3 1.2" />
                        </svg>
                    </div>
                    <h1 class="text-gray-400">Why choose us?</h1>
                    <h1 class="text-xl font-bold">Our Service is Fast and Secure</h1>

                    <div class="space-y-4">

                        <div class="flex justify-between border-b-2 py-1 border-b-blue-500">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 bg-primary rounded-full"></div>
                                <h1>Automation</h1>
                            </div>

                            <div>
                                <h1>99%</h1>
                            </div>
                        </div>

                        <div class="flex justify-between border-b-2 py-1 border-b-blue-500">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 bg-primary rounded-full"></div>
                                <h1>Speed & Security</h1>
                            </div>

                            <div>
                                <h1>99%</h1>
                            </div>
                        </div>

                        <div class="flex justify-between border-b-2 py-1 border-b-blue-500">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 bg-primary rounded-full"></div>
                                <h1>Customer Support</h1>
                            </div>

                            <div>
                                <h1>99%</h1>
                            </div>
                        </div>

                        <div class="flex justify-between border-b-2 py-1 border-b-blue-500">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 bg-primary rounded-full"></div>
                                <h1>Affordability</h1>
                            </div>

                            <div>
                                <h1>99%</h1>
                            </div>
                        </div>

                        <div class="flex justify-between border-b-2 py-1 border-b-blue-500">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 bg-primary rounded-full"></div>
                                <h1>World Wide Coverage</h1>
                            </div>

                            <div>
                                <h1>99%</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <img src="/landing/assets/img/gallery/why_us.png" alt="" srcset="">
            </div>

        </div>

    </div>

    <!--  Quote Request Start -->
    @include('findus')


    <!-- Services Start -->
    <div class="container-fluid pt-5">
        <!-- About Start -->
        <div class="container-fluid py-5">
            <!-- Video Modal -->
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="" id="video"
                                    allowscriptaccess="always" allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Testimonial Start -->
        <div class="container-fluid py-2 marquee-container">
            <div class="container">
                <div class="text-center pb-2">
                    {{-- <h6 class="text-primary text-uppercase font-weight-bold">{{ trans('homepage.60') }}</h6> --}}
                    <h1 class="mb-4">{{ trans('hompage.61') }}</h1>
                </div>
                <div class="marquee">
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part1.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part2.png') }}" alt="" style="width: 200px">
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part3.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part4.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part5.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part6.png') }}" alt="" style="width: 200px">
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part7.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part8.png') }}" alt="" style="width: 200px">
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part9.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part10.png') }}" alt="" style="width: 200px">
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part11.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part12.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part13.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part14.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part15.png') }}" alt="" style="width: 200px">
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                    <img src="{{ asset('landing2/img/part16.png') }}" alt="" style="width: 200px">
                </div> --}}
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part17.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part18.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part19.png') }}" alt="" style="width: 200px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landing2/img/part20.png') }}" alt="" style="width: 200px">
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->



        <!-- Blog Start -->
        {{-- <div class="container-fluid pt-5">
            <div class="container">
                <div class="text-center pb-2">
                    <h6 class="text-primary text-uppercase font-weight-bold">{{ __('hompage.64') }}</h6>
                    <h1 class="mb-4">{{ __('hompage.65') }}</h1>
                </div>
                <div class="row">
                </div>
            </div>
        </div> --}}
        <!-- Blog End -->
    </div>

    <!-- Footer Start -->
    @include('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        < /scrip> <
        link rel = "stylesheet"
        href = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity = "sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin = "anonymous"
        referrerpolicy = "no-referrer" / >
            <
            link rel = "stylesheet"
        href = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/blitzer/jquery-ui.min.css"
        integrity = "sha512-ibBo2Ns078qm7xZNTPbIrg5XP4pZ+Aujfmz0QFsce2f4LYpCnF1Esy6FkIRFBgXC9cY30XiS7Ui9+RpN8K7ICg=="
        crossorigin = "anonymous"
        referrerpolicy = "no-referrer" / >

            @if (!empty($_GET))
                <
                script >
                    document.addEventListener("DOMContentLoaded", function() {
                        // Check if the element with id "myTabContent" exists
                        var element = document.getElementById("myTabContent");
                        if (element) {
                            // Scroll to the element
                            element.scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                    });
    </script>
    @endif
    <script>
        $('#origin').autocomplete({
            source: "{{ route('locations.search') }}",
            minLength: 1,
            select: function(event, ui) {
                // Update the hidden input field with the selected value
                $('#origin_id').val(ui.item.value);

                // Update the visible input field with the label
                $('#origin').val(ui.item.label);

                // Prevent the default behavior of filling the input with the label
                event.preventDefault();
            }
        });

        $('#dest').autocomplete({
            source: "{{ route('locations.search') }}",
            minLength: 1,
            select: function(event, ui) {
                // Update the hidden input field with the selected value
                $('#dest_id').val(ui.item.value);

                // Update the visible input field with the label
                $('#dest').val(ui.item.label);

                // Prevent the default behavior of filling the input with the label
                event.preventDefault();
            }
        });

        function addRow() {
            let items_list = $('#items_list');
            let mar = `
            <tr>
                <td>
                    <select name="type[]" class="form-control type" onchange="calculateTotItems('type')" required>
                        <option value="">--{{ __('hompage.10') }}--</option>
                        <option value="percel">{{ __('hompage.11 ') }}</option>
                        <option value="doc">{{ __('hompage.12') }}</option>
                        <option value="pallet">{{ __('hompage.13') }}</option>
                    </select>
                </td>
                <td>
                    <input type="number" step="any" min="0" value="0" class="form-control len" onkeyup="calculateTot()" name="len[]">
                </td>
                <td>
                    <input type="number" step="any" min="0" value="0" class="form-control width" onkeyup="calculateTot()" name="width[]">
                </td>
                <td>
                    <input type="number" step="any" min="0" value="0" class="form-control height" onkeyup="calculateTot()" name="height[]">
                </td>
                <td>
                    <input type="number" step="any" min="0" value="0" class="form-control weight" onkeyup="calculateTot()" name="weight[]">
                </td>
                <td>
                    <input type="number" step="1" min="1" value="1" class="form-control count" onkeyup="calculateTot()" name="count[]">
                </td>
                <td>
                    <button class="btn btn-danger" type="button" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;

            items_list.append(mar);
        }

        function removeRow(obj) {
            $(obj).closest('tr').remove();
        }

        function calculateTot() {
            let the_classes = ['len', 'width', 'height', 'weight', 'count']
            for (let i = 0; i < the_classes.length; i++) {
                let total = 0;
                $('.' + the_classes[i]).each(function(o, e) {
                    if ($(this).val() != '') {
                        let c = (!$(this).hasClass('count')) ? $(this).parent().parent().find('.count').val() :
                            1; //find the count/qty on that row except for the count col
                        total = total + (parseFloat($(this).val()) * parseFloat(c));
                    }
                })
                $('#' + the_classes[i] + '-tot').text(total);
                $('#' + the_classes[i] + '_tot').val(total)
            }
        }

        function calculateTotItems(item_class) {
            let total = 0;
            $('.' + item_class).each(function(i, e) {
                if ($(this).val() != '') {
                    total = total + 1
                }
            })
            $('#' + item_class + '-tot').text(total);
        }

        function getRates() {
            let origin = $('#origin_id').val();
            let dest = $('#dest_id').val();
            let width = $('#width_tot').val();
            let height = $('#height_tot').val();
            let weight = $('#weight_tot').val();
            let length = $('#len_tot').val();
            let count = $('#count_tot').val();

            if (origin != '' && dest != '' && width != "" && height != "" && weight != "" && length != "" && count != "") {
                $.ajax({
                    url: "{{ route('rates.fetch') }}",
                    type: "GET",
                    data: {
                        origin: origin,
                        dest: dest,
                        width: width,
                        height: height,
                        weight: weight,
                        length: length,
                        count: count
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.length > 0) {
                            console.log(data);
                            let mar = '';
                            for (let j = 0; j < data.length; j++) {
                                mar += `
                                    <tr>

                                        <td>
                                            ${data[j].name}
                                        </td>
                                        <td>
                                            {{ __('hompage.66') }}: ${data[j].origin.name}
                                            {{ __('hompage.67') }}: ${data[j].destination.name}
                                        </td>
                                        <td>
                                            {{ __('hompage.68') }}: ${data[j].weight_start}
                                            {{ __('hompage.69') }}: ${data[j].weight_end}
                                        </td>
                                        <td>
                                            ${data[j].price}
                                        </td>
                                        <td>
                                            {{ __('hompage.5') }}: ${data[j].width}
                                            {{ __('hompage.6') }}: ${data[j].height}
                                            {{ __('hompage.4') }}: ${data[j].length}
                                        </td>
                                    </tr>

                                `;
                            }
                            $('#shipping_rate_list').html(mar);
                            //show second stage of form
                            $('.stage_2').show();
                        } else {
                            console.log('No results');
                            ($('#shipping_rate_list').html(
                                '<tr><td colspan="5">{{ __('hompage.70') }}</td></tr>'));
                            //hide second stage of form
                            $('.stage_2').hide();
                        }
                    }
                });
            } else {
                alert('Please fill out all fields accordingly in order to get rates ');
            }

        }
        const europeanTerritories = [
            // Recognized European Countries
            "Albania",
            "Andorra",
            "Austria",
            "Belarus",
            "Belgium",
            "Bosnia and Herzegovina",
            "Bulgaria",
            "Croatia",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Estonia",
            "Faroe Islands",
            "Finland",
            "France",
            "Germany",
            "Gibraltar",
            "Greece",
            "Guernsey",
            "Hungary",
            "Iceland",
            "Ireland",
            "Isle of Man",
            "Italy",
            "Jersey",
            "Kosovo",
            "Latvia",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Malta",
            "Moldova",
            "Monaco",
            "Montenegro",
            "Netherlands",
            "North Macedonia",
            "Norway",
            "Poland",
            "Portugal",
            "Romania",
            "Russia",
            "San Marino",
            "Serbia",
            "Slovakia",
            "Slovenia",
            "Spain",
            "Svalbard and Jan Mayen",
            "Sweden",
            "Switzerland",
            "Ukraine",
            "United Kingdom",
            "Vatican City",

            // Dependent Territories and Special Regions
            "Aland Islands",
            "Akrotiri and Dhekelia",
            "Åland Islands",
            "Azores",
            "Balearic Islands",
            "Canary Islands",
            "Ceuta and Melilla",
            "Channel Islands",
            "Crimea",
            "Curaçao",
            "French Guiana",
            "Gagauzia",
            "Gottland",
            "Greenland",
            "Guadeloupe",
            "Madeira",
            "Man, Isle of",
            "Nagorno-Karabakh",
            "Northern Cyprus",
            "Republika Srpska",
            "Sark",
            "Sealand",
            "Transnistria",
        ];

        let countries = [
            "Afghanistan",
            "Albania",
            "Algeria",
            "Andorra",
            "Angola",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bhutan",
            "Bolivia",
            "Bosnia and Herzegovina",
            "Botswana",
            "Brazil",
            "Brunei",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Colombia",
            "Comoros",
            "Congo (Congo-Brazzaville)",
            "Costa Rica",
            "Croatia",
            "Cuba",
            "Cyprus",
            "Czechia (Czech Republic)",
            "Democratic Republic of the Congo (Congo-Kinshasa)",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini (fmr. Swaziland)",
            "Ethiopia",
            "Fiji",
            "Finland",
            "France",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Greece",
            "Grenada",
            "Guatemala",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Holy See",
            "Honduras",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran",
            "Iraq",
            "Ireland",
            "Israel",
            "Italy",
            "Ivory Coast",
            "Jamaica",
            "Japan",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Kuwait",
            "Kyrgyzstan",
            "Laos",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Mauritania",
            "Mauritius",
            "Mexico",
            "Micronesia",
            "Moldova",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Morocco",
            "Mozambique",
            "Myanmar (formerly Burma)",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "North Korea",
            "North Macedonia (formerly Macedonia)",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine State",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Poland",
            "Portugal",
            "Qatar",
            "Romania",
            "Russia",
            "Rwanda",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Korea",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Sweden",
            "Switzerland",
            "Syria",
            "Tajikistan",
            "Tanzania",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States of America",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Zambia",
            "Zimbabwe",
        ];

        // Initialize autocomplete
        $("#s_country_eu").autocomplete({
            source: europeanTerritories,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#rx_country_eu").autocomplete({
            source: europeanTerritories,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#s_country").autocomplete({
            source: countries,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        // Initialize autocomplete
        $("#rx_country").autocomplete({
            source: countries,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });

        var currencies = [
            'AED - United Arab Emirates Dirham',
            'AFN - Afghan Afghani',
            'ALL - Albanian Lek',
            'AMD - Armenian Dram',
            'ANG - Netherlands Antillean Guilder',
            'AOA - Angolan Kwanza',
            'ARS - Argentine Peso',
            'AUD - Australian Dollar',
            'AWG - Aruban Florin',
            'AZN - Azerbaijani Manat',
            'BAM - Bosnia-Herzegovina Convertible Mark',
            'BBD - Barbadian Dollar',
            'BDT - Bangladeshi Taka',
            'BGN - Bulgarian Lev',
            'BHD - Bahraini Dinar',
            'BIF - Burundian Franc',
            'BMD - Bermudian Dollar',
            'BND - Brunei Dollar',
            'BOB - Bolivian Boliviano',
            'BRL - Brazilian Real',
            'BSD - Bahamian Dollar',
            'BTN - Bhutanese Ngultrum',
            'BWP - Botswanan Pula',
            'BYN - Belarusian Ruble',
            'BZD - Belize Dollar',
            'CAD - Canadian Dollar',
            'CDF - Congolese Franc',
            'CHF - Swiss Franc',
            'CLP - Chilean Peso',
            'CNY - Chinese Yuan',
            'COP - Colombian Peso',
            'CRC - Costa Rican Colón',
            'CUP - Cuban Peso',
            'CVE - Cape Verdean Escudo',
            'CZK - Czech Republic Koruna',
            'DJF - Djiboutian Franc',
            'DKK - Danish Krone',
            'DOP - Dominican Peso',
            'DZD - Algerian Dinar',
            'EGP - Egyptian Pound',
            'ERN - Eritrean Nakfa',
            'ETB - Ethiopian Birr',
            'EUR - Euro',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'FJD - Fijian Dollar',
            'FKP - Falkland Islands Pound',
            'GEL - Georgian Lari',
            'GGP - Guernsey Pound',
            'GHS - Ghanaian Cedi',
            'GIP - Gibraltar Pound',
            'GMD - Gambian Dalasi',
            'GNF - Guinean Franc',
            'GTQ - Guatemalan Quetzal',
            'GYD - Guyanaese Dollar',
            'HKD - Hong Kong Dollar',
            'HNL - Honduran Lempira',
            'HRK - Croatian Kuna',
            'HTG - Haitian Gourde',
            'HUF - Hungarian Forint',
            'IDR - Indonesian Rupiah',
            'ILS - Israeli New Shekel',
            'IMP - Isle of Man Pound',
            'INR - Indian Rupee',
            'IQD - Iraqi Dinar',
            'IRR - Iranian Rial',
            'ISK - Icelandic Króna',
            'JEP - Jersey Pound',
            'JMD - Jamaican Dollar',
            'JOD - Jordanian Dinar',
            'JPY - Japanese Yen',
            'KES - Kenyan Shilling',
            'KGS - Kyrgystani Som',
            'KHR - Cambodian Riel',
            'KID - Kiribati Dollar',
            'KRW - South Korean Won',
            'KWD - Kuwaiti Dinar',
            'KYD - Cayman Islands Dollar',
            'KZT - Kazakhstani Tenge',
            'LAK - Laotian Kip',
            'LBP - Lebanese Pound',
            'LKR - Sri Lankan Rupee',
            'LRD - Liberian Dollar',
            'LSL - Lesotho Loti',
            'LYD - Libyan Dinar',
            'MAD - Moroccan Dirham',
            'MDL - Moldovan Leu',
            'MGA - Malagasy Ariary',
            'MKD - Macedonian Denar',
            'MMK - Myanma Kyat',
            'MNT - Mongolian Tugrik',
            'MOP - Macanese Pataca',
            'MRU - Mauritanian Ouguiya',
            'MUR - Mauritian Rupee',
            'MVR - Maldivian Rufiyaa',
            'MWK - Malawian Kwacha',
            'MXN - Mexican Peso',
            'MYR - Malaysian Ringgit',
            'MZN - Mozambican Metical',
            'NAD - Namibian Dollar',
            'NGN - Nigerian Naira',
            'NIO - Nicaraguan Córdoba',
            'NOK - Norwegian Krone',
            'NPR - Nepalese Rupee',
            'NZD - New Zealand Dollar',
            'OMR - Omani Rial',
            'PAB - Panamanian Balboa',
            'PEN - Peruvian Nuevo Sol',
            'PGK - Papua New Guinean Kina',
            'PHP - Philippine Peso',
            'PKR - Pakistani Rupee',
            'PLN - Polish Złoty',
            'PYG - Paraguayan Guarani',
            'QAR - Qatari Rial',
            'RON - Romanian Leu',
            'RSD - Serbian Dinar',
            'RUB - Russian Ruble',
            'RWF - Rwandan Franc',
            'SAR - Saudi Riyal',
            'SBD - Solomon Islands Dollar',
            'SCR - Seychellois Rupee',
            'SDG - Sudanese Pound',
            'SEK - Swedish Krona',
            'SGD - Singapore Dollar',
            'SHP - Saint Helena Pound',
            'SLL - Sierra Leonean Leone',
            'SOS - Somali Shilling',
            'SRD - Surinamese Dollar',
            'SSP - South Sudanese Pound',
            'STN - São Tomé and Príncipe Dobra',
            'SVC - Salvadoran Colón',
            'SYP - Syrian Pound',
            'SZL - Swazi Lilangeni',
            'THB - Thai Baht',
            'TJS - Tajikistani Somoni',
            'TMT - Turkmenistani Manat',
            'TND - Tunisian Dinar',
            'TOP - Tongan Pa\'anga',
            'TRY - Turkish Lira',
            'TTD - Trinidad and Tobago Dollar',
            'TWD - New Taiwan Dollar',
            'TZS - Tanzanian Shilling',
            'UAH - Ukrainian Hryvnia',
            'UGX - Ugandan Shilling',
            'USD - United States Dollar',
            'UYU - Uruguayan Peso',
            'UZS - Uzbekistan Som',
            'VES - Venezuelan Bolívar',
            'VND - Vietnamese Đồng',
            'VUV - Vanuatu Vatu',
            'WST - Samoan Tala',
            'XAF - Central African CFA Franc',
            'XCD - East Caribbean Dollar',
            'XOF - West African CFA Franc',
            'XPF - CFP Franc',
            'YER - Yemeni Rial',
            'ZAR - South African Rand',
            'ZMW - Zambian Kwacha',
            'ZWL - Zimbabwean Dollar',
        ];
        // Initialize autocomplete
        $("#rx_currency").autocomplete({
            source: currencies,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });
        // Initialize autocomplete
        $("#s_currency").autocomplete({
            source: currencies,
            minLength: 1 // Minimum number of characters before triggering autocomplete
        });
    </script>
</body>
<style>
    .marquee-container {
        overflow: hidden;
    }

    .marquee {
        display: flex;
        animation: marquee-animation 20s linear infinite;
    }

    @keyframes marquee-animation {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Keyframes for the typing animation */
    @keyframes typing {
        from {
            width: 0
        }

        to {
            width: 100%
        }
    }

    /* Apply animation to the text */
    .typing-animation {
        overflow: hidden;
        border-right: .15em solid orange;
        /* Change border properties according to your need */
        white-space: nowrap;
        animation: typing 3s steps(40, end), blinkCursor 0.5s step-end infinite alternate;
    }

    /* Define a separate keyframe animation to blink cursor */
    @keyframes blinkCursor {

        from,
        to {
            border-color: transparent
        }

        50% {
            border-color: orange;
        }
    }

    .inp-class {
        color: white;
    }

    .inp-class:focus {
        border: none;
    }
</style>

</html>
