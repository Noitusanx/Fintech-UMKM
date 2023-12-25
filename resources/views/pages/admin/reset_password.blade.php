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
    <main class="bg-gray-50 pb-9 font-poppins">
        <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0">
            <a href="{{ url('/dashboard') }}"
                class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 ">
                <h1 class=" text-3xl font-semibold">Fintech</h1>
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-8 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800">
                <h2 class="text-2xl font-bold text-gray-900 text-center">
                    Reset kata sandi
                </h2>
                <form class="mt-8 space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email
                            Anda</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                            placeholder="admin@gmail.com" required="" fdprocessedid="lv6u9m">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Kata
                            sandi baru</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            required="" fdprocessedid="5dm9m">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 ">Konfirmasi
                            kata sandi
                            baru</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            required="" fdprocessedid="a0oxo">
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                                required="">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="font-medium text-gray-900">Saya menerima
                                <a href="#" class=" text-blue-600 hover:underline dark:text-primary-500">
                                    Syarat dan Ketentuan.</a></label>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full px-5 py-3 text-base font-medium text-center text-white rounded-lg hover:opacity-60 focus:ring-4 focus:ring-primary-300 sm:w-auto bg-blue-500"
                            fdprocessedid="u8vcy">Reset kata sandi</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>