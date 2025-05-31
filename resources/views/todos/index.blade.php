@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Daftar Todo</h1>

        @forelse($todos as $todo)
            <div class="flex items-center justify-between bg-gray-100 rounded-xl px-4 py-3 mb-3 shadow-sm">
                <span class="text-gray-800">{{ $todo->title }}</span>
                <div class="flex gap-2">
                    <a href="{{ route('todos.edit', $todo->id) }}" class="text-sm text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada todo.</p>
        @endforelse

        <a href="{{ route('todos.create') }}" class="block mt-6 text-center bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            + Tambah Todo
        </a>
    </div>
</div>
@endsection
