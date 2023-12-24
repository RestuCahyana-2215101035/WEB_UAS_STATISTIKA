@extends('template.template')
@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add Score</h2>

    
    
<form action="/upload" method="POST">
    @csrf
    <div class="grid grid-cols-1 gap-4">
        <div class="mb-3">
            <input
                type="number"
                class="form-control border rounded-md p-3"
                id="skor"
                name="skor"
            />
        </div>
        <div class="flex justify-between">
            <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded-lg">Save</button>
        </div>
    </div>
</form>

    
    


@endsection
