<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div className="bg-primary w-full overflow-hidden">
        <div className="sm:px-16 px-6 flex justify-center items-center">
            <div className="xl:max-w-[1280px] w-full">
                <nav class="w-full flex py-6 justify-between items-center sm:px-16 mb-10">
                    <a href="{{ url('/') }}">
                        <h1 class="navbar-title">Fintech</h1>
                    </a>
                    <ul class="list-none sm:flex hidden justify-end items-center flex-1"">
                        @auth
                        <div class=" relative inline-block text-left font-poppins">
                        <div>
                            <button type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true" onclick="toggleDropdown()">
                                <a class="nav-user group-hover:bg-gray-200" href="#" id="navbarDropdown" role="button"
                                    aria-expanded="false">
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
                                    <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
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
    </div>

    <div class="font-poppins bg-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex min-h-[340px] flex-col md:flex-row mx-4 shadow-md">
                <div class="md:flex-1 px-4">
                    <div class="rounded-lg mt-5">
                        <img class=" w-[340px]" src="{{ asset('gambar/' . $product->gambar) }}" alt="Product Image">
                    </div>
                </div>
                <div class="md:flex-1 px-4 border-l-2 border-black">
                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold mb-2">{{$product->nama_produk}}</h2>
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span class=" text-xl font-bold">Rp {{ number_format($product->harga, 0, ',', '.')
                                    }}</span>
                            </div>
                        </div>
                        <div class="rate">
                            <label for="star5a" title="5 Starts">
                            </label>
                            <p style="font-size: 1.1rem; margin-top: 0.5rem;">
                                <span class="text-base">{{ number_format($averageRating, 1)
                                    }}/5</span></span>
                                <span class=" text-base">({{$product->rates_count}} ulasan)
                                </span>
                            </p>
                        </div>
                        <div>
                            <span class="font-bold">Deskripsi Produk:</span>
                            <p class="text-sm mt-2 w-11/12">
                                {{$product->deskripsi}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="min-h-[340px] md:flex-row mx-4 shadow-md mt-8">
                <div class="md:flex-1 px-4 flex">
                    <div class="my-4 w-1/2">
                        <small class="text-base font-bold text-gray-700 ml-1">{{ $jumlahUlasan }} ulasan</small>
                        <div class="mt-4">
                            <div class="justify-between px-1">
                                @foreach ($reviews as $review)
                                @if (!empty($review->ulasan))
                                <div class="flex-1 pl-1 py-2">
                                    <div>
                                        <div class="text-base font-semibold text-gray-600">{{
                                            $review->user->username}}
                                        </div>
                                        <div class="flex justify-between">
                                            <p class="text-sm font-normal text-gray-500">{{
                                                $review->created_at->format('d M Y') }}</p>
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rate)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-4 h-4 text-yellow-500">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-4 h-4 text-gray-300">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    @endif
                                                    @endfor
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-600">
                                            {{ $review->ulasan }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-2/5 ml-6 mt-4">
                        <h1 class="text-xl font-bold mb-4">Bagikan ulasan Anda</h1>
                        <p>Jika Anda sudah pernah membeli produk ini, bagikan ulasan Anda dengan pelanggan lainnya.</p>
                        @include('components.ulasan')
                    </div>
                </div>
            </div>
        </div>

</body>

</html>