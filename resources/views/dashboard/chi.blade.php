@extends('template.template')
@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Tabel Chi-Kuadrat</h2>
<div class="bg-white border rounded-lg shadow-md p-4">
    <form action="{{ route('chi') }}" method="post" class="flex my-4">
        @csrf
        <input type="text" class="form-input w-1/2 border border-gray-400 rounded-l-md px-4" name="chi" placeholder="calculate"> 
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-r-md">Cari</button>
    </form>
    
    @if (session()->has('success'))
    <div id="resultAlert" class="bg-green-500 text-white font-semibold px-4 py-2 rounded-md">
        <strong>Hasil</strong> {{ session('success') }}
        <button id="closeBtn" type="button" class="float-right font-semibold">X</button>
    </div>
@endif
</div>

    
    <div class="card bg-white mt-4 rounded-lg shadow-md">
        <div class="card-header border-0 rounded-t-lg py-3 px-4 bg-gray-100">
            <h3 class="card-title text-gray-800 font-semibold">
                <i class="fas fa-database mr-1"></i>Tabel Data
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display table table-striped w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            {{-- <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th> --}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Z</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">nol</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">satu</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">dua</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">tiga</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">empat</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">lima</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">enam</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">tujuh</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">delapan</th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">sembilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $score)  
                            <tr>
                                {{-- <th class="px-3 py-4 whitespace-nowrap">{{ $result->firstItem() + $loop->index }}</th> --}}
                                <td class="px-6 py-4 whitespace-nowrap">{{ $score->z }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->nol }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->satu }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->dua }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->tiga }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->empat }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->lima }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->enam }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->tujuh }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->delapan }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $score->sembilan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="flex justify-end mt-4">
        {{ $result->links() }}
    </div>

    <script>
        // Ambil tombol "X" dan elemen hasil
        const closeBtn = document.getElementById('closeBtn');
        const resultAlert = document.getElementById('resultAlert');
    
        // Tambahkan event listener untuk tombol "X"
        closeBtn.addEventListener('click', function() {
            // Sembunyikan elemen hasil saat tombol "X" diklik
            resultAlert.style.display = 'none';
        });
    </script>
@endsection
