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
    <div class=" bg-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class=" rounded-lg mt-5">
                        <img class="" src="{{ asset('gambar/' . $product->gambar) }}" alt="Product Image">
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold mb-2">{{$product->nama_produk}}</h2>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold">Harga:</span>
                            <span class="">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div>
                        <span class="font-bold">Deskripsi Produk:</span>
                        <p class="text-sm mt-2">
                            {{$product->deskripsi}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>