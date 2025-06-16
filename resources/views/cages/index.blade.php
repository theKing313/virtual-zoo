@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Список клеток</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('cages.create') }}" class="btn btn-primary mb-3">Добавить клетку</a>

    <div class="row">
        @forelse($cages as $cage)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cage->name }}</h5>
                        <p class="card-text">Вместимость: {{ $cage->capacity }}</p>
                        <p class="card-text">Животных: {{ $cage->animals->count() }}</p>
                        <a href="{{ route('cages.show', $cage->id) }}" class="btn btn-sm btn-info">Посмотреть</a>
                        <a href="{{ route('cages.edit', $cage->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить эту клетку?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Клеток пока нет.</p>
        @endforelse
    </div>
</div>
@endsection
