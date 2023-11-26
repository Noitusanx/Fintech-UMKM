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
          <a href="{{ url('/') }}">
            <h1 class="navbar-title">Fintech</h1>
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
    <div className="bg-primary flex justify-center items-start">
      <div className="xl:max-w-[1280px] w-full">
        <section id="beranda" class="flex md:flex-row flex-col paddingY mb-5">
          <div class="flex-1 flexStart flex-col xl:px-0 sm:px-16 px-6">
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
    <section className="flex" id="kategori">
      <div class="flex font-poppins justify-center items-center">
        <button type="submit" class="filter-button" data-filter="Seluruhnya" onclick="filterSelection('seluruhnya')">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/menu.png') }}" alt="Makanan & Minuman"
              class="bg-white px-2 mr-2 hover:opacity-70 rounded-lg w-20 h-15 shadow-md" />
            <p class="text-center pt-1">Seluruhnya</p>
          </div>
        </button>
        <button type="button" class="filter-button" data-filter="Makanan">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/food.png') }}" alt="Makanan"
              class="bg-white px-2 hover:opacity-70 rounded-lg w-20 h-15 shadow-md" />
            <p class="text-center pt-1">Makanan</p>
          </div>
        </button>
        <button type="submit" class="filter-button" data-filter="Minuman">
          <div class="hover:opacity-70 mx-2">
            <img src="{{ asset('images/drink.png') }}" alt="Minuman"
              class="bg-white px-2 hover:opacity-70 rounded-lg w-20 h-15 shadow-md" />
            <p class="text-center pt-1">Minuman</p>
          </div>
        </button>
        <button type="submit" class="filter-button" data-filter="Lainnya">
          <div class="hover:opacity-70">
            <img src="{{ asset('images/delivery-box.png') }}" alt="Makanan & Minuman"
              class="bg-white px-2 hover:opacity-70 rounded-lg w-20 h-15 shadow-md" />
            <p class="text-center pt-1">Lainnya</p>
          </div>
        </button>
      </div>
    </section>
    <section className="flex justify-center items-start sm:px-16 px-6" id="produk">
      <div class="font-poppins my-2">
        <h1 class="text-center my-5 font-bold text-3xl">Produk</h1>
        <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 gap-4 sm:max-w-full sm:px-16 px-6 ">
          @foreach ($products as $product)
          <a class="duration-500 hover:scale-105 hover:shadow-xl" href="{{url("produk/$product->id/detail")}}">
            <div class="bg-white rounded-lg shadow-md product-shadow" data-category="{{ $product->kategori }}">
              <div>
                <img src="{{asset('gambar/' . $product->gambar)}}" alt="Produk"
                  class="rounded-t-lg w-[180px] h-[180px] mx-auto" />
              </div>
              <div class="mx-2 py-3">
                <h3>{{ $product->nama_produk}}</h3>
                <h3>Rp {{ number_format($product->harga, 0, ',', '.') }}</h3>
              </div>
              <div class="flex justify-between mx-2 pb-2">
                <div>
                  <p>★★★★★</p>
                </div>
                <div>
                  <p>{{ $product['reviews'] }} Ulasan</p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
      </a>
    </section>
    <div>
      @include('components.footer')
    </div>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>