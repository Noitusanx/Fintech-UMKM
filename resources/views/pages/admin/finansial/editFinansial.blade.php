@include('components.navbar')

@include('components.sidebar')

<section class="bg-white font-poppins flex justify-end">
    <div class="pb-4 pl-16 mx-auto max-w-3xl lg:pb-12">
        <h2 class="mb-4 text-[28px] font-bold text-gray-900">Tambahkan Finansial</h2>
        <form action="{{route('finansial.update', $financial->id)}}" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-700 text-sm font-medium mb-2">
                        Pilih Tanggal:
                    </label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ date('Y-m-d', strtotime($financial->tanggal)) }}" class="appearance-none border rounded-lg w-full py-2 px-3 text-white leading-tight
                        focus:outline-none focus:shadow-outline bg-gray-700" required>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Pemasukan</label>
                    <input type="number" name="pemasukan" id="pemasukan"
                        class="border text-white text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000" value="{{$financial->pemasukan}}">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Pengeluaran</label>
                    <input type="number" name="pengeluaran" id="pengeluaran"
                        class="border text-white text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="1000" value="{{$financial->pengeluaran}}">
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Berikan deskripsi finansial disini">{{$financial->deskripsi}}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4 sm:mt-6">
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-semibold text-center text-black rounded-lg bg-button-gradient focus:ring-4 focus:ring-primary-900 hover:opacity-70">
                    Perbarui Finansial
                </button>
            </div>
        </form>
    </div>
</section>