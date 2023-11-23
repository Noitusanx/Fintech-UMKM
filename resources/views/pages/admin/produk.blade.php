@include('components.navbar')

@include('components.sidebar')

<div class="px-4 pb-4 sm:ml-64 font-poppins">
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 ">
        <div class="flex justify-between items-center mb-6 border-b-2 border-black pb-2">
            <h1 class="m-0 text-[28px] font-bold">Produk</h1>
            <button
                class="font-poppins font-normal hover:opacity-60 cursor-pointer text-[16px] px-3 py-1 rounded-md mr-10 bg-button-grey text-white">
                <a href="{{ url('/produk/tambah') }}">Tambah</a>
            </button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$product ->nama_produk}}
                        </td>
                        <td class="px-6 py-4">
                            {{$product ->kategori}}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{number_format($product ->harga, 0, ',', '.')}}
                        </td>
                        <td class="px-6 py-4 w-1/4">
                            {{$product->deskripsi}}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{asset('gambar/' . $product->gambar)}}" alt="Gambar Produk"
                                class=" w-[160px] h-[160px]">
                        </td>
                        <td>
                            <div class="flex space-x-2 mr-4">
                                <a href="{{url("produk/$product->id/edit")}}" class="font-medium text-yellow-500
                                    hover:underline">Edit</a>
                                <form action="{{url("produk/$product->id")}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500 hover:underline"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus produk tersebut?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>