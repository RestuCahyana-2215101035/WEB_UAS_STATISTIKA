<table id="myTable" class="display table table-striped w-full">
    <thead class="bg-gray-100">
        <tr>
            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
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
                <th class="px-3 py-4 whitespace-nowrap">{{ $loop->iteration }}</th>
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