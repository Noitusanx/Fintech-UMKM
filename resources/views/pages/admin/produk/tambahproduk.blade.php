@extends('layouts.admin_page')
@section('title', 'Fintech')

@section('content')
<div class="px-4 pb-4 mt-6">
    <div class="p-4 mx-auto max-w-3xl ">
        <h2 class="mb-4 text-[28px] font-bold text-gray-900">Tambahkan Produk</h2>
        <form action="/produk" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk"
                        class="bordertext-sm rounded-lg block w-full p-2.5 border-gray-600 border placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Nama Produk" required="">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                    <input type="number" name="harga" id="harga"
                        class="border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000" required="">
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500">
                        <option selected="">Pilih Kategori</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm rounded-lg border border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Berikan deskripsi produk disini"></textarea>
                </div>
                <div class="container w-full">
                    <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 py-6">
                            <div id="image-preview"
                                class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload" type="file" name="gambar" class="hidden" accept="image/*"
                                    onchange="updateSelectedFileName(this)" />
                                <label for="upload" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <p id="selectedFileName" class="font-bold"></p>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Unggah Gambar</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">Ukuran foto seharusnya kurang
                                        dari <b class="text-gray-600">5mb</b></p>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">dan dalam format <b
                                            class="text-gray-600">JPEG, JPG, PNG, atau GIF</b>.</p>
                                    <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                            <p id="selectedFileName"></p>
                            <div class="flex items-center justify-center">
                                <div class="w-full">
                                    <label for="upload"
                                        class="w-full text-white bg-gray-700 hover:opacity-90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                                        <span class="text-center ml-2">Upload</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4 sm:mt-6">
                <button type="submit"
                    class="font-poppins font-medium text-white hover:opacity-60 cursor-pointer text-[16px] px-3 py-2 rounded-md mr-10 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300">
                    Tambah Produk
                </button>
            </div>
        </form>
    </div>
</div>

@endsection