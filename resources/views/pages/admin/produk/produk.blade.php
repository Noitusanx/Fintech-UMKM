@extends('layouts.admin_page')
@section('title', 'Fintech')

@section('content')
<div class="px-4 pb-4 mt-6">
    <div class="p-4 border-dashed border-2 rounded-lg border-gray-700 ">
        <div class="flex justify-between items-center mb-6 border-b-2 border-gray-700 pb-2">
            <h1 class="m-0 text-[28px] font-bold text-gray-900">Produk</h1>
            <button
                class="font-poppins font-medium text-white hover:opacity-60 cursor-pointer text-[16px] px-3 py-1 rounded-md mr-10 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300">
                <a href="{{ url('/produk/tambah') }}">Tambah</a>
            </button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-900">
                <thead class="text-xs uppercase border-2 border-gray-700 bg-white">
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
                            Rating
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
                    <tr class="border-2 border-gray-700">
                        <td class="px-6 py-4">
                            {{$product ->nama_produk}}
                        </td>
                        <td class="px-2 py-4">
                            {{$product ->kategori}}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{number_format($product ->harga, 0, ',', '.')}}
                        </td>
                        <td class="px-6 py-4 w-1/4">
                            {{$product->deskripsi}}
                        </td>
                        <td class="px-6">
                            <div class="flex items-center">
                                <div class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-4 h-4 text-yellow-500">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex items-center">
                                    {{$product->averageRating}}/5
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ asset('gambar/' . $product->gambar) }}">
                                <img src="{{asset('gambar/' . $product->gambar)}}" alt="Gambar Produk" class="w-[100px]"
                                    target="_blank">
                            </a>
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
@endsection