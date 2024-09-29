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
                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class=" p-3">

                        <div class="p-2">
                            <h1 class="text-lg font-bold">Profile Settings</h1>
                        </div>

                        <div class="flex space-x-4 items-end">
                            <button class="h-28 w-28 rounded-lg flex items-center bg-white">
                                <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="10em" height="10em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linejoin="round"
                                            d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                                        <circle cx="12" cy="7" r="3" />
                                    </g>
                                </svg>
                            </button>
                            <div>
                                <div>Username: <span class="font-bold">Walshak</span></div>
                                <div>Fullname: <span class="font-bold">Walshak</span></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">First Name</h1>
                                <input placeholder="First Name" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Last Name</h1>
                                <input placeholder="Last Name" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Email Address</h1>
                                <input placeholder="victor1993@gmail.com" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Mobile Number</h1>
                                <input placeholder="08123456789" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Address</h1>
                                <input placeholder="Texas City" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Select Gender</h1>
                                <select name="country" id="" class="w-full p-3 bg-gray-300 rounded-lg">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Zip Code</h1>
                                <input placeholder="Zip Code" class="w-full p-3 bg-gray-300 rounded-lg" />
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Select City</h1>
                                <select name="country" id="" class="w-full p-3 bg-gray-300 rounded-lg">
                                    <option value="" disabled>Select City</option>
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="p-2 space-y-2">
                                <h1 class="font-bold">Country</h1>
                                <select name="country" id="" class="w-full p-3 bg-gray-300 rounded-lg">
                                    <option value="" disabled>Select Country</option>
                                    <option value="">Nigeria</option>
                                </select>
                            </div>

                        </div>

                        <div class="flex justify-end">


                            <div class="p-2 flex justify-end items-center">
                                <button class="bg-blue-500 text-white p-2 px-4 rounded-lg">SUDMIT CHANGES</button>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class="p-3">

                        <div class="p-2">
                            <h1 class="text-lg font-bold">Referral</h1>

                            <div class="flex">
                                <input type="text" class="p-3 bg-gray-300 rounded-l-lg flex-1"
                                    placeholder="https://siopay.eu/register/walshak">
                                <button class="bg-blue-500 p-3 rounded-r-lg">copy</button>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <h1 class="font-bold">Recently Referred</h1>

                            <div class="flex space-x-3 p-3">

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

                    </div>

                    <div class="rounded-lg overflow-x-auto">
                        <table class="min-w-full ">
                            <thead class="text-blue-500">
                                <tr>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Date Joined</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Username
                                    </th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Country</th>
                                    <th class="w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Phone Number
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 overflow-y-auto h-20">
                                <!-- Example row -->
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">Walshak</td>
                                    <td class="w-auto text-left py-3 px-4">Nigeria</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                </tr>
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">Walshak</td>
                                    <td class="w-auto text-left py-3 px-4">Nigeria</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                </tr>
                                <tr>
                                    <td class="w-auto text-left py-3 px-4">2024-06-22</td>
                                    <td class="w-auto text-left py-3 px-4">Walshak</td>
                                    <td class="w-auto text-left py-3 px-4">Nigeria</td>
                                    <td class="w-auto text-left py-3 px-4">123-456-7890</td>
                                </tr>
                                <!-- More rows can go here -->
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

