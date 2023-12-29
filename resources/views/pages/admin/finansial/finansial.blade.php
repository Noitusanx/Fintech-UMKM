@extends('layouts.admin_page')
@section('title', 'Fintech')

@section('content')
<div class="px-4 pb-4 mt-6">
    <div class="p-4 border-dashed border-2 rounded-lg border-gray-700 ">
        <div class="flex justify-between items-center mb-6 border-b-2 border-gray-700 pb-2">
            <h1 class="m-0 text-[28px] font-bold text-gray-900">Finansial</h1>
            <button
                class="font-poppins font-medium text-white hover:opacity-60 cursor-pointer text-[16px] px-3 py-1 rounded-md mr-10 bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300">
                <a href=" {{ url('/finansial/tambah') }}">Tambah</a>
            </button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-900">
                <thead class="text-xs uppercase border-2 border-gray-700 bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pemasukan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pengeluaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($financials as $financial)
                    <tr class="border-2 border-gray-700 ">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $financial->tanggal->format('d/m/Y') }}
                        </th>
                        <td class="px-6 py-4">
                            Rp. {{number_format($financial->pemasukan, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{number_format($financial->pengeluaran, 0, ',', '.')}}
                        </td>
                        <td class="px-6 py-4">
                            {{$financial->deskripsi}}
                        </td>
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{url("finansial/$financial->id/edit")}}" class="font-medium text-yellow-500
                                    hover:underline">Edit</a>
                                <form action="{{url("finansial/$financial->id")}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500 hover:underline"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data finansial tersebut?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900">
                        <th scope="row" class="px-6 py-3 text-base ">Total</th>
                        <td class="px-6 py-3">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">Rp. {{ number_format($totalPengeluaran, 0, ',', '.')}}</td>
                    </tr>
                    <tr class="font-semibold  text-gray-900">
                        <th scope="row" class="px-6 py-3 text-base">Saldo</th>
                        <td class="px-6 py-4">
                            Rp. {{number_format($totalKeseluruhan, 0, ',', '.')}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection