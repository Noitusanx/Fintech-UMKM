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
    <div class="flex justify-center items-center min-h-screen font-poppins">
        <form action="/daftar" method="post" class="bg-blue-gradient p-6 rounded-lg">
            @csrf
            <h1 class="text-center text-3xl font-semibold mb-5">Buat Akun</h1>
            <div class="mb-3">
                <label>Nama</label>
                <div>
                    <input type="text" name="username" class="rounded-sm pl-2 bg-primary w-full border"
                        onChange="handleChange" placeholder="Nama" />
                </div>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <div>
                    <input type="email" name="email" class="rounded-sm pl-2 bg-primary w-full border"
                        placeholder="email" />
                    <p class="text-red-500 text-sm"></p>
                </div>
            </div>
            <div class="mb-3">
                <label>Kata Sandi</label>
                <div>
                    <input type="password" name="password" class="rounded-sm pl-2 bg-primary w-full border"
                        placeholder="Kata Sandi" />
                    <p class="text-red-500 text-sm"></p>
                </div>
            </div>
            <div class="flex justify-center mt-5 mb-2 login-color rounded-md py-1 hover:opacity-70">
                <button type="submit">Daftar</button>
            </div>
            <div class="flex justify-center">
                <a href="{{ url('/masuk') }}" class="hover:opacity-70">Masuk</a>
            </div>
            <p class="text-center mt-auto pt-8">&copy; 2023 Fintech. Hak Cipta Dilindungi.</p>
        </form>
    </div>
</body>

</html>