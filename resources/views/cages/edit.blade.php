@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Редактировать клетку</h2>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" id="name" name="name" class="form-control" 
                   value="{{ old('name', $cage->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Вместимость</label>
            <input type="number" id="capacity" name="capacity" class="form-control"
                   value="{{ old('capacity', $cage->capacity) }}"
                   min="{{ $cage->animals_count }}" required>
            <div class="form-text text-muted">
                В клетке {{ $cage->animals_count }} животных. Вместимость не может быть меньше этого количества.
            </div>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('cages.show', $cage->id) }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
@endsection
