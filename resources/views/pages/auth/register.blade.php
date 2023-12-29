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
    <section class="bg-gray-50 font-poppins py-6">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-center md:text-3xl text-xl font-semibold mb-5 leading-tight">Registrasi</h1>
                    <form class="space-y-4 md:space-y-6 " action="/daftar" method="post">
                        @csrf
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Nama" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="nama@gmail.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata
                                Sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-black font-semibold bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center hover:opacity-70 bg-button-gradient">Registrasi</button>
                        <div class="flex justify-center">
                            <a href="{{ url('/masuk') }}" class="hover:opacity-70">Masuk</a>
                        </div>
                        <p class="text-center mt-auto pt-8">&copy; 2023 Fintech. Hak Cipta Dilindungi.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>