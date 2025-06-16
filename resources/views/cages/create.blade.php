@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Добавить клетку</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Название клетки</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Вместимость</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('cages.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
@endsection
