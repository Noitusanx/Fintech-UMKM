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
    <div class="flex justify-center font-poppins items-center min-h-screen flex-col">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ url('/masuk') }}" method="post" class="bg-blue-gradient p-6 rounded-lg">
            @csrf
            <h1 class="text-center text-3xl font-semibold mb-5">Masuk</h1>
            <div class="mb-3">
                <label>Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div>
                    <input type="email" name="email"
                        class="rounded-sm pl-2 bg-primary w-full border @error('email') is-invalid @enderror"
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
                <button type="submit">Masuk</button>
            </div>
            <div class="flex justify-center">
                <a href="{{ url('/daftar') }}" class="hover:opacity-70">Daftar</a>
            </div>
            <p class="text-center mt-auto pt-8">&copy; 2023 Fintech. Hak Cipta Dilindungi.</p>
        </form>
    </div>
</body>

</html>