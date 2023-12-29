<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fintech</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div className="bg-primary w-full overflow-hidden">
    <div className="sm:px-16 px-6 flex justify-center items-center">
      <div className="xl:max-w-[1280px] w-full">
        <nav class="w-full flex py-6 justify-between items-center sm:px-16 mb-10">
          <a href="{{ url('/') }}" class="ml-6 sm:ml-0">
            <h1 class="navbar-title font-semibold text-gray-900">Fintech</h1>
          </a>
          <ul class="list-none sm:flex hidden justify-end items-center flex-1">
            <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10">
              <a href="#beranda">Beranda</a>
            </li>
            <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10">
              <a href="#kategori">Kategori</a>
            </li>
            <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10">
              <a href="#produk">Produk</a>
            </li>
            <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10">
              <a href="#kontak">Kontak</a>
            </li>
            @auth
            @if (auth()->user()->is_admin)
            <div class="relative inline-block text-left font-poppins">
              <div>
                <button type="button"
                  class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                  id="menu-button" aria-expanded="true" aria-haspopup="true" onclick="toggleDropdown()">
                  <a class="nav-user group-hover:bg-gray-200" href="#" id="navbarDropdown" role="button"
                    aria-expanded="false">
                    Hi, {{ auth()->user()->username }}
                  </a>
                  <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                    <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem"
                      tabindex="-1" id="nav-keluar">Keluar</button>
                  </form>
                </div>
              </div>
            </div>
            @else
            <div class="relative inline-block text-left font-poppins">
              <div>
                <button type="button"
                  class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                  id="menu-button" aria-expanded="true" aria-haspopup="true" onclick="toggleDropdown()">
                  <a class="nav-user group-hover:bg-gray-200" href="#" id="navbarDropdown" role="button"
                    aria-expanded="false">
                    Hi, {{ auth()->user()->username }}
                  </a>
                  <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                  <form method="POST" action="/keluar" role="none">
                    @csrf
                    <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem"
                      tabindex="-1" id="nav-keluar">Keluar</button>
                  </form>
                </div>
              </div>
            </div>
            @endif
            @else
            <li
              class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] bg-button-gradient px-3 py-1 rounded-md mr-10">
              <a href="{{ url('/daftar') }}">Registrasi</a>
            </li>
            <li
              class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] bg-button-login-gradient px-3 py-1 rounded-md mr-0">
              <a href="{{ url('/masuk') }}">Masuk</a>
              @endauth
            </li>
          </ul>
          <div class="sm:hidden flex flex-1 justify-end items-center mr-4">
            <img src="{{ asset($toggle ? 'images/close.svg' : 'images/burgerbar.png') }}" alt="menu"
              class="w-[28px] h-[28px] object-contain" id="toggleButton" />
          </div>
          <div
            class="{{ $toggle ? 'flex' : 'hidden' }} p-6 bg-white text-gray-700 shadow-lg absolute top-20 right-0 mx-4 my-2 min-w-[140px] rounded-xl sidebar border"
            id="sidebar">
            <ul class="list-none flex-col justify-end items-center flex-1">
              <li class="font-poppins font-normal mb-2 hover:opacity-60 cursor-pointer text-[16px] mr-10">
                <a href="#beranda">Beranda</a>
              </li>
              <li class="font-poppins font-normal mb-2 hover:opacity-60 cursor-pointer text-[16px] mr-10">
                <a href="#kategori">Kategori</a>
              </li>
              <li class="font-poppins font-normal mb-2 hover:opacity-60 cursor-pointer text-[16px] mr-10">
                <a href="#produk">Produk</a>
              </li>
              <li class="font-poppins font-normal mb-2 hover:opacity-60 cursor-pointer text-[16px] mr-10">
                <a href="#kontak">Kontak</a>
              </li>

              @auth
              @if (auth()->user()->is_admin)
              <li class="font-poppins font-normal mb-4 hover:opacity-60 cursor-pointer text-[16px] mr-10">
                <a href="/dashboard" id="nav-dashboard">Dashboard</a>
              </li>
              @endif
              <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10 mt-4">
                <form method="POST" action="/keluar" role="none">
                  @csrf
                  <button type="submit" class=" text-red-600" role="menuitem" tabindex="-1"
                    id="nav-keluar">Keluar</button>
                </form>
              </li>
              @endauth

              @guest
              <li
                class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10 mt-4 mb-2 text-[#1ad312]">
                <a href="{{ route('login') }}">Masuk</a>
              </li>
              <li class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] mr-10 text-[#2bbcd2]">
                <a href="{{ route('register') }}">Registrasi</a>
              </li>
              @endguest
            </ul>

          </div>
        </nav>
      </div>
    </div>
    <div className="bg-primary flex justify-center items-start">
      <div className="xl:max-w-[1280px] w-full">
        <section id="beranda" class="flex md:flex-row flex-col ">
          <div class="flex-1 flexStart flex-col sm:px-16 px-6">
            <div class="flex flex-row justify-between items-center w-full">
              <h1
                class="flex-1 font-poppins font-semibold ss:text-[72px] text-[52px] ss:leading-[100px] leading-[75px]">
                Situs Web <br class="sm:block hidden" />
                <span class="text-gradient">Finansial </span>
              </h1>
            </div>
            <h1 class="font-poppins font-semibold ss:text-[68px] text-[52px] ss:leading-[100px] leading-[75px] w-full">
              Teknologi.</h1>
            <p class="paragraph max-w-[470px] mt-5 font-poppins">Situs web Fintech berperan dalam mendukung
              Usaha
              Mikro, Kecil,
              dan Menengah (UMKM) dalam mengembangkan serta mengelola pemasaran produk secara daring.</p>
          </div>

          <div class="flex-1 flex flexCenter md:my-0 my-10 relative">
            <img src="{{ asset('images/streetVendor.png') }}" alt="billing" class="w-[100%] h-[100%] relative z-[5]" />
            <div class="z-[0] absolute w-[40%] h-[30%] top-0 pink__gradient"></div>
            <div class="z-[1] absolute w-[80%] h-[80%] rounded-full bottom-40 white__gradient"></div>
            <div class="z-[0] absolute w-[50%] h-[50%] right-20 bottom-20 blue__gradient"></div>
          </div>
        </section>
      </div>
    </div>
    <section class="mb-10 mt-20" id="kategori">
      <div class="flex font-poppins justify-center items-center text-sm">
        <button type="button" class="filter-button " data-filter="Seluruhnya" onclick="filterSelection('all')">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/menu.png') }}" alt="Makanan & Minuman"
              class="bg-white px-2 mr-4 hover:opacity-70 rounded-lg w-16 shadow-md" />
            <p class="text-center pt-1">Seluruhnya</p>
          </div>
        </button>
        <button type="button" class="filter-button" data-filter="Makanan" onclick="filterSelection('Makanan')">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/food.png') }}" alt="Makanan"
              class="bg-white px-2 mr-2 hover:opacity-70 rounded-lg w-16 shadow-md" />
            <p class="text-center pt-1">Makanan</p>
          </div>
        </button>
        <button type="button" class="filter-button" data-filter="Minuman" onclick="filterSelection('Minuman')">
          <div class="hover:opacity-70 mx-2">
            <img src="{{ asset('images/drink.png') }}" alt="Minuman"
              class="bg-white px-2 mr-2 hover:opacity-70 rounded-lg w-16 shadow-md" />
            <p class="text-center pt-1">Minuman</p>
          </div>
        </button>
        <button type="button" class="filter-button" data-filter="Lainnya" onclick="filterSelection('Lainnya')">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/delivery-box.png') }}" alt="Makanan & Minuman"
              class="bg-white px-2 hover:opacity-70 rounded-lg w-16 shadow-md" />
            <p class="text-center pt-1">Lainnya</p>
          </div>
        </button>
      </div>
    </section>

    <!-- Product Cards -->
    <div class="font-poppins my-2">
      <h1 class="text-center my-5 font-bold md:text-5xl text-4xl pb-4">Produk</h1>
      <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 gap-4 sm:max-w-full sm:px-16 px-6 sm:mb-20 mb-4">
        @foreach ($products as $product)
        <a class="duration-500 hover:scale-105 hover:shadow-xl product" href="{{url("produk/$product->id/detail")}}"
          data-category="{{ $product->kategori }}">
          <div class="bg-white rounded-lg shadow-md pb-2">
            <div style="width: 100%;" class="h-[200px] aspect-w-16 aspect-h-9">
              <img src="{{ asset('gambar/' . $product->gambar) }}" alt="Produk"
                class="rounded-t-lg object-contain w-full h-full">
            </div>
            <div class="mx-4 py-3">
              <h3>{{ $product->nama_produk}}</h3>
              <h3>Rp {{ number_format($product->harga, 0, ',', '.') }}</h3>
            </div>
            <div class="flex justify-between mx-4 pb-2">
              <div class="flex">
                <div class="mr-1">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="{{ $product->averageRating >= 1 ? 'currentColor' : 'gray' }}" class="w-5 h-5 text-yellow-500">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                  </svg>
                </div>
                <span class="text-base mr-2">{{ number_format($product->averageRating, 1) }}/5</span>
                <span>({{ number_format($product->ulasan->count()) }})</span>
              </div>
              <div>
                <p>{{ $product->ulasan_count}} Ulasan</p>
              </div>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    <div>
      @include('components.footer')
    </div>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>