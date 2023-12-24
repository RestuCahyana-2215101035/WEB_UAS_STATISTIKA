@extends('template.template')
@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>

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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Tengah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frekuensi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($skorGroups as $group)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $group['interval'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $group['mid_value'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $group['frequency'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
