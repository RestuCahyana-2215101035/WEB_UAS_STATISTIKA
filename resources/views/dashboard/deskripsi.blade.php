@extends('template.template')
@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Deskripsi Data</h2>
    
        <div class="container mx-auto p-6">
         
            <div class="card bg-white rounded-lg shadow-md p-4 mb-4">
                <p>Jumlah Data: {{ $jumlahData }}</p>
                <p>Skor Maksimum: {{ $nilaiMaksimum }}</p>
                <p>Skor Minimum: {{ $nilaiMinimum }}</p>
                <p>Skor Rata-rata: {{ number_format($nilaiRataRata, 2) }}</p>
                <p>Standar Deviasi: {{ number_format($standarDeviasi, 2) }}</p>
            </div>

            <div class="card bg-white mt-4 rounded-lg shadow-md">
                <div class="card-header border-0 rounded-t-lg py-3 px-4 bg-gray-100">
                    <h3 class="card-title text-gray-800 font-semibold">
                        <i class="fas fa-database mr-1"></i>Tabel Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1">
                        <!-- data tunggal -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Maksimum</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Minimum</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $nilaiMaksimum }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $nilaiMinimum }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($nilaiRataRata, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>


            @endsection
























