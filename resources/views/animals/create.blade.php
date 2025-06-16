@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить животное</h1>
    <form method="POST" action="{{ route('animals.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Вид</label>
            <input type="text" name="species" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Возраст</label>
            <input type="number" name="age" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Клетка</label>
            <select name="cage_id" class="form-select" required>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}">{{ $cage->name }} ({{ $cage->animals->count() }}/{{ $cage->capacity }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection