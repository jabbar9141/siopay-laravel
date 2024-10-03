@extends('admin.app')
@section('page_title', 'Home')
@section('content')
    <style>
        .card {
            height: 100%;
        }

        /* Style for the card container */
        .trans {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect */
        .trans:hover::before {
            opacity: 1;
        }

        .trans:hover.trans {
            transform: scale(1.08);
            /* Adjust the scale value for the zoom effect */
        }
    </style>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Welcome, {{ Auth::user()->name }}</h5>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-gray-200 h-60 rounded-xl">
                        <div
                            class="h-1/2 p-3 flex flex-col justify-between bg-gradient-to-br from-white via-blue-300 to-gray-200 rounded-xl">
                            <div class="flex justify-between">
                                <div class="flex bg-white w-auto rounded-full space-x-2 p-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linejoin="round"
                                                d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                                            <circle cx="12" cy="7" r="3" />
                                        </g>
                                    </svg>
                                    <div>
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                {{-- <div class="flex">
                                    <h1>Add Funds</h1>
                                </div>
                                --}}
                            </div>

                            <div class="flex justify-between">

                                <h1>Wallet Balance</h1>

                                <h1><b>N5,200.00</b></h1>

                            </div>

                        </div>
                        <div class="p-3 space-y-4">

                            <div class="flex justify-between">

                                <h1>Account Number</h1>

                                <h1>8123456789</h1>

                            </div>

                            <div class="flex justify-between">

                                <h1>Account Name</h1>

                                <h1><b>Victor1993-SIOPAY</b></h1>

                            </div>
                            <div class="flex justify-between">

                                <h1>Location:</h1>

                                <h1 class="text-blue-400"><b>Nigeria</b></h1>

                            </div>

                        </div>
                    </div>

                    <div class="bg-white space-y-3 h-60 rounded-xl">
                        <div class="bg-gray-200 items-center flex p-3 rounded-xl">

                            <div>
                                <h1 class="font-bold text-lg">PAY BILLs</h1>
                                <div class="flex justify-between">
                                    <div class="items-center flex justify-center flex-col cursor-pointer" id="buyairtime">
                                        <div
                                            class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m16.052 1.787l.966.261a7 7 0 0 1 4.93 4.934l.26.965l-1.93.521l-.261-.965a5 5 0 0 0-3.522-3.524l-.965-.262zM1 2h8.58l1.487 6.69l-1.86 1.86a14.1 14.1 0 0 0 4.243 4.242l1.86-1.859L22 14.42V23h-1a19.9 19.9 0 0 1-10.85-3.196a20.1 20.1 0 0 1-5.954-5.954A19.9 19.9 0 0 1 1 3zm2.027 2a17.9 17.9 0 0 0 2.849 8.764a18.1 18.1 0 0 0 5.36 5.36A17.9 17.9 0 0 0 20 20.973v-4.949l-4.053-.9l-2.174 2.175l-.663-.377a16.07 16.07 0 0 1-6.032-6.032l-.377-.663l2.175-2.174L7.976 4zm12.111 1.165l.966.261a3.5 3.5 0 0 1 2.465 2.467l.26.965l-1.93.521l-.261-.965a1.5 1.5 0 0 0-1.057-1.057l-.965-.261z" />
                                            </svg>
                                        </div>
                                        <h1 class="text-blue-400 text-center">Buy Airtime</h1>
                                    </div>

                                    <div class="items-center flex justify-center flex-col cursor-pointer" id="buydata">
                                        <div
                                            class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 21q-1.05 0-1.775-.725T9.5 18.5t.725-1.775T12 16t1.775.725t.725 1.775t-.725 1.775T12 21m-5.65-5.65l-2.1-2.15q1.475-1.475 3.463-2.337T12 10t4.288.875t3.462 2.375l-2.1 2.1q-1.1-1.1-2.55-1.725T12 13t-3.1.625t-2.55 1.725M2.1 11.1L0 9q2.3-2.35 5.375-3.675T12 4t6.625 1.325T24 9l-2.1 2.1q-1.925-1.925-4.462-3.012T12 7T6.563 8.088T2.1 11.1" />
                                            </svg>
                                        </div>
                                        <h1 class="text-blue-400 text-center text-sm">Buy Data</h1>
                                    </div>

                                    <div class="items-center flex justify-center flex-col cursor-pointer" id="buytv">
                                        <div
                                            class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <rect width="20" height="15" x="2" y="7" rx="2"
                                                        ry="2" />
                                                    <path d="m17 2l-5 5l-5-5" />
                                                </g>
                                            </svg>
                                        </div>
                                        <h1 class="text-blue-400 text-center text-sm">TV Cable Bill</h1>
                                    </div>

                                    <div class="items-center flex justify-center flex-col cursor-pointer">
                                        <div
                                            class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" viewBox="0 0 512 512">
                                                <rect width="416" height="320" x="48" y="96" fill="none"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="32" rx="56" ry="56" />
                                                <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                                    stroke-width="60" d="M48 192h416M128 300h48v20h-48z" />
                                            </svg>
                                        </div>
                                        <h1 class="text-blue-400 text-center text-sm">Prepaid Card</h1>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="bg-gray-200 p-3 h-60 rounded-xl">
                        <h1 class="font-bold text-xl">Recent Transactions</h1>
                        <div class="p-2">
                            <div class="space-y-3 justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                        <svg class="text-blue-400" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.052 1.787l.966.261a7 7 0 0 1 4.93 4.934l.26.965l-1.93.521l-.261-.965a5 5 0 0 0-3.522-3.524l-.965-.262zM1 2h8.58l1.487 6.69l-1.86 1.86a14.1 14.1 0 0 0 4.243 4.242l1.86-1.859L22 14.42V23h-1a19.9 19.9 0 0 1-10.85-3.196a20.1 20.1 0 0 1-5.954-5.954A19.9 19.9 0 0 1 1 3zm2.027 2a17.9 17.9 0 0 0 2.849 8.764a18.1 18.1 0 0 0 5.36 5.36A17.9 17.9 0 0 0 20 20.973v-4.949l-4.053-.9l-2.174 2.175l-.663-.377a16.07 16.07 0 0 1-6.032-6.032l-.377-.663l2.175-2.174L7.976 4zm12.111 1.165l.966.261a3.5 3.5 0 0 1 2.465 2.467l.26.965l-1.93.521l-.261-.965a1.5 1.5 0 0 0-1.057-1.057l-.965-.261z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h1>Mobile data</h1>
                                        <h1>Apr 13th, 2024 - 10:32:20</h1>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                        <svg class="text-blue-400" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.052 1.787l.966.261a7 7 0 0 1 4.93 4.934l.26.965l-1.93.521l-.261-.965a5 5 0 0 0-3.522-3.524l-.965-.262zM1 2h8.58l1.487 6.69l-1.86 1.86a14.1 14.1 0 0 0 4.243 4.242l1.86-1.859L22 14.42V23h-1a19.9 19.9 0 0 1-10.85-3.196a20.1 20.1 0 0 1-5.954-5.954A19.9 19.9 0 0 1 1 3zm2.027 2a17.9 17.9 0 0 0 2.849 8.764a18.1 18.1 0 0 0 5.36 5.36A17.9 17.9 0 0 0 20 20.973v-4.949l-4.053-.9l-2.174 2.175l-.663-.377a16.07 16.07 0 0 1-6.032-6.032l-.377-.663l2.175-2.174L7.976 4zm12.111 1.165l.966.261a3.5 3.5 0 0 1 2.465 2.467l.26.965l-1.93.521l-.261-.965a1.5 1.5 0 0 0-1.057-1.057l-.965-.261z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h1>Mobile data</h1>
                                        <h1>Apr 13th, 2024 - 10:32:20</h1>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                        <svg class="text-blue-400" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.052 1.787l.966.261a7 7 0 0 1 4.93 4.934l.26.965l-1.93.521l-.261-.965a5 5 0 0 0-3.522-3.524l-.965-.262zM1 2h8.58l1.487 6.69l-1.86 1.86a14.1 14.1 0 0 0 4.243 4.242l1.86-1.859L22 14.42V23h-1a19.9 19.9 0 0 1-10.85-3.196a20.1 20.1 0 0 1-5.954-5.954A19.9 19.9 0 0 1 1 3zm2.027 2a17.9 17.9 0 0 0 2.849 8.764a18.1 18.1 0 0 0 5.36 5.36A17.9 17.9 0 0 0 20 20.973v-4.949l-4.053-.9l-2.174 2.175l-.663-.377a16.07 16.07 0 0 1-6.032-6.032l-.377-.663l2.175-2.174L7.976 4zm12.111 1.165l.966.261a3.5 3.5 0 0 1 2.465 2.467l.26.965l-1.93.521l-.261-.965a1.5 1.5 0 0 0-1.057-1.057l-.965-.261z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h1>Mobile data</h1>
                                        <h1>Apr 13th, 2024 - 10:32:20</h1>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="bg-gray-200 mt-4 items-center flex p-3 rounded-xl">
                    <div class="w-100 px-4">
                        <h1 class="font-bold text-lg">MORE SERVICES</h1>
                        <div class="flex justify-between w-100">
                            <div class="items-center flex justify-center flex-col cursor-pointer" id="buyelectric">
                                <div
                                    class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                    <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M848 359.3H627.7L825.8 109c4.1-5.3.4-13-6.3-13H436c-2.8 0-5.5 1.5-6.9 4L170 547.5c-3.1 5.3.7 12 6.9 12h174.4l-89.4 357.6c-1.9 7.8 7.5 13.3 13.3 7.7L853.5 373c5.2-4.9 1.7-13.7-5.5-13.7" />
                                    </svg>
                                </div>
                                <h1 class="text-blue-400 text-center">Electricity</h1>
                            </div>

                            <div class="items-center flex flex-col cursor-pointer">
                                <div
                                    class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                    <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5 6h14c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1 .45-1 1s.45 1 1 1m15.16 1.8c-.09-.46-.5-.8-.98-.8H4.82c-.48 0-.89.34-.98.8l-1 5c-.12.62.35 1.2.98 1.2H4v5c0 .55.45 1 1 1h8c.55 0 1-.45 1-1v-5h4v5c0 .55.45 1 1 1s1-.45 1-1v-5h.18c.63 0 1.1-.58.98-1.2zM12 18H6v-4h6z" />
                                    </svg>
                                </div>
                                <h1 class="text-blue-400 text-center">Pick Up Location</h1>
                            </div>

                            <div class="items-center flex justify-center flex-col cursor-pointer">
                                <div
                                    class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                    <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 12.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M10.5 16a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0" />
                                        <path fill="currentColor"
                                            d="M17.526 5.116L14.347.659L2.658 9.997L2.01 9.99V10H1.5v12h21V10h-.962l-1.914-5.599zM19.425 10H9.397l7.469-2.546l1.522-.487zM15.55 5.79L7.84 8.418l6.106-4.878zM3.5 18.169v-4.34A3 3 0 0 0 5.33 12h13.34a3 3 0 0 0 1.83 1.83v4.34A3 3 0 0 0 18.67 20H5.332A3.01 3.01 0 0 0 3.5 18.169" />
                                    </svg>
                                </div>
                                <h1 class="text-blue-400 text-center">Money Transfer</h1>
                            </div>

                            <div class="items-center flex justify-center flex-col cursor-pointer">
                                <div
                                    class="bg-blue-200  rounded-full p-2 w-[2em] h-[2em] items-center justify-center">
                                    <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M32 64C32 28.7 60.7 0 96 0h160c35.3 0 64 28.7 64 64v192h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96l-32-32c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V376c0 39.8-32.2 72-72 72s-72-32.2-72-72v-32c0-22.1-17.9-40-40-40h-8v144c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32zm64 16v96c0 8.8 7.2 16 16 16h128c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16" />
                                    </svg>
                                </div>
                                <h1 class="text-blue-400 text-center">Gas Refill</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="flex justify-between p-3">
                        <h1 class="font-bold">Transaction details</h1>
                        <div class="flex space-x-3">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                        <path stroke-miterlimit="10"
                                            d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                        <path stroke-linejoin="round"
                                            d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                    </g>
                                </svg>
                            </button>

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M12 16.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m0-6a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="rounded-lg overflow-x-auto">
                        <table class="min-w-full ">
                            <thead class="">
                                <tr>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Transaction ID
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Service</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Phone Number
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Date Uploaded
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 overflow-y-auto h-20">
                                <!-- Example row -->
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>

                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">123456789</td>
                                    <td class="w-auto text-left py-3 px-4">Example Service</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                    <td class="w-auto text-left py-3 px-4">Example Description</td>
                                    <td class="w-auto text-left py-3 px-4">$100.00</td>
                                    <td class="w-auto text-left py-3 px-4">Completed</td>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                </tr>
                                <!-- More rows can go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card rounded">
                                <div class="card-header">
                                    <h5>Total Service Charges</h5>
                                </div>
                                <div class="card-body rounded bg-gray-200">
                                    <p class="text-center"><b>{{ $admin_rep['service'] }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var airtimebtn = document.getElementById('buyairtime');
                    if (airtimebtn) {
                        airtimebtn.addEventListener('click', function() {
                            location.assign('/dashboard/airtime', '_blank');
                        });
                    }

                    var databtn = document.getElementById('buydata');
                    if (databtn) {
                        databtn.addEventListener('click', function() {
                            location.assign('/dashboard/internet', '_blank');
                        });
                    }

                    var electbtn = document.getElementById('buyelectric');
                    if (electbtn) {
                        electbtn.addEventListener('click', function() {
                            location.assign('/dashboard/utilities/electricity', '_blank');
                        });
                    }

                    var tvbtn = document.getElementById('buytv');
                    if (tvbtn) {
                        tvbtn.addEventListener('click', function() {
                            location.assign('/dashboard/cable', '_blank');
                        });
                    }
                </script>

                {{-- --}}

            </div>
        </div>
    </div>
    </div>
@endsection
