@extends('layouts.app')

@section('content')
    <h1>Tambah Todo</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <label for="title">Judul Todo:</label><br>
        <input type="text" name="title" id="title"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('todos.index') }}">Kembali ke Daftar Todo</a>
@endsection
