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
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 48 48">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M28.425 9.6a3.6 3.6 0 1 1-7.2 0a3.6 3.6 0 0 1 7.2 0M38 28H23.752l4.486 4.426a2 2 0 0 1 .43.628l2.667 6.15a2 2 0 0 1-3.67 1.592L25.152 35l-7.095-7H10a2 2 0 0 0-2 2v12H6V30a4 4 0 0 1 4-4h5.964c-.749-2.522-.474-5.128.117-7.144c.317-1.081.745-2.066 1.224-2.852a6.6 6.6 0 0 1 .818-1.092c.283-.299.71-.675 1.28-.887c1.242-.461 2.544-.426 3.705.174c1.113.576 1.897 1.565 2.405 2.656q.314.674.584 1.263v.001c.44.95.807 1.748 1.16 2.45c.496.986.888 1.624 1.268 2.066c.347.405.686.647 1.118.816c.47.184 1.146.317 2.217.349a2 2 0 0 1 1.93 2.2H38a4 4 0 0 1 4 4v12h-2V30a2 2 0 0 0-2-2m-13.637-4.373L23.848 26h2.392a7.4 7.4 0 0 1-.75-.76a11 11 0 0 1-1.127-1.613m-7.877 6.147l3.3 3.165l-1.247 4.21q-.076.258-.218.486l-2.122 3.42a2 2 0 0 1-3.399-2.11l1.98-3.19l1.342-4.528z"
                            clip-rule="evenodd" />
                    </svg>
                    <h5 class="card-title fw-semibold mb-4">Help & Support</h5>
                </div>

                <div class="bg-gray-200 mt-5 p-3 rounded-xl">
                    <div class=" p-3">



                        <div class="p-2 space-y-2">
                            <h1 class="font-bold">Email</h1>
                            <input placeholder="user@gmail.com" class="w-full p-3 bg-gray-300 rounded-lg" />
                        </div>

                        <div class="p-2 space-y-2">
                            <h1 class="font-bold">Subject</h1>
                            <input placeholder="Enter your subject" class="w-full p-3 bg-gray-300 rounded-lg" />
                        </div>

                        <div class="p-2 space-y-2">
                            <h1 class="font-bold">Subject</h1>
                            <Textarea placeholder="Enter your subject" class="w-full p-3 bg-gray-300 rounded-lg"></Textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">

                            <div class="p-2 flex items-center">
                                <button class="bg-blue-400 text-white p-2 px-4 rounded-lg">SEND</button>
                            </div>

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
