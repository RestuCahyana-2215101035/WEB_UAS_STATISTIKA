@extends('template.template')
@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>

<div class="card bg-white mt-4 rounded-lg shadow-md">
    <div class="card-header border-0 rounded-t-lg py-3 px-4 bg-gray-100">
    
    <div class="card-body">
        <div class="card-header border-0">
        <h3 class="card-title">
            <i class="fas fa-database mr-1"></i>Tabel Data
        </h3>
    </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frekuensi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($paginatedFrekuensi as $skor => $frequency)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $skor }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $frequency }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="flex justify-end mt-4">
            {{ $paginatedFrekuensi->links() }}
        </div>
    </div>
</div>
</div>
@endsection
