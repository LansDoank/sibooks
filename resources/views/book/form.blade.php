<x-default_layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex items-center max-w-lg mx-auto h-screen">
        <form method="post" action="/book/pinjam" class="w-full">
            @csrf
            <input type="hidden" name="id" value="{{$book->id}}">
            <input type="hidden" name="stock" value="{{$book->stock}}">
            <div class="mb-3">
                <h1 class="text-2xl font-medium text-gray-800">Pinjam Buku</h1>
            </div>
            <div class="mb-6">
                <label for="nama-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Buku</label>
                <input value="{{ $book->title }}" name="title" readonly type="text" id="nama-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="jumlah-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    Buku <p class="text-gray-500 font-base text-xs">Stock : {{$book->stock}}</p></label>
                <input value="{{ $book->stock }}" min="1" max="{{$book->stock}}" name="amount"  type="number" id="jumlah-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="kelas-peminjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas Peminjam</label>
                    <select name="kelas" id="countries" id="kelas-peminjam" name="class" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="X PH 1">X PH 1</option>
                        <option value="X PH 2">X PH 2</option>
                        <option value="X PH 3">X PH 3</option>
                        <option value="X PPLG 1">X PPLG 1</option>
                        <option value="X MPLB 1">X MPLB 1</option>
                        <option value="X MPLB 2">X MPLB 2</option>
                        <option value="XI PPLG 1">XI PPLG 1</option>
                        <option value="XI PPLG 2">XI PPLG 2</option>
                        <option value="XI MPLB 1">XI MPLB 1</option>
                        <option value="XI MPLB 2">XI MPLB 2</option>
                        <option value="XI PH 1">XI PH 1</option>
                        <option value="XI PH 2">XI PH 2</option>
                        <option value="XII PPLG 1">XII PPLG 1</option>
                        <option value="XII PH 1">XII PH 1</option>
                        <option value="XII PH 2">XII PH 2</option>
                        <option value="XII MPLB 1">XII MPLB 1</option>
                        <option value="XII MPLB 2">XII MPLB 2</option>
                    </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam</button>
        </form>
    </div>
</x-default_layout>