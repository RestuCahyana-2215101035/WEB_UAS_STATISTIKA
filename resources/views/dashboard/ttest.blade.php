@extends('template.template')
@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Uji Tabel T</h2>


   
    <div class="card bg-white mt-4 rounded-lg shadow-md">
        <div class="card-header border-0 rounded-t-lg py-3 px-4 bg-gray-100">
            <h3 class="card-title text-gray-800 font-semibold">
                <i class="fas fa-database mr-1"></i>Tabel Data
            </h3>
        </div>
        <div class="card-body">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">X1</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">X2</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $index => $data)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->x1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->x2 }}</td>
                        <!-- Tambahkan kolom lainnya jika ada -->
                    </tr>
                    
                    @endforeach
                   
                </tbody>
               </table>
        </div>
    </div>



    <div class="card bg-white mt-4 rounded-lg shadow-md">
        <div class="card-header border-0 rounded-t-lg py-3 px-4 bg-gray-100">
            <h3 class="card-title text-gray-800 font-semibold">
                <i class="fas fa-database mr-1"></i>Hasil
            </h3>
        </div>
        <div class="card-body">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">X1</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">X2</th> --}}
                        
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Sum:</td>
                        <td class="px-6 py-4 whitespace-nowrap">  {{ $sumX1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"> {{ $sumX2 }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Rerata:</td>
                        <td class="px-6 py-4 whitespace-nowrap">  {{ $averageX1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">  {{ $averageX2 }}</td>
                    </tr>
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">SD:</td>
                        <td class="px-6 py-4 whitespace-nowrap">   {{ $roundedSDX1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">  {{ $roundedSDX2 }}</td>
                    </tr>
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Variance:</td>
                        <td class="px-6 py-4 whitespace-nowrap">  {{ $roundedVariance1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"> {{ $roundedVariance2 }}</td>
                    </tr>
                    
                  
                </tbody>
               </table>
        </div>
    </div>
    



@endsection
