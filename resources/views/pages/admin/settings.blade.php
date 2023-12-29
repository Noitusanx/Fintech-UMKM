@extends('layouts.admin_page')
@section('title', 'Fintech')

@section('content')
<div
    class="p-4 m-2 mt-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">Informasi kata sandi</h3>

    @if(session('status'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('status') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        {{ session('error') }}
    </div>
    @endif

    @error('new_password')
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        {{ $message }}
    </div>
    @enderror

    <form action="{{route('settings')}}" method="post">
        @csrf
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata
                    sandi saat ini</label>
                <input type="text" name="current_password" id="current_password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    placeholder="••••••••" required="" fdprocessedid="11207l">
                @error('current_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata sandi
                    baru</label>
                <input data-popover-target="popover-password" data-popover-placement="bottom" type="password"
                    id="password" name="new_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="••••••••" required="" fdprocessedid="h43q3">

            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi kata
                    sandi</label>
                <input type="password" name="new_password_confirmation" id="confirm-password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                    placeholder="••••••••" required="" fdprocessedid="p4cs9j">
            </div>

            <div class="col-span-6 sm:col-full">
                <button type="submit"
                    class="font-poppins font-medium text-white hover:opacity-60 cursor-pointer text-[16px] px-4 py-2 rounded-md mr-10 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection