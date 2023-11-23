<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div className="bg-primary overflow-hidden">
        <div className="sm:px-16 px-6 flex justify-center items-center">
            <div className="xl:max-w-[1280px] w-full">
                <nav class="w-full flex py-6 justify-between items-center sm:px-16 mb-10">
                    <ul class="list-none sm:flex hidden justify-end items-center flex-1">
                        @auth
                        <div class="relative inline-block text-left font-poppins">
                            <div>
                                <button type="button"
                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true"
                                    onclick="toggleDropdown()">
                                    <a class="nav-user group-hover:bg-gray-200" href="#" id="navbarDropdown"
                                        role="button" aria-expanded="false">
                                        Hi, {{ auth()->user()->username }}
                                    </a>
                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div id="dropdown"
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/dashboard"
                                        id="nav-dashboard">Dashboard</a></li>
                                    <form method="POST" action="/keluar" role="none">
                                        @csrf
                                        <button type="submit"
                                            class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
                                            role="menuitem" tabindex="-1" id="nav-keluar">Keluar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <li
                            class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] bg-button-gradient px-3 py-1 rounded-md mr-10">
                            <a href="{{ url('/daftar') }}">Daftar</a>
                        </li>
                        <li
                            class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] bg-button-login-gradient px-3 py-1 rounded-md mr-0">
                            <a href="{{ url('/masuk') }}">Masuk</a>
                            @endauth
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{ asset('js/script.js') }}"></script>


</body>

</html>