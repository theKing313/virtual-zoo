@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Все животные</h1>
    <a href="{{ route('animals.create') }}" class="btn btn-success mb-3">Добавить животное</a>
    @foreach($animals as $animal)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $animal->name }} ({{ $animal->species }})</h5>
                <p class="card-text">Возраст: {{ $animal->age }}</p>
                <p class="card-text">{{ $animal->description }}</p>
                <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info">Подробнее</a>
                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Редактировать</a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Удалить животное?')">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection