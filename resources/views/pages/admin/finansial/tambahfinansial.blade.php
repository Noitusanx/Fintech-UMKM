@extends('layouts.admin_page')
@section('title', 'Fintech')


@section('content')
<div class="px-4 pb-4 mt-6">
    <div class="p-4">
        <h2 class="text-[28px] font-bold dark:text-gray-200 text-gray-900">Tambahkan Finansial</h2>
        <form action="/finansial" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="mb-4">
                    <label for="tanggal" class="block dark:text-gray-200 text-gray-900 text-sm font-medium mb-2">
                        Pilih Tanggal:
                    </label>
                    <input type="date" id="tanggal" name="tanggal"
                        class="appearance-none border rounded-lg w-full py-2 px-3 dark:text-white text-black  leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700"
                        required>
                </div>
                <div class="w-full">
                    <label for="price"
                        class="block mb-2 text-sm font-medium dark:text-gray-200 text-gray-900">Pemasukan</label>
                    <input type="number" name="pemasukan" id="pemasukan"
                        class="border dark:text-white text-black  text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000">
                </div>
                <div class="w-full">
                    <label for="price"
                        class="block mb-2 text-sm font-medium dark:text-gray-200 text-gray-900">Pengeluaran</label>
                    <input type="number" name="pengeluaran" id="pengeluaran"
                        class="border dark:text-white text-black  text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000">
                </div>
                <div class="sm:col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium dark:text-gray-200 text-gray-900 ">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Berikan deskripsi finansial disini"></textarea>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4 sm:mt-6">
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-semibold text-center bg-gray-700 text-black rounded-lg focus:ring-4 focus:ring-primary-900 hover:opacity-70">
                    Tambah Finansial
                </button>
            </div>
        </form>

    </div>
</div>
@endsection