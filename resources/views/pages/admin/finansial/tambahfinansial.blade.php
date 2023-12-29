@extends('layouts.admin_page')
@section('title', 'Fintech')


@section('content')
<div class="px-4 pb-4 mt-6">
    <div class="p-4 mx-auto max-w-3xl">
        <h2 class="text-[28px] font-bold text-gray-900">Tambahkan Finansial</h2>
        <form action="/finansial" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-900 text-sm font-medium mb-2">
                        Pilih Tanggal:
                    </label>
                    <input type="text" id="tanggal" name="tanggal" placeholder="DD/MM/YYYY" pattern="\d{2}/\d{2}/\d{4}"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline border-gray-600"
                        required>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Pemasukan</label>
                    <input type="number" name="pemasukan" id="pemasukan"
                        class="border text-black  text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Pengeluaran</label>
                    <input type="number" name="pengeluaran" id="pengeluaran"
                        class="border text-black text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000">
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm rounded-lg border border-gray-600 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Berikan deskripsi finansial disini"></textarea>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4 sm:mt-6">
                <button type="submit"
                    class="font-poppins font-medium text-white hover:opacity-60 cursor-pointer text-[16px] px-3 py-2 rounded-md mr-10 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300">
                    Tambah Finansial
                </button>
            </div>
        </form>

    </div>
</div>
@endsection