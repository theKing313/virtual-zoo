
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Информация о животном</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $animal->name }} ({{ $animal->species }})</h5>
            <p><strong>Возраст:</strong> {{ $animal->age }}</p>

             <p><strong>Клетка:</strong> <a class=" border-bottom "  href="{{ route('cages.show', $animal->cage->id) }}">{{ $animal->cage->name }}</a></p>
            <p><strong>Описание:</strong> {{ $animal->description ?? 'Нет описания' }}</p>
        </div>
   
    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning mb-3">Редактировать</a>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger w-full" onclick="return confirm('Удалить животное?')">Удалить</button>
    </form>
    </div>

    <a href="{{ route('animals.index') }}" class="btn btn-secondary mt-3">Назад</a>
</div>
@endsection