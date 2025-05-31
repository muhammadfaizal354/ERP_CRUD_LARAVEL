@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Judul Todo:</label><br>
        <input type="text" name="title" id="title" value="{{ $todo->title }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('todos.index') }}">Kembali ke Daftar Todo</a>
@endsection
