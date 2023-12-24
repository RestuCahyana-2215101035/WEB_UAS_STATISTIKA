@extends('template.template')
@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
<a href="javascript:void(0)" onclick="openAddModal()" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg mr-1">Add Data</a>
<a href="/import" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg">Import Data</a>

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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($data as $index => $nilai)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + $data->firstItem() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->skor }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                            <a href="javascript:void(0)" onclick="openEditModal('{{ $nilai->id }}', '{{ $nilai->skor }}')" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded-md mr-2 transition duration-300 hover:bg-yellow-600">Edit</a>
                            <form action="/delete/{{$nilai->id}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded-md transition duration-300 hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="flex justify-end mt-4">
    {{ $data->links() }}
</div>
<!-- Add Modal -->
<div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-8 w-1/3">
        <form id="addForm" action="/upload" method="POST"> <!-- form untuk tambah data -->
            @csrf
            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="number" class="form-control" id="skor" name="skor" />
            </div>
            <button onclick="submitAddForm()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
            <button onclick="closeAddModal()" class="mt-4 ml-2 px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Close</button>
        </form>
    </div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-8 w-1/3">
        <form id="editForm" action="" method="POST"> <!-- form untuk edit -->
            @csrf
            @method("PUT") <!-- sesuaikan dengan method yang digunakan -->
            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="number" class="form-control" id="skor" name="skor" />
            </div>
            <button onclick="submitEditForm()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
            <button onclick="closeEditModal()" class="mt-4 ml-2 px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Close</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, skor) {
        document.getElementById('skor').value = skor;
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editForm').action = "/edit/" + id; // sesuaikan dengan route edit
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function submitEditForm() {
        document.getElementById('editForm').submit();
    }


    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function submitAddForm() {
        document.getElementById('addForm').submit();
    }
</script>
@endsection
