@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Редактировать животное</h1>

    <form method="POST" action="{{ route('animals.update', $animal->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="species" class="form-label">Вид</label>
            <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $animal->species) }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $animal->name) }}">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Возраст</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $animal->age) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $animal->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cage_id" class="form-label">Клетка</label>
            <select class="form-select" name="cage_id">
                @foreach ($cages as $cage)
                    <option value="{{ $cage->id }}" {{ $animal->cage_id == $cage->id ? 'selected' : '' }}>
                        {{ $cage->name }} ({{ $cage->capacity }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
