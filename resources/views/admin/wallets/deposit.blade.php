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
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M128 35.31V128a8 8 0 0 1-16 0V35.31L93.66 53.66a8 8 0 0 1-11.32-11.32l32-32a8 8 0 0 1 11.32 0l32 32a8 8 0 0 1-11.32 11.32Zm64 88.31V96a16 16 0 0 0-16-16h-16a8 8 0 0 0 0 16h16v80.4a28 28 0 0 0-44.25 33.6l.24.38l22.26 34a8 8 0 0 0 13.39-8.76l-22.13-33.79A12 12 0 0 1 166.4 190c.07.13.15.26.23.38l10.68 16.31a8 8 0 0 0 14.69-4.38V144a74.84 74.84 0 0 1 24 54.69V240a8 8 0 0 0 16 0v-41.35a90.89 90.89 0 0 0-40-75.03M80 80H64a16 16 0 0 0-16 16v104a8 8 0 0 0 16 0V96h16a8 8 0 0 0 0-16" />
                    </svg>
                    <h5 class="card-title fw-semibold mb-4">Deposit Funds</h5>
                </div>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class=" p-3">

                        <div class="p-2 space-y-2">
                            <h1 class="font-bold">Method</h1>
                            <select name="country" id="" class="w-full p-3 bg-gray-300 rounded-lg">
                                <option value="" disabled>Select Country</option>
                                <option value="">Nigeria</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Currency</h1>
                                <select name="country" id="" class="w-full p-3 bg-gray-300 rounded-lg">
                                    <option value="" disabled>Select Country</option>
                                    <option value="">NGN</option>
                                    <option value="">EUR</option>
                                </select>
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Amount</h1>
                                <input placeholder="08123456789" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Enter Transaction Pin</h1>
                                <input placeholder="******" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 flex justify-end items-center">
                                <button class="bg-blue-400 text-white p-2 px-4 rounded-lg">SEND</button>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="flex justify-between p-3">

                        <h1 class="font-bold">Deposit History</h1>

                        <div class="flex space-x-3">

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                        <path stroke-miterlimit="10"
                                            d="M6.395 7.705A7.885 7.885 0 0 1 12 5.382a7.929 7.929 0 0 1 7.929 7.929A7.94 7.94 0 0 1 12 21.25a7.939 7.939 0 0 1-7.929-7.94" />
                                        <path stroke-linejoin="round"
                                            d="m7.12 2.75l-.95 3.858a1.332 1.332 0 0 0 .97 1.609l3.869.948" />
                                    </g>
                                </svg>
                            </button>

                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
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
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">TRX</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Gateway
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Status
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Details</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 overflow-y-auto h-20">

                            </tbody>
                        </table>
                    </div>

                </div>

                {{-- --}}

            </div>
        </div>
    </div>
    </div>
@endsection
