
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $animal->name }} ({{ $animal->species }})</h1>
    <p><strong>Возраст:</strong> {{ $animal->age }}</p>
    <p><strong>Описание:</strong> {{ $animal->description }}</p>
    <p><strong>Клетка:</strong> <a href="{{ route('cages.show', $animal->cage->id) }}">{{ $animal->cage->name }}</a></p>
    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Удалить животное?')">Удалить</button>
    </form>
</div>
@endsection
