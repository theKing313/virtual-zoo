@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Клетка: {{ $cage->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Вместимость: {{ $cage->capacity }}</h5>
            <h6>Животные:</h6>
            @if ($cage->animals->count())
                <ul class="list-group mb-3">
                    @foreach ($cage->animals as $animal)
                        <li class="list-group-item">{{ $animal->name }} ({{ $animal->species }})</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">В клетке нет животных.</p>
 
            @endif
            <a href="{{ route('animals.create') }}?cage_id={{ $cage->id }}" class="btn btn-success ">
                    ➕ Добавить животное в эту клетку
            </a>
            <a href="{{ route('cages.edit', $cage->id) }}" class="btn btn-primary">Редактировать</a>

            <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Удалить клетку?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>

            <a href="{{ route('cages.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
@endsection
