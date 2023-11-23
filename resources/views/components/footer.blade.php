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
    <footer id="kontak" class="bg-blue-gradient font-poppins">
        <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 mt-8 pt-3">
            <div class="sm:px-16 px-6">
                <a href="" class="font-bold text-3xl">Fintech</a>
                <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus repudiandae pariatur
                    fuga
                    in earum a nihil quibusdam necessitatibus explicabo voluptatibus?</p>
                <div class="flex mt-2">
                    <a href="" class="mr-2">
                        <img src="{{ asset('images/instagram.svg') }}" alt="Instagram" class="w-7 h-7" />
                    </a>
                    <a href="">
                        <img src="{{ asset('images/whatsapp.svg') }}" alt="Whatsapp" class="w-7 h-7" />
                    </a>
                </div>
            </div>

            <div class="flex xs:justify-evenly px-6 xs:mt-0 mt-5">
                <ul class="space-y-1">
                    <h1 class="font-bold mb-2">Layanan</h1>
                    <li>
                        <a href="#beranda">Beranda</a>
                    </li>
                    <li>
                        <a href="#kategori">Kategori</a>
                    </li>
                    <li>
                        <a href="#produk">Produk</a>
                    </li>
                </ul>
            </div>

            <div class="sm:px-16 px-6 space-y-2 md:mt-0 mt-5">
                <h1 class="font-bold mb-2">Kontak</h1>
                <div class="flex">
                    <img src="{{ asset('images/telephone.png') }}" alt="Telepon" class="w-6 h-6 mr-2" />
                    <p> +628212345689</p>
                </div>
                <div class="flex">
                    <img src="{{ asset('images/mail.png') }}" alt="Email" class="w-6 h-6 mr-2" />
                    <p>fintech@gmail.com</p>
                </div>
                <div class="flex">
                    <img src="{{ asset('images/address.png') }}" alt="Alamat" class="w-6 h-6 mr-2" />
                    <p>Jl. T. Nyak Arif, Kopelma Darussalam.</p>
                </div>
                <div class="flex">
                    <img src="{{ asset('images/calendar.png') }}" alt="Kalender" class="w-6 h-6 mr-2" />
                    <p>Setiap Hari: 9.00 - 18.00</p>
                </div>
            </div>
        </div>

        <p class="text-center py-4">&copy; 2023 Fintech. Hak Cipta Dilindungi.</p>
    </footer>
</body>

</html>